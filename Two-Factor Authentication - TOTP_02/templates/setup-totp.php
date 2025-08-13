<?php
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/auth.php';
require_once 'includes/totp.php';

$auth = new Auth();
$message = '';
$messageType = '';

if (isset($_GET['action']) && $_GET['action'] === 'disable') {
    if ($auth->disableTOTP($_SESSION['user']['id'])) {
        $_SESSION['user']['totp_secret'] = null;
        $_SESSION['message'] = 'TOTP authentication has been disabled.';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit;
    } else {
        $message = 'Failed to disable TOTP.';
        $messageType = 'danger';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enable_totp'])) {
    $result = $auth->setupTOTP($_SESSION['user']['id']);
    if ($result) {
        $_SESSION['user']['totp_secret'] = $result['secret'];
        $secret = $result['secret'];
        $qrUrl = $result['qr_url'];
        $backupCodes = $result['backup_codes'];
    } else {
        $message = 'Failed to setup TOTP.';
        $messageType = 'danger';
    }
} elseif (!empty($_SESSION['user']['totp_secret'])) {
    $secret = $_SESSION['user']['totp_secret'];
    $qrUrl = TOTP::getQRCodeUrl($secret, $_SESSION['user']['username']);
    $backupCodes = json_decode($_SESSION['user']['backup_codes'], true);
} else {
    $secret = TOTP::generateSecret();
    $qrUrl = TOTP::getQRCodeUrl($secret, $_SESSION['user']['username']);
}

require_once 'templates/header.php'; 
?>

<div class="auth-container">
    <div class="card">
        <div class="card-header">
            <h3>Setup Two-Factor Authentication</h3>
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <?php if (empty($_SESSION['user']['totp_secret'])): ?>
                <form action="setup-totp.php" method="post">
                    <button type="submit" name="enable_totp" class="btn btn-primary">Enable TOTP</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else: ?>
                <div class="alert alert-success">
                    <i class="bi bi-shield-check"></i> TOTP Authentication is already enabled for your account.
                </div>
                
                <div class="mb-3">
                    <p>Scan this QR code with your authenticator app:</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode($qrUrl); ?>" 
                         alt="QR Code for TOTP Setup" class="img-fluid mb-3">
                </div>
                
                <div class="mb-3">
                    <h5>Backup Codes</h5>
                    <p>Save these codes in a secure place. Each code can be used once.</p>
                    <div class="row">
                        <?php foreach ($backupCodes as $code): ?>
                            <div class="col-md-6 backup-code"><?php echo $code; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <a href="setup-totp.php?action=disable" class="btn btn-danger">Disable TOTP</a>
                <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function copySecret() {
    var copyText = document.getElementById("secret");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Secret key copied to clipboard");
}
</script>

<?php require_once 'templates/footer.php'; ?>