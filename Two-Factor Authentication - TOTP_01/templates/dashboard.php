<?php require_once 'templates/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h3>
    </div>
    <div class="card-body">
        <h4>Two-Factor Authentication</h4>
        
        <?php if (!empty($_SESSION['user']['totp_secret'])): ?>
            <div class="alert alert-success">
                <i class="bi bi-shield-check"></i> TOTP Authentication is enabled for your account.
            </div>
            <a href="setup-totp.php?action=disable" class="btn btn-danger">Disable TOTP</a>
        <?php else: ?>
            <div class="alert alert-warning">
                <i class="bi bi-shield-exclamation"></i> TOTP Authentication is not enabled for your account.
            </div>
            <a href="setup-totp.php" class="btn btn-primary">Enable TOTP</a>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>