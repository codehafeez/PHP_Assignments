<?php
session_start();

// Set default values
if (!isset($_SESSION['theme'])) $_SESSION['theme'] = 'default';
if (!isset($_SESSION['font'])) $_SESSION['font'] = 'roboto';

// Update session values on POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['theme'])) $_SESSION['theme'] = $_POST['theme'];
    if (isset($_POST['font'])) $_SESSION['font'] = $_POST['font'];
}

// File paths
$theme = $_SESSION['theme'];
$font = $_SESSION['font'];
$themeCss = "themes/{$theme}.css";
$fontCss = "fonts/{$font}.css";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Theme + Font Switcher</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <link rel="stylesheet" href="<?= htmlspecialchars($themeCss) ?>">
  <link rel="stylesheet" href="<?= htmlspecialchars($fontCss) ?>">
</head>
<body class="transition-all duration-300 min-h-screen flex flex-col items-center justify-center">

  <h1 class="text-3xl font-bold mb-4">PHP Multi-Theme + Font Switcher</h1>

  <form method="POST" class="mb-6 flex flex-col md:flex-row items-center gap-4">
    <!-- Theme Selection -->
    <div>
      <label class="mr-2 font-semibold">Theme:</label>
      <select name="theme" onchange="this.form.submit()" class="px-3 py-2 border rounded">
        <option value="default" <?= $theme === 'default' ? 'selected' : '' ?>>Default</option>
        <option value="dark" <?= $theme === 'dark' ? 'selected' : '' ?>>Dark</option>
        <option value="ocean" <?= $theme === 'ocean' ? 'selected' : '' ?>>Ocean</option>
      </select>
    </div>

    <!-- Font Selection -->
    <div>
      <label class="mr-2 font-semibold">Font:</label>
      <select name="font" onchange="this.form.submit()" class="px-3 py-2 border rounded">
        <option value="roboto" <?= $font === 'roboto' ? 'selected' : '' ?>>Roboto</option>
        <option value="inter" <?= $font === 'inter' ? 'selected' : '' ?>>Inter</option>
        <option value="poppins" <?= $font === 'poppins' ? 'selected' : '' ?>>Poppins</option>
      </select>
    </div>
  </form>

  <!-- Component -->
  <div class="card p-6 rounded shadow-md w-full max-w-md text-center">
    <p class="mb-4">Today is <?= date("l, F j, Y") ?>.</p>
    <button class="btn px-4 py-2 rounded">Click Me</button>
  </div>

</body>
</html>
