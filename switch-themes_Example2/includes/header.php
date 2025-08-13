<?php 
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(SITE_TITLE) ?></title>    
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="<?= get_theme_path($_SESSION['theme']) ?>" id="theme-style">    
    <style>
        body {
            font-family: <?= $_SESSION['font'] ?? DEFAULT_FONT ?>;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><?= htmlspecialchars(SITE_TITLE) ?></div>
            
            <select id="theme-select">
                <?php foreach(get_available_themes() as $theme): ?>
                    <option value="<?= $theme ?>" <?= $_SESSION['theme']==$theme?'selected':'' ?>>
                        <?= ucfirst($theme) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <select id="font-select">
                <?php foreach(get_available_fonts() as $value=>$name): ?>
                    <option value="<?= htmlspecialchars($value) ?>" <?= $_SESSION['font']==$value?'selected':'' ?>>
                        <?= $name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <nav>
                <a href="index.php" class="<?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>">HOME</a>
                <a href="about.php" class="<?= basename($_SERVER['PHP_SELF'])=='about.php'?'active':'' ?>">ABOUT</a>
            </nav>
        </div>
    </header>
    
    <script>
        document.getElementById('theme-select').onchange = function() {
            location.href = `?theme=${this.value}`;
        };
        
        document.getElementById('font-select').onchange = function() {
            location.href = `?font=${encodeURIComponent(this.value)}`;
        };
    </script>
