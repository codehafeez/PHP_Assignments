<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function login(string $email, string $password): ?array {
        try {
            $stmt = $this->db->prepare("
                SELECT id, name, email, password, role 
                FROM users 
                WHERE email = ? 
                LIMIT 1
            ");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($user = $result->fetch_assoc()) {
                if (password_verify($password, $user['password'])) {
                    unset($user['password']);
                    return $user;
                }
            }
            return null;
        } catch (Exception $e) {
            error_log("User login error: " . $e->getMessage());
            return null;
        }
    }

    public function register(string $name, string $email, string $password, string $role = 'user'): bool {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("
                INSERT INTO users 
                (name, email, password, role) 
                VALUES (?, ?, ?, ?)
            ");
            $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("User register error: " . $e->getMessage());
            return false;
        }
    }

    public function getAllExcept(int $userId): array {
        try {
            $stmt = $this->db->prepare("
                SELECT id, name, email, role, created_at 
                FROM users 
                WHERE id != ? 
                ORDER BY id DESC
            ");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("User getAllExcept error: " . $e->getMessage());
            return [];
        }
    }

    public function getById(int $id): ?array {
        try {
            $stmt = $this->db->prepare("
                SELECT id, name, email, role, created_at 
                FROM users 
                WHERE id = ?
            ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            error_log("User getById error: " . $e->getMessage());
            return null;
        }
    }

    public function updateProfile(int $id, string $name, string $email, string $role): bool {
        try {
            $stmt = $this->db->prepare("
                UPDATE users 
                SET name = ?, email = ?, role = ? 
                WHERE id = ?
            ");
            $stmt->bind_param("sssi", $name, $email, $role, $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("User updateProfile error: " . $e->getMessage());
            return false;
        }
    }

    public function updateMyProfile(int $id, string $name, string $email): bool {
        try {
            $stmt = $this->db->prepare("
                UPDATE users 
                SET name = ?, email = ?
                WHERE id = ?
            ");
            $stmt->bind_param("ssi", $name, $email, $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("User updateProfile error: " . $e->getMessage());
            return false;
        }
    }

    public function changePassword(int $id, string $newPassword): bool {
        try {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("
                UPDATE users 
                SET password = ? 
                WHERE id = ?
            ");
            $stmt->bind_param("si", $hashedPassword, $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("User changePassword error: " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id): bool {
        try {
            // First delete user's tasks to maintain referential integrity
            $this->db->begin_transaction();
            
            $taskStmt = $this->db->prepare("DELETE FROM tasks WHERE user_id = ?");
            $taskStmt->bind_param("i", $id);
            $taskStmt->execute();
            
            $userStmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
            $userStmt->bind_param("i", $id);
            $result = $userStmt->execute();
            
            $this->db->commit();
            return $result;
        } catch (Exception $e) {
            $this->db->rollback();
            error_log("User delete error: " . $e->getMessage());
            return false;
        }
    }

    public function emailExists(string $email, ?int $excludeId = null): bool {
        try {
            $query = "SELECT COUNT(*) as count FROM users WHERE email = ?";
            $params = [$email];
            $types = "s";
            
            if ($excludeId !== null) {
                $query .= " AND id != ?";
                $params[] = $excludeId;
                $types .= "i";
            }
            
            $stmt = $this->db->prepare($query);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            
            return $result['count'] > 0;
        } catch (Exception $e) {
            error_log("User emailExists error: " . $e->getMessage());
            return false;
        }
    }
}