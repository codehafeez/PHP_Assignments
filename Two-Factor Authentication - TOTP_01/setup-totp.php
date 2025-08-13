<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';
require_once 'includes/totp.php';

$auth = new Auth();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['user']['username'];
$message = '';
$messageType = '';

// Handle TOTP disable
if (isset($_GET['action']) && $_GET['action'] === 'disable') {
    if ($auth->disableTOTP($_SESSION['user']['id'])) {
        $_SESSION['user']['totp_secret'] = null;
        $_SESSION['user']['backup_codes'] = null;
        $_SESSION['message'] = 'TOTP authentication has been disabled.';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit;
    } else {
        $message = 'Failed to disable TOTP.';
        $messageType = 'danger';
    }
}

// Handle TOTP enable/regenerate
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['enable_totp'])) {
        $result = $auth->setupTOTP($_SESSION['user']['id']);
        if ($result) {
            $_SESSION['user']['totp_secret'] = $result['secret'];
            $_SESSION['user']['backup_codes'] = json_encode($result['backup_codes']);
            $secret = $result['secret'];
            $qrUrl = $result['qr_url'];
            $backupCodes = $result['backup_codes'];
            $message = 'TOTP has been successfully enabled.';
            $messageType = 'success';
        } else {
            $message = 'Failed to setup TOTP.';
            $messageType = 'danger';
        }
    } elseif (isset($_POST['regenerate_codes'])) {
        // Use public method to regenerate codes
        $newCodes = TOTP::generateBackupCodes();
        if ($auth->updateUserBackupCodes($_SESSION['user']['id'], $newCodes)) {
            $_SESSION['user']['backup_codes'] = json_encode($newCodes);
            $backupCodes = $newCodes;
            $message = 'Backup codes have been regenerated.';
            $messageType = 'success';
        } else {
            $message = 'Failed to regenerate backup codes.';
            $messageType = 'danger';
        }
    }
}

// Get current TOTP status
if (!empty($_SESSION['user']['totp_secret'])) {
    $secret = $_SESSION['user']['totp_secret'];
    $qrUrl = TOTP::getQRCodeUrl($secret, $username);
    
    // Safely handle backup codes
    $backupCodes = [];
    if (!empty($_SESSION['user']['backup_codes'])) {
        $decodedCodes = json_decode($_SESSION['user']['backup_codes'], true);
        $backupCodes = is_array($decodedCodes) ? $decodedCodes : [];
    }
} else {
    $secret = TOTP::generateSecret();
    $qrUrl = TOTP::getQRCodeUrl($secret, $username);
    $backupCodes = [];
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
                    <div class="mb-3">
                        <p>Click below to enable Two-Factor Authentication for your account:</p>
                    </div>
                    <button type="submit" name="enable_totp" class="btn btn-primary">Enable TOTP</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else: ?>
                <div class="alert alert-success mb-3">
                    <i class="bi bi-shield-check"></i> TOTP Authentication is enabled for your account.
                </div>
                
                <div class="mb-3">
                    <p>Scan this QR code with your authenticator app:</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode($qrUrl); ?>" 
                         alt="QR Code for TOTP Setup" class="img-fluid mb-3">
                </div>
                
                <!-- Hafeez Comment this code -->
                <!-- 
                <div class="mb-3">
                    <p>Or manually enter this secret key:</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($secret); ?>" id="secret" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copySecret()">Copy</button>
                    </div>
                </div>
                -->
                
                <div class="mb-4">
                    <h5>Backup Codes</h5>
                    <p>Save these codes in a secure place. Each code can be used once.</p>
                    
                    <?php if (!empty($backupCodes)): ?>
                        <div class="row mb-3">
                            <?php foreach ($backupCodes as $code): ?>
                                <div class="col-md-6 backup-code mb-2"><?php echo htmlspecialchars($code); ?></div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Hafeez Comment this code -->
                        <!--
                        <form action="setup-totp.php" method="post">
                            <button type="submit" name="regenerate_codes" class="btn btn-warning">
                                Regenerate Backup Codes
                            </button>
                            <small class="text-muted d-block mt-1">Generating new codes will invalidate all previous ones.</small>
                        </form> 
                        -->

                    <?php else: ?>
                        <div class="alert alert-warning mb-3">
                            No backup codes available. Please regenerate them below.
                        </div>

                        <form action="setup-totp.php" method="post">
                            <button type="submit" name="regenerate_codes" class="btn btn-primary">
                                Generate Backup Codes
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="setup-totp.php?action=disable" class="btn btn-danger">Disable TOTP</a>
                    <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
                </div>
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