<?php
session_start();

// Configuration
define('SITE_TITLE', 'CodeHafeez');
define('DEFAULT_THEME', 'light');
define('DEFAULT_FONT', 'Arial, sans-serif');

// Initialize session values
$_SESSION['theme'] = $_SESSION['theme'] ?? DEFAULT_THEME;
$_SESSION['font'] = $_SESSION['font'] ?? DEFAULT_FONT;

// Handle theme/font changes
if (isset($_GET['theme'])) $_SESSION['theme'] = $_GET['theme'];
if (isset($_GET['font'])) $_SESSION['font'] = $_GET['font'];
?>