<?php
session_start();
include('config.php');

if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = 1;
    $currentTime = time();
    $stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_active) VALUES (?,?)");
    $stmt->bind_param("si", $id, $currentTime);
    if ($stmt->execute()) {
        $session_id = $stmt->insert_id;
        $_SESSION['user_id'] = $id;
        $_SESSION['session_id'] = $session_id;
        $_SESSION['LAST_ACTIVITY'] = $currentTime;
        header("Location: profile.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<h2>List of active devices (Action to Logout)<br/>Default login 2 minutes<br/>Session Handling using Databse</h2>
<form method="POST" action="login.php">
    <button type="submit">Login</button>
</form>
