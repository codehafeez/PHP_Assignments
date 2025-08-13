<?php
// config-sample.php
/**
 * Database Configuration
 * Rename this file to config.php after filling in your details
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Application Settings
define('APP_NAME', 'My Product');
define('APP_URL', 'http://yourdomain.com');

// Security
define('SECRET_KEY', 'your_secret_key_here');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);