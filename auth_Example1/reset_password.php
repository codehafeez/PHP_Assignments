<?php
session_start();
include 'config.php';

// If user is already logged in, redirect to profile
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists and is not expired
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token=? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
    } else {
        echo "Invalid or expired reset link.<br><br>";
        echo "<a href='login.php'>Login</a>";
        exit();
    }
    $stmt->close();
} else {
    echo "No token provided.<br><br>";
    echo "<a href='login.php'>Login</a>";
    exit();
}

// Process password reset form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Update password and remove reset token
    $stmt = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, reset_expires=NULL WHERE id=?");
    $stmt->bind_param("si", $new_password, $user_id);

    if ($stmt->execute()) {
        echo "Password reset successful! <a href='login.php'>Login now</a>";
    } else {
        echo "Error updating password.";
    }

    $stmt->close();
}
$conn->close();
?>

<!-- Password Reset Form -->
<form method="POST" action="">
    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <button type="submit" class="btn btn-success w-100">Reset Password</button>
</form>
<a href="login.php">Back to Login</a>
