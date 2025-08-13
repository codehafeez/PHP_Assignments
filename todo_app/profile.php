<?php
require_once 'functions.php';
checkLogin();
$title = 'Profile';
$errors = [];
$success_message = '';

// Process profile update if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if this is profile update (not password change)
    if (isset($_POST['update_profile'])) {
        $new_name = trim($_POST['name'] ?? '');
        $new_email = trim($_POST['email'] ?? '');

        $result = updateUserProfile($conn, $_SESSION['user_id'], $new_name, $new_email);

        if (!empty($result['errors'])) {
            $errors = $result['errors'];
        }
        if (!empty($result['success'])) {
            $success_message = $result['success'];

            // Update session data after successful update
            $_SESSION['name'] = $new_name;
            $_SESSION['email'] = $new_email;
        }
    }

    // Process password change if password fields submitted
    else {
        $old_password = $_POST['old_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        $result = changeUserPassword(
            $conn,
            $_SESSION['user_id'],
            $old_password,
            $new_password,
            $confirm_password
        );

        if (!empty($result['errors'])) {
            $errors = $result['errors'];
        }
        if (!empty($result['success'])) {
            $success_message = $result['success'];
        }
    }
}

// Get user info from session
$role = $_SESSION['role'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en" class="bg-gray-100 font-sans">
<!-- header.php -->
<?php require_once 'header.php'; ?>
<body class="flex items-center justify-center min-h-screen">
  <div class="max-w-2xl w-full bg-white p-8 rounded-lg shadow-lg space-y-6">

    <!-- Display errors if any -->
    <?php if ($errors): ?>
    <div id="errorAlert" class="relative mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <button type="button" onclick="document.getElementById('errorAlert').remove();" class="absolute top-2 right-2 text-xl font-bold text-red-500 hover:text-red-700">&times;</button>
        <ul class="list-disc list-inside">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <!-- Display success message -->
    <?php if ($success_message): ?>
    <div id="successAlert" class="relative mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        <button type="button" onclick="document.getElementById('successAlert').remove();" class="absolute top-2 right-2 text-xl font-bold text-green-600 hover:text-green-800">&times;</button>
        <?php echo htmlspecialchars($success_message); ?>
    </div>
    <?php endif; ?>

        <!-- Update Profile Form -->
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-4">My Profile (<?php echo strtoupper(htmlspecialchars($role)); ?>)</h2>

    <!-- Navigation Buttons -->
      <a href="index.php" class="flex justify-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded font-semibold">Back to Dashboard</a>
            
        <form method="POST" class="space-y-4">

        <div>
            <label for="name" class="block text-gray-600 mb-1 font-medium">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div>
            <label for="email" class="block text-gray-600 mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
    
        <div class="text-center pt-2">
            <button type="submit" name="update_profile"
            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Update Profile</button>
        </div>
        </form>


        <!-- Change Password Form with toggleable visibility icons -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4 text-center text-gray-700">Change Password</h3>
        <form method="POST" class="space-y-4">

            <!-- Old Password -->
            <div>
            <label for="old_password" class="block text-gray-600 mb-1">Old Password</label>
            <div class="relative">
                <input type="password" id="old_password" name="old_password" required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10" />
                <button type="button" onclick="togglePassword('old_password')" class="absolute inset-y-0 right-0 flex items-center px-3">
                <svg id="icon_old_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                </button>
            </div>
            </div>

            <!-- New Password -->
            <div>
            <label for="new_password" class="block text-gray-600 mb-1">New Password</label>
            <div class="relative">
                <input type="password" id="new_password" name="new_password" required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10" />
                <button type="button" onclick="togglePassword('new_password')" class="absolute inset-y-0 right-0 flex items-center px-3">
                <svg id="icon_new_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                </button>
            </div>
            </div>

            <!-- Confirm Password -->
            <div>
            <label for="confirm_password" class="block text-gray-600 mb-1">Confirm Password</label>
            <div class="relative">
                <input type="password" id="confirm_password" name="confirm_password" required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10" />
                <button type="button" onclick="togglePassword('confirm_password')" class="absolute inset-y-0 right-0 flex items-center px-3">
                <svg id="icon_confirm_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                </button>
            </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center pt-2">
            <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded font-semibold">Update Password</button>
            </div>
        </form>
        </div>

  </div>

  <!-- footer.php -->
<?php require_once 'footer.php'; ?>