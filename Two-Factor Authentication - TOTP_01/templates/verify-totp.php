<?php
if (!isset($_SESSION['temp_user'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/auth.php';
$auth = new Auth();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';
    $userId = $_SESSION['temp_user']['id'];
    
    if ($auth->verifyTOTP($userId, $code)) {
        $_SESSION['message'] = 'Login successful!';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit;
    } else {
        $message = 'Invalid verification code. Please try again.';
        $messageType = 'danger';
    }
}

require_once 'templates/header.php'; 
?>

<div class="auth-container">
    <div class="card">
        <div class="card-header">
            <h3>Two-Factor Verification</h3>
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <p>Please enter the 6-digit code from your authenticator app:</p>
            
            <form action="verify-totp.php" method="post">
                <div class="mb-3">
                    <label for="code" class="form-label">Verification Code</label>
                    <input type="text" class="form-control" id="code" name="code" pattern="\d{6}" maxlength="6" required>
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
                <a href="login.php" class="btn btn-secondary">Cancel</a>
            </form>
            
            <div class="mt-3">
                <p>Lost your device? <a href="#" data-bs-toggle="modal" data-bs-target="#backupCodesModal">Use a backup code</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Backup Codes Modal -->
<div class="modal fade" id="backupCodesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Use Backup Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Enter one of your backup codes:</p>
                <form action="verify-totp.php" method="post">
                    <div class="mb-3">
                        <label for="backup_code" class="form-label">Backup Code</label>
                        <input type="text" class="form-control" id="backup_code" name="code" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verify</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>