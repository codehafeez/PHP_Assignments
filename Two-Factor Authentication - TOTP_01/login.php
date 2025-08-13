<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

$auth = new Auth();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $result = $auth->login($username, $password);
    
    if ($result['status'] === 'success') {
        $_SESSION['message'] = 'Login successful!';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit;
    } elseif ($result['status'] === 'totp_required') {
        header('Location: verify-totp.php');
        exit;
    } else {
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = 'danger';
    }
}

require_once 'templates/login.php';