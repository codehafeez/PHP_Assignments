<?php
session_start();
include('config.php');

if (isset($_POST['session_id']))
{
    $id = $_POST['session_id'];
    $stmt = $conn->prepare("UPDATE user_sessions SET status = 0, session_destroy_seconds = 0 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'] = 'Successfully logout device';
}
else
{
    $_SESSION['message'] = 'No session ID provided.';
}

header("Location: profile.php");
exit();
?>
