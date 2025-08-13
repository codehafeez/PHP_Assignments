<?php
require_once 'functions.php';
checkLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    $_SESSION['flash_error'] = 'Invalid request.';
    header('Location: index.php');
    exit;
}

$id = (int)$_POST['id'];
$result = deleteTaskUserById($conn, $id, $_SESSION['user_id']);

if (isset($result['success'])) {
    $_SESSION['flash_success'] = $result['success'];
} else {
    $_SESSION['flash_error'] = $result['error'];
}

header('Location: index.php');
exit;
