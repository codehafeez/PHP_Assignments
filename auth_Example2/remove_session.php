<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] == 'admin') {
    // Admin can remove any session
    if (isset($_GET['session_id'])) {
        $session_id = $_GET['session_id'];
        $stmt = $pdo->prepare("DELETE FROM sessions WHERE session_id = ?");
        $stmt->execute([$session_id]);
        echo "Session removed successfully.";
    }
} else {
    // User can only remove their own sessions
    $user_id = $_SESSION['user_id'];
    if (isset($_GET['session_id'])) {
        $session_id = $_GET['session_id'];
        $stmt = $pdo->prepare("DELETE FROM sessions WHERE user_id = ? AND session_id = ?");
        $stmt->execute([$user_id, $session_id]);
        echo "Session removed successfully.";
    }
}
?>
