<?php
// install/index.php
if (file_exists('../config.php')) {
    die('The application is already installed.');
}

$errors = [];
$inputs = [
    'db_host' => $_POST['db_host'] ?? 'localhost',
    'db_name' => $_POST['db_name'] ?? '',
    'db_user' => $_POST['db_user'] ?? 'root',
    'db_pass' => $_POST['db_pass'] ?? '',
    'admin_email' => $_POST['admin_email'] ?? '',
    'admin_password' => $_POST['admin_password'] ?? ''
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installation</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; margin-bottom: 15px; }
        .btn { background: #0066cc; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Application Installation</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="install.php">
        <h2>Database Configuration</h2>
        
        <div class="form-group">
            <label for="db_host">Database Host</label>
            <input type="text" id="db_host" name="db_host" value="<?= htmlspecialchars($inputs['db_host']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="db_name">Database Name</label>
            <input type="text" id="db_name" name="db_name" value="<?= htmlspecialchars($inputs['db_name']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="db_user">Database Username</label>
            <input type="text" id="db_user" name="db_user" value="<?= htmlspecialchars($inputs['db_user']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="db_pass">Database Password</label>
            <input type="password" id="db_pass" name="db_pass" value="<?= htmlspecialchars($inputs['db_pass']) ?>">
        </div>
        
        <h2>Admin Account</h2>
        
        <div class="form-group">
            <label for="admin_email">Admin Email</label>
            <input type="email" id="admin_email" name="admin_email" value="<?= htmlspecialchars($inputs['admin_email']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="admin_password">Admin Password</label>
            <input type="password" id="admin_password" name="admin_password" value="<?= htmlspecialchars($inputs['admin_password']) ?>" required minlength="8">
        </div>
        
        <button type="submit" class="btn">Install</button>
    </form>
</body>
</html>