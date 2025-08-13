<?php
include('config.php');
session_start();

$timeout = 60; // 1 minute in seconds
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
else if ((time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$timeSession = time() - $_SESSION['LAST_ACTIVITY'];
echo "Session Time Seconds : ".$timeSession;
echo "<br>";
echo "Auto Logout 1 Minute";
echo "<br><br>";
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();


echo "Welcome, " . $user['username'] . "<br>";
echo "Email: " . $user['email'] . "<br><br>";
echo "<a href='logout.php'>Logout</a>";


?>
