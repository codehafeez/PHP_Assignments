<?php
require_once 'functions.php';
$title = 'Register';

// Call registerUser and get error/success messages
list($error, $success) = registerUser($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-700"><?php echo $title; ?></h2>


    <?php if ($error): ?>
      <div id="errorAlert" class="relative mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <button type="button" onclick="document.getElementById('errorAlert').remove();" class="absolute top-2 right-2 text-xl font-bold text-red-600 hover:text-red-800">&times;</button>
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div id="successAlert" class="relative mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        <button type="button" onclick="document.getElementById('successAlert').remove();" class="absolute top-2 right-2 text-xl font-bold text-green-600 hover:text-green-800">&times;</button>
        <?php echo $success; ?>
      </div>
    <?php endif; ?>
  

    <form method="POST" class="space-y-4">
      <!-- Name -->
      <div>
        <label class="block text-gray-600 mb-1" for="name">Name</label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" name="name" id="name" required>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-600 mb-1" for="email">Email</label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="email" name="email" id="email" required>
      </div>

      <!-- Password -->
      <div>
        <label class="block text-gray-600 mb-1" for="password">Password</label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="password" name="password" id="password" required>
      </div>

      <!-- Submit Button -->
      <button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-400" type="submit">Register</button>
    </form>

    <p class="mt-4 text-center text-gray-600">Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Login</a></p>
  </div>

<?php require_once 'footer.php'; ?>
</body>
</html>
