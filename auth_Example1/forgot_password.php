<?php
session_start();
include 'config.php';

// If user is already logged in, redirect to profile
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32)); // Secure token

        // Store the token and expiration in the database
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour
        $stmt->close();

        $stmt = $conn->prepare("UPDATE users SET reset_token=?, reset_expires=? WHERE email=?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();
        $stmt->close();

        $reset_link = "http://localhost/PHP-Assignments/reset_password.php?token=" . $token;
        // mail($email, "Password Reset", "Click the link to reset your password: " . $reset_link);
        echo $reset_link."<br>";
        echo "A password reset link has been sent to your email.";
    } else {
        echo "Email not found.";
    }
}
$conn->close();
?>

<!-- Forgot Password Form -->
<form method="POST" action="forgot_password.php">
    <div class="mb-3">
        <label for="forgotEmail" class="form-label">Enter Your Email</label>
        <input type="email" name="email" class="form-control" id="forgotEmail" required>
    </div>
    <button type="submit" class="btn btn-warning w-100">Reset Password</button>
</form>
<a href="login.php">Login</a>
