<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // Email already exists
        echo "The email address is already registered. Please use a different email.";
    } else {
        // Email is unique, insert the new user
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
        echo "Registration successful!";
    }
}
?>

<h3>PHP Example<br/>PDO save data into Database<br/>Session Time Defult 1 minute</h3>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    <br/>
    <button type="submit">Register</button>
</form>
<a href="login.php">Login</a>
