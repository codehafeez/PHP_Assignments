<?php
// Application Configuration
define('APP_NAME', 'TOTP Authenticator');
define('APP_URL', 'http://localhost/totp-app');
define('TOTP_ISSUER', 'TOTP Auth App');

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'demo_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Security Configuration
define('TOTP_WINDOW', 1); // 1 = 30 seconds before/after current time
define('MAX_LOGIN_ATTEMPTS', 5); // Maximum allowed failed attempts Lock IP
define('LOGIN_ATTEMPTS_TIME', 15); // Lock IP 15 minutes

// Session Configuration
session_start();

// Helper Functions
function redirect($url) {
    header("Location: $url");
    exit;
}

function set_message($message, $type = 'success') {
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $type;
}

function get_message() {
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $type = $_SESSION['message_type'];
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        return ['message' => $message, 'type' => $type];
    }
    return null;
}