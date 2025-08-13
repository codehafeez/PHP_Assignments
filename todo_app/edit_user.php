<?php
require_once 'functions.php';
checkLogin();

$role = $_SESSION['role'] ?? '';
if ($role !== 'admin') {
    header('Location: index.php');
    exit;
}

// Get user ID from GET parameter and validate
$userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($userId <= 0) {
    $_SESSION['flash_error'] = "Invalid user ID.";
    header('Location: users.php');
    exit;
}

// Fetch existing user data
$user = getUserById($conn, $userId);
if (!$user) {
    $_SESSION['flash_error'] = "User not found.";
    header('Location: users.php');
    exit;
}

// Initialize variables for form fields
$name = $user['name'];
$email = $user['email'];
$user_role = $user['role'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $user_role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';

    // Call updateUser function to handle validation and update
    $response = updateUser($conn, $userId, $name, $email, $user_role, $password);

    if (isset($response['errors'])) {
        $errors = $response['errors'];
    } else {
        $_SESSION['flash_success'] = $response['success'];
        header('Location: users.php');
        exit;
    }
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-gray-100 font-sans">
<?php require_once 'header.php'; ?>
<body class="min-h-screen bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

  <h1 class="text-2xl font-bold mb-6">Edit User</h1>

  <?php if (!empty($errors)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $error): ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-4">
      <label for="name" class="block font-semibold mb-1">Name</label>
      <input type="text" id="name" name="name" value="<?php echo e($name); ?>" required
             class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
      <label for="email" class="block font-semibold mb-1">Email</label>
      <input type="email" id="email" name="email" value="<?php echo e($email); ?>" required
             class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
      <label for="role" class="block font-semibold mb-1">Role</label>
      <select id="role" name="role" required
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="user" <?php echo ($user_role === 'user') ? 'selected' : ''; ?>>User</option>
        <option value="admin" <?php echo ($user_role === 'admin') ? 'selected' : ''; ?>>Admin</option>
      </select>
    </div>

    <div class="mb-6">
      <label for="password" class="block font-semibold mb-1">Password <small>(leave blank to keep unchanged)</small></label>
      <input type="password" id="password" name="password"
             class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="flex justify-between items-center">
      <a href="users.php" class="text-gray-600 hover:underline">Cancel</a>
      <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update User</button>
    </div>
  </form>

</div>

<?php require_once 'footer.php'; ?>
</body>
</html>
