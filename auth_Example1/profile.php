<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    echo "Welcome, " . htmlspecialchars($user['username']) . "<br>";
    echo "Email: " . htmlspecialchars($user['email']) . "<br>";
} else {
    echo "User not found.";
}

echo "<br><a href='logout.php'>Logout</a>";

$stmt->close();
$conn->close();
?>
