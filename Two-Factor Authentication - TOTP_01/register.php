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
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if ($password !== $confirmPassword) {
        $_SESSION['message'] = 'Passwords do not match.';
        $_SESSION['message_type'] = 'danger';
    } else {
        if ($auth->register($username, $email, $password)) {
            $_SESSION['message'] = 'Registration successful! Please login.';
            $_SESSION['message_type'] = 'success';
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['message'] = 'Registration failed. Username or email may already exist.';
            $_SESSION['message_type'] = 'danger';
        }
    }
}

require_once 'templates/register.php';