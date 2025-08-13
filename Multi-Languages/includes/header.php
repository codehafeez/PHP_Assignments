<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Website</title>
    <link rel="stylesheet" href="styles/style.css">
    <?php if ($dir == 'rtl'): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.rtl.min.css">
    <?php endif; ?>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php"><?php echo $lang['home']; ?></a></li>
                <li><a href="about.php"><?php echo $lang['about']; ?></a></li>
                <li><a href="contact.php"><?php echo $lang['contact']; ?></a></li>
            </ul>
        </nav>
        <div class="language-switcher">
            <span><?php echo $lang['language']; ?>:</span>
            <a href="?lang=en"><?php echo $lang['english']; ?></a> |
            <a href="?lang=ar"><?php echo $lang['arabic']; ?></a> |
            <a href="?lang=ur"><?php echo $lang['urdu']; ?></a>
        </div>
    </header>
    <main>