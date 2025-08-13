<?php
require_once 'config.php';

class TOTP {
    // Generate random base32 secret
    public static function generateSecret($length = 16) {
        $validChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $secret = '';
        
        for ($i = 0; $i < $length; $i++) {
            $secret .= $validChars[random_int(0, strlen($validChars) - 1)];
        }
        
        return $secret;
    }
    
    // Generate current TOTP code
    public static function generateCode($secret, $timeStep = 30, $digits = 6) {
        $secretKey = self::base32Decode($secret);
        $timestamp = time();
        $counter = floor($timestamp / $timeStep);
        $binaryCounter = pack('N*', 0) . pack('N*', $counter);
        $hash = hash_hmac('sha1', $binaryCounter, $secretKey, true);
        
        $offset = ord(substr($hash, -1)) & 0x0F;
        $part = substr($hash, $offset, 4);
        $value = unpack('N', $part)[1] & 0x7FFFFFFF;
        
        return str_pad($value % pow(10, $digits), $digits, '0', STR_PAD_LEFT);
    }
    
    // Verify TOTP code
    public static function verifyCode($code, $secret, $window = TOTP_WINDOW) {
        $timestamp = time();
        $timeStep = 30;
        
        for ($i = -$window; $i <= $window; $i++) {
            $adjustedTime = $timestamp + ($i * $timeStep);
            $counter = floor($adjustedTime / $timeStep);
            
            $binaryCounter = pack('N*', 0) . pack('N*', $counter);
            $hash = hash_hmac('sha1', $binaryCounter, self::base32Decode($secret), true);
            
            $offset = ord(substr($hash, -1)) & 0x0F;
            $part = substr($hash, $offset, 4);
            $value = unpack('N', $part)[1] & 0x7FFFFFFF;
            $otp = str_pad($value % pow(10, 6), 6, '0', STR_PAD_LEFT);
            
            if (hash_equals($otp, $code)) {
                return true;
            }
        }
        
        return false;
    }
    
    // Generate backup codes
    public static function generateBackupCodes($count = 10) {
        $codes = [];
        for ($i = 0; $i < $count; $i++) {
            $codes[] = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        }
        return $codes;
    }
    
    // Base32 decoding
    private static function base32Decode($secret) {
        $validChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $flippedChars = array_flip(str_split($validChars));
        
        $paddingCharCount = substr_count($secret, '=');
        $allowedValues = [6, 4, 3, 1, 0];
        
        if (!in_array($paddingCharCount, $allowedValues)) {
            return false;
        }
        
        $values = [];
        $chars = str_split($secret);
        
        foreach ($chars as $char) {
            if (!isset($flippedChars[$char])) {
                return false;
            }
            $values[] = $flippedChars[$char];
        }
        
        $bits = '';
        foreach ($values as $value) {
            $bits .= sprintf('%05b', $value);
        }
        
        $bytes = [];
        for ($i = 0; $i < strlen($bits); $i += 8) {
            $byte = substr($bits, $i, 8);
            if (strlen($byte) < 8) {
                $byte = str_pad($byte, 8, '0', STR_PAD_RIGHT);
            }
            $bytes[] = bindec($byte);
        }
        
        return pack('C*', ...$bytes);
    }
    
    // Generate QR code URL
    public static function getQRCodeUrl($secret, $account) {
        return sprintf(
            'otpauth://totp/%s:%s?secret=%s&issuer=%s&algorithm=SHA1&digits=6&period=30',
            rawurlencode(TOTP_ISSUER),
            rawurlencode($account),
            $secret,
            rawurlencode(TOTP_ISSUER)
        );
    }
}