<?php
require_once 'includes/config.php';

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
    $isBackupCode = isset($_POST['is_backup_code']) && $_POST['is_backup_code'] === '1';

    if ($auth->verifyTOTP($userId, $code, $isBackupCode)) {
        $_SESSION['message'] = 'Login successful!';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit;
    } else {
        $message = $isBackupCode 
            ? 'Invalid backup code. Please try again.' 
            : 'Invalid verification code. Please try again.';
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
            
            <form action="verify-totp.php" method="post" id="totpForm">
                <div class="mb-3">
                    <label for="code" class="form-label">Verification Code</label>
                    <input type="text" class="form-control" id="code" name="code" 
                           pattern="\d{6}" maxlength="6" required
                           title="Please enter a 6-digit code">
                    <input type="hidden" name="is_backup_code" value="0">
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
                <a href="login.php" class="btn btn-secondary">Cancel</a>
            </form>
            
            <div class="mt-3">
                <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#backupCodesModal">
                    Lost your device? Use a backup code
                </button>
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
                <form action="verify-totp.php" method="post" id="backupCodeForm">
                    <div class="mb-3">
                        <label for="backup_code" class="form-label">Backup Code</label>
                        <input type="text" class="form-control" id="backup_code" name="code" required>
                        <input type="hidden" name="is_backup_code" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Verify Backup Code</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Client-side validation for TOTP code
document.getElementById('totpForm').addEventListener('submit', function(e) {
    const codeInput = document.getElementById('code');
    if (!/^\d{6}$/.test(codeInput.value)) {
        e.preventDefault();
        alert('Please enter a valid 6-digit code');
        codeInput.focus();
    }
});

// Auto-close modal after backup code submission
document.getElementById('backupCodeForm').addEventListener('submit', function() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('backupCodesModal'));
    modal.hide();
});
</script>

<?php require_once 'templates/footer.php'; ?>