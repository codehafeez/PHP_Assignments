<?php
require_once 'functions.php';
checkLogin();

if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    $_SESSION['flash_error'] = 'Invalid request.';
    header('Location: users.php');
    exit;
}

$id = (int)$_POST['id'];
$result = deleteUserById($conn, $id);

if (isset($result['success'])) {
    $_SESSION['flash_success'] = $result['success'];
} else {
    $_SESSION['flash_error'] = $result['error'];
}

header('Location: users.php');
exit;
