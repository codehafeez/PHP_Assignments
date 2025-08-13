<?php
require_once 'functions.php';
$title = 'Login';
$error = loginUser($conn);
?>

<!DOCTYPE html>
<html lang="en">
<!-- header.php -->
<?php require_once 'header.php'; ?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-700"><?php echo $title; ?></h2>
  <?php if ($error): ?>
    <div id="singleErrorAlert" class="relative mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
      <button type="button" onclick="document.getElementById('singleErrorAlert').remove();" class="absolute top-2 right-2 text-xl font-bold text-red-500 hover:text-red-700">&times;</button>
      <?php echo htmlspecialchars($error); ?>
    </div>
  <?php endif; ?>
    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-600 mb-1" for="email">Email</label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="email" name="email" id="email" required>
      </div>
      <div>
        <label class="block text-gray-600 mb-1" for="password">Password</label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="password" name="password" id="password" required>
      </div>
      <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="submit">Login</button>
    </form>
    <p class="mt-4 text-center text-gray-600">Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Register</a></p>
  </div>

<!-- footer.php -->
<?php require_once 'footer.php'; ?>
