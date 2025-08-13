<?php
// install/success.php
if (!file_exists('../config.php')) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installation Complete</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; }
        .success { color: green; font-size: 1.2em; margin: 20px 0; }
        .btn { 
            display: inline-block;
            background: #0066cc; 
            color: white; 
            padding: 10px 15px; 
            text-decoration: none;
            border-radius: 4px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Installation Complete</h1>
    <div class="success">
        Your application has been successfully installed!
    </div>
    
    <p>
        <strong>Important:</strong> For security reasons, please delete the <code>install</code> directory.
    </p>
    
    <div style="margin-top: 30px;">
        <a href="../" class="btn">Go to Homepage</a>
        <a href="../products.php" class="btn">Go to Admin Panel</a>
    </div>
</body>
</html>