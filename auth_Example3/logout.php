<?php
session_start();
include('config.php');

if (isset($_SESSION['session_id'])) 
{
    $id = $_SESSION['session_id'];
    $stmt = $conn->prepare("UPDATE user_sessions SET status = 0 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Destroy the session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>
