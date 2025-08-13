<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';
require_once 'includes/totp.php';

// Initialize authentication
$auth = new Auth();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user']['id'];
$username = $_SESSION['user']['username'];
$message = '';
$messageType = '';

// Handle TOTP disable request
if (isset($_GET['action']) && $_GET['action'] === 'disable') {
    if ($auth->disableTOTP($userId)) {
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

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['enable_totp'])) {
        // Setup TOTP for the user
        $result = $auth->setupTOTP($userId);
        
        if ($result) {
            $_SESSION['user']['totp_secret'] = $result['secret'];
            $_SESSION['user']['backup_codes'] = json_encode($result['backup_codes']);
            $secret = $result['secret'];
            $qrUrl = $result['qr_url'];
            $backupCodes = $result['backup_codes'];
            $message = 'TOTP has been successfully enabled. Scan the QR code with your authenticator app.';
            $messageType = 'success';
        } else {
            $message = 'Failed to setup TOTP.';
            $messageType = 'danger';
        }
    } elseif (isset($_POST['regenerate_codes'])) {
        // Regenerate backup codes
        $newCodes = TOTP::generateBackupCodes();
        if ($auth->updateUserBackupCodes($userId, $newCodes)) {
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

// Prepare TOTP data for display
if (!empty($_SESSION['user']['totp_secret'])) {
    $secret = $_SESSION['user']['totp_secret'];
    $qrUrl = TOTP::getQRCodeUrl($secret, $username);
    $backupCodes = json_decode($_SESSION['user']['backup_codes'], true) ?: [];
} else {
    $secret = TOTP::generateSecret();
    $qrUrl = TOTP::getQRCodeUrl($secret, $username);
    $backupCodes = [];
}

require_once 'templates/header.php';
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Two-Factor Authentication Setup</h3>
                </div>
                
                <div class="card-body">
                    <?php if ($message): ?>
                        <div class="alert alert-<?= $messageType ?> alert-dismissible fade show">
                            <?= $message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (empty($_SESSION['user']['totp_secret'])): ?>
                        <!-- TOTP Not Enabled Section -->
                        <div class="text-center mb-4">
                            <h4>Enable Two-Factor Authentication</h4>
                            <p class="text-muted">
                                Protect your account by requiring a verification code from your mobile device.
                            </p>
                        </div>
                        
                        <form method="post">
                            <div class="d-grid gap-2">
                                <button type="submit" name="enable_totp" class="btn btn-primary btn-lg">
                                    <i class="bi bi-shield-lock"></i> Enable TOTP Authentication
                                </button>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- TOTP Enabled Section -->
                        <div class="alert alert-success">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-check fs-4 me-2"></i>
                                <div>
                                    <strong>TOTP Authentication is enabled</strong>
                                </div>
                            </div>
                        </div>

                        <!-- QR Code Section -->
                        <div class="text-center mb-4">
                            <h5>Add Another Device</h5>
                            <p>Scan this QR code with your authenticator app:</p>
                            
                            <div class="border p-3 d-inline-block mb-3">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode($qrUrl) ?>" 
                                     alt="TOTP QR Code" class="img-fluid">
                            </div>
                            
                            <div class="alert alert-info small">
                                <i class="bi bi-info-circle"></i> 
                                Supported apps: Google Authenticator, Microsoft Authenticator, Authy, etc.
                            </div>
                        </div>

                        <!-- Backup Codes Section -->
                        <div class="mb-4">
                            <h5 class="mb-3">Backup Codes</h5>
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                Save these codes in a secure place. Each code can be used only once.
                            </div>
                            
                            <?php if (!empty($backupCodes)): ?>
                                <div class="row row-cols-2 g-2 mb-3">
                                    <?php foreach ($backupCodes as $code): ?>
                                        <div class="col">
                                            <div class="p-2 border rounded text-center font-monospace">
                                                <?= htmlspecialchars($code) ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                
                                <form method="post">
                                    <button type="submit" name="regenerate_codes" class="btn btn-warning">
                                        <i class="bi bi-arrow-repeat"></i> Regenerate Backup Codes
                                    </button>
                                    <small class="text-muted d-block mt-1">
                                        Generating new codes will invalidate all previous ones.
                                    </small>
                                </form>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-octagon"></i>
                                    You don't have any backup codes. Please generate them below.
                                </div>
                                
                                <form method="post">
                                    <button type="submit" name="regenerate_codes" class="btn btn-primary">
                                        <i class="bi bi-key"></i> Generate Backup Codes
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="setup-totp.php?action=disable" class="btn btn-danger">
                                <i class="bi bi-shield-slash"></i> Disable TOTP
                            </a>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to Dashboard
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Copy secret key to clipboard
function copySecret() {
    const secretElement = document.getElementById('secretKey');
    const textArea = document.createElement('textarea');
    textArea.value = secretElement.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    
    const tooltip = new bootstrap.Tooltip(secretElement, {
        title: 'Copied!',
        trigger: 'manual'
    });
    tooltip.show();
    
    setTimeout(() => {
        tooltip.hide();
    }, 1000);
}
</script>

<?php require_once 'templates/footer.php'; ?>