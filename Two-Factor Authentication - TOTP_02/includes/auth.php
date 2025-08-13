<?php
require_once 'database.php';
require_once 'totp.php';

class Auth {
    private $db;
    
    public function __construct() {
        $dbInstance = Database::getInstance();
        $this->db = $dbInstance;
    }
    
    /**
     * Register a new user
     */
    public function register($username, $email, $password) {
        $username = $this->db->escapeString($username);
        $email = $this->db->escapeString($email);
        
        // Check if user exists
        $result = $this->db->getConnection()->query(
            "SELECT id FROM users WHERE username = '$username' OR email = '$email'"
        );
        
        if ($result->num_rows > 0) {
            return false; // User already exists
        }
        
        // Hash password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $passwordHash = $this->db->escapeString($passwordHash);
        
        // Insert new user
        return $this->db->getConnection()->query(
            "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$passwordHash')"
        );
    }
    
    /**
     * Login user with password
     */
    public function login($username, $password) {
        $username = $this->db->escapeString($username);
        
        // Check login attempts
        if ($this->isBruteForce($username)) {
            return ['status' => 'error', 'message' => 'Too many login attempts. Please try again later.'];
        }
        
        // Get user
        $result = $this->db->getConnection()->query(
            "SELECT * FROM users WHERE username = '$username'"
        );
        
        if ($result->num_rows === 0) {
            $this->recordLoginAttempt(null);
            return ['status' => 'error', 'message' => 'Invalid username or password'];
        }
        
        $user = $result->fetch_assoc();
        
        if (!password_verify($password, $user['password_hash'])) {
            $this->recordLoginAttempt($user['id']);
            return ['status' => 'error', 'message' => 'Invalid username or password'];
        }
        
        // Check if TOTP is enabled
        if (!empty($user['totp_secret'])) {
            $_SESSION['temp_user'] = $user;
            return ['status' => 'totp_required', 'user_id' => $user['id']];
        }
        
        // Login successful
        $this->clearLoginAttempts($user['id']);
        $_SESSION['user'] = $user;
        return ['status' => 'success', 'user' => $user];
    }
    
    /**
     * Verify TOTP or backup code
     */
    public function verifyTOTP($userId, $code, $isBackupCode = false) {
        $userId = intval($userId);
        $result = $this->db->getConnection()->query(
            "SELECT * FROM users WHERE id = $userId"
        );
        
        if ($result->num_rows === 0) {
            return false;
        }
        
        $user = $result->fetch_assoc();
        
        // Handle backup code verification
        if ($isBackupCode) {
            $backupCodes = json_decode($user['backup_codes'], true) ?? [];
            if (in_array($code, $backupCodes)) {
                // Remove used backup code
                $backupCodes = array_diff($backupCodes, [$code]);
                $this->updateUserBackupCodes($user['id'], $backupCodes);
                
                $this->clearLoginAttempts($user['id']);
                $_SESSION['user'] = $user;
                unset($_SESSION['temp_user']);
                return true;
            }
            return false;
        }
        
        // Verify TOTP code
        if (!empty($user['totp_secret']) && TOTP::verifyCode($code, $user['totp_secret'])) {
            $this->clearLoginAttempts($user['id']);
            $_SESSION['user'] = $user;
            unset($_SESSION['temp_user']);
            return true;
        }
        
        return false;
    }
    
    /**
     * Setup TOTP for a user
     */
    public function setupTOTP($userId) {
        $secret = TOTP::generateSecret();
        $backupCodes = TOTP::generateBackupCodes();
        
        $secret = $this->db->escapeString($secret);
        $backupCodesJson = $this->db->escapeString(json_encode($backupCodes));
        
        $success = $this->db->getConnection()->query(
            "UPDATE users SET totp_secret = '$secret', backup_codes = '$backupCodesJson' WHERE id = $userId"
        );
        
        if ($success) {
            return [
                'secret' => $secret,
                'backup_codes' => $backupCodes,
                'qr_url' => TOTP::getQRCodeUrl($secret, $_SESSION['user']['username'])
            ];
        }
        
        return false;
    }
    
    /**
     * Disable TOTP
     */
    public function disableTOTP($userId) {
        $userId = intval($userId);
        return $this->db->getConnection()->query(
            "UPDATE users SET totp_secret = NULL, backup_codes = NULL WHERE id = $userId"
        );
    }
    
    /**
     * Update user's backup codes
     */
    public function updateUserBackupCodes($userId, $codes) {
        $userId = intval($userId);
        $codesJson = json_encode($codes);
        $codesJson = $this->db->escapeString($codesJson);
        
        return $this->db->getConnection()->query(
            "UPDATE users SET backup_codes = '$codesJson' WHERE id = $userId"
        );
    }
    
    /**
     * Check for brute force attempts
     */
    private function isBruteForce($username) {
        $username = $this->db->escapeString($username);
        $ip = $this->db->escapeString($_SERVER['REMOTE_ADDR']);
        
        $result = $this->db->getConnection()->query("
            SELECT COUNT(*) as attempts 
            FROM login_attempts 
            WHERE (user_id = (SELECT id FROM users WHERE username = '$username') 
              OR ip_address = '$ip')
              AND attempt_time > DATE_SUB(NOW(), INTERVAL " . LOGIN_ATTEMPTS_TIME . " MINUTE)
        ");
        
        $row = $result->fetch_assoc();
        return $row['attempts'] >= MAX_LOGIN_ATTEMPTS;
    }
    
    /**
     * Record login attempt
     */
    private function recordLoginAttempt($userId) {
        $userId = $userId ? intval($userId) : 'NULL';
        $ip = $this->db->escapeString($_SERVER['REMOTE_ADDR']);
        
        $this->db->getConnection()->query(
            "INSERT INTO login_attempts (user_id, ip_address) VALUES ($userId, '$ip')"
        );
    }
    
    /**
     * Clear login attempts for a user
     */
    private function clearLoginAttempts($userId) {
        $userId = intval($userId);
        $this->db->getConnection()->query(
            "DELETE FROM login_attempts WHERE user_id = $userId"
        );
    }
}