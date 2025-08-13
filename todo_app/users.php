<?php
require_once 'functions.php';
checkLogin();

$title = 'Users';
$role = $_SESSION['role'] ?? '';

if ($role !== 'admin') {
    header('Location: index.php');
    exit;
}

// Flash messages
$flash_success = $_SESSION['flash_success'] ?? '';
$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$currentUserId = $_SESSION['user_id'];
$users = getAllUsersExceptCurrent($conn, $currentUserId);
if (is_array($users) && isset($users['error'])) {
    $error = $users['error'];
    $users = null;
} else {
    $error = '';
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-gray-100 font-sans">
<?php require_once 'header.php'; ?>
<body class="min-h-screen bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <!-- Navigation Buttons -->
    <div class="flex justify-center space-x-4 mt-6">
      <a href="index.php" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Back to Dashboard</a>
    </div>

  <header class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Users</h1>
    <a href="add_user.php" class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" aria-label="Add new user">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
      Add User
    </a>
  </header>

  <?php if ($flash_success): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
      <?php echo e($flash_success); ?>
    </div>
  <?php endif; ?>

  <?php if ($flash_error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
      <?php echo e($flash_error); ?>
    </div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="bg-red-200 border border-red-600 text-red-800 px-4 py-3 rounded mb-4" role="alert">
      <?php echo e($error); ?>
    </div>
  <?php endif; ?>

  <table class="w-full border-collapse border border-gray-300" role="grid" aria-label="Users list">
    <thead>
      <tr class="bg-gray-200">
        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Role</th>
        <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($users && $users->num_rows > 0): ?>
        <?php while ($user = $users->fetch_assoc()): ?>
          <tr>
            <td class="border border-gray-300 px-4 py-2"><?php echo e($user['id']); ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo e($user['name']); ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo e($user['email']); ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo e(strtoupper($user['role'])); ?></td>
            <td class="border border-gray-300 px-4 py-2 text-center space-x-2" role="cell">

              <!-- Edit -->
              <a href="edit_user.php?id=<?php echo e($user['id']); ?>" class="text-blue-600 hover:text-blue-800" title="Edit user <?php echo e($user['name']); ?>" aria-label="Edit user details">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-5.586-9.414a2 2 0 112.828 2.828L11 16l-4 1 1-4 7.414-7.414z" />
                </svg>
              </a>

              <!-- Delete -->
              <button type="button" onclick="showDeleteModal('<?php echo e($user['id']); ?>', '<?php echo e(addslashes($user['name'])); ?>', '<?php echo e(addslashes($user['email'])); ?>')" class="text-red-600 hover:text-red-800" aria-label="Delete user <?php echo e($user['name']); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z" />
                </svg>
              </button>

              <!-- Settings -->
              <a href="settings.php?id=<?php echo e($user['id']); ?>" title="Settings for <?php echo e($user['name']); ?>" aria-label="User settings">
                <img src="settings.svg" alt="Settings Icon" class="h-5 w-5 inline-block hover:scale-110 transition-transform" />
              </a>

            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center py-4">No users found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>      
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden items-center justify-center" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
  <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
    <h2 id="deleteModalTitle" class="text-xl font-semibold text-red-600 mb-4">Confirm Delete</h2>
    <p id="deleteInfo" class="mb-4 text-gray-700">Are you sure you want to delete this user?</p>
    <div class="flex justify-end space-x-3">
      <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>

      <!-- Delete form -->
      <form id="deleteForm" method="POST" action="delete_user.php" class="inline">
        <input type="hidden" name="id" id="deleteUserId" value="">
        <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
          Delete
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  const deleteModal = document.getElementById('deleteModal');
  const deleteInfo = document.getElementById('deleteInfo');
  const deleteUserId = document.getElementById('deleteUserId');

  function showDeleteModal(id, name, email) {
    deleteInfo.innerHTML = `
      Are you sure you want to delete the following user?<br><br>
      <strong>ID:</strong> ${id}<br>
      <strong>Name:</strong> ${name}<br>
      <strong>Email:</strong> ${email}
    `;
    deleteUserId.value = id;  // set hidden input value
    deleteModal.classList.remove('hidden');
    deleteModal.classList.add('flex');
  }

  function closeDeleteModal() {
    deleteModal.classList.remove('flex');
    deleteModal.classList.add('hidden');
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === "Escape" && !deleteModal.classList.contains('hidden')) {
      closeDeleteModal();
    }
  });
</script>

<?php require_once 'footer.php'; ?>
