<?php
include('config.php');
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<h3>PHP Example<br/>PDO save data into Database<br/>Session Time Defult 1 minute</h3>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <br/>
    <button type="submit">Login</button>
</form>
<a href="signup.php">Signup</a>
