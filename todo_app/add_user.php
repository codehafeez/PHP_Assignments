<?php
require_once 'functions.php';
checkLogin();

$title = 'Add User';
$role = $_SESSION['role'] ?? '';

if ($role !== 'admin') {
    header('Location: index.php');
    exit;
}

$errors = [];
$name = '';
$email = '';
$password = '';
$user_role = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $user_role = $_POST['role'] ?? '';

    // Validate
    if ($name === '') {
        $errors[] = "Name is required.";
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
    if (!in_array($user_role, ['user', 'admin'])) {
        $errors[] = "Role must be 'user' or 'admin'.";
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Email already exists.";
    }
    $stmt->close();

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $hashed_password, $user_role);

        if ($stmt->execute()) {
            $_SESSION['flash_success'] = "User added successfully.";
            header('Location: users.php');
            exit;
        } else {
            $errors[] = "Database error: failed to add user.";
        }
        $stmt->close();
    }
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>
<body class="p-6 bg-gray-100 font-sans">

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">

  <h1 class="text-2xl font-bold mb-6">Add User</h1>

  <?php if (!empty($errors)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $error): ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="name" class="block mb-1 font-semibold">Name</label>
    <input type="text" id="name" name="name" value="<?php echo e($name); ?>" required
      class="w-full border border-gray-300 rounded px-3 py-2 mb-4">

    <label for="email" class="block mb-1 font-semibold">Email</label>
    <input type="email" id="email" name="email" value="<?php echo e($email); ?>" required
      class="w-full border border-gray-300 rounded px-3 py-2 mb-4">

    <label for="password" class="block mb-1 font-semibold">Password</label>
    <input type="password" id="password" name="password" required
      class="w-full border border-gray-300 rounded px-3 py-2 mb-4">

    <label for="role" class="block mb-1 font-semibold">Role</label>
    <select id="role" name="role" required class="w-full border border-gray-300 rounded px-3 py-2 mb-6">
      <option value="">Select User Role</option>
      <option value="user" <?php echo $user_role === 'user' ? 'selected' : ''; ?>>User</option>
      <option value="admin" <?php echo $user_role === 'admin' ? 'selected' : ''; ?>>Admin</option>
    </select>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add User</button>
    <a href="users.php" class="ml-4 text-gray-600 hover:underline">Cancel</a>
  </form>

</div>

<?php require_once 'footer.php'; ?>
</body>
</html>
