<?php
require_once 'functions.php';
checkLogin();

$title = 'Dashboard';
$role = $_SESSION['role'];
$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

// Fetch tasks
if ($role === 'admin') {
    // $tasks = getAllTasks($conn);
    $tasks = getAllTasksWithUser($conn);
} else {
    $tasks = getTasksByUserId($conn, $user_id);
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-gray-100 min-h-screen font-sans">
<?php require_once 'header.php'; ?>
<body class="flex-1 flex flex-col items-center justify-center p-4">

<div class="w-full max-w-6xl bg-white p-6 rounded-lg shadow-lg mb-8 relative">

  <h1 class="text-3xl font-bold mb-4 text-center text-gray-700">
    Welcome, <?php echo htmlspecialchars($name); ?>!
  </h1>

  <!-- Top Action Buttons -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <?php if ($role === 'admin'): ?>
        <a href="users.php" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Users</a>
      <?php endif; ?>
      <a href="profile.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Profile</a>
      <a href="?logout=true" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Logout</a>
    </div>
    <div class="space-x-2">
      <a href="add_task.php" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
        + Add Task
      </a>
    </div>
  </div>

  <!-- Task Table -->
  <table class="w-full table-auto border border-gray-300">
    <thead class="bg-gray-200">
      <tr>
        <th class="border px-4 py-2 text-left">#</th>
        <?php if ($role === 'admin'): ?>
          <th class="border px-4 py-2">User</th>
        <?php endif; ?>
        <th class="border px-4 py-2 text-left">Title</th>
        <th class="border px-4 py-2 text-left">Description</th>
        <th class="border px-4 py-2 text-left">Status</th>
        <th class="border px-4 py-2 text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $i => $task): ?>
          <tr>
            <td class="border px-4 py-2"><?php echo $i + 1; ?></td>
            <?php if ($role === 'admin'): ?>
              <td class="border px-4 py-2"><?php echo htmlspecialchars($task['username']); ?></td>
            <?php endif; ?>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($task['task_name']); ?></td>
            <td class="border px-4 py-2"><?php echo $task['task_description']; ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars(ucfirst($task['task_status'])); ?></td>
            <td class="border border-gray-300 px-4 py-2 text-center space-x-2" role="cell">
              <!-- Edit -->
              <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-5.586-9.414a2 2 0 112.828 2.828L11 16l-4 1 1-4 7.414-7.414z" />
                </svg>
              </a>
<button 
  type="button" 
  class="delete-btn text-red-600 hover:text-red-800" 
  data-id="<?php echo htmlspecialchars($task['id']); ?>" 
  data-name="<?php echo htmlspecialchars($task['task_name']); ?>" 
  data-description="<?php echo htmlspecialchars($task['task_description']); ?>">
                <!-- Delete -->
               
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z" />
                </svg>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center py-4">No tasks found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Delete Modal: keep the same with a clear ID -->
<div id="deleteModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden items-center justify-center" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
  <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
    <h2 id="deleteModalTitle" class="text-xl font-semibold text-red-600 mb-4">Confirm Delete</h2>
    <div id="deleteModalContent" class="mb-4 text-gray-700"></div>
    <div class="flex justify-end space-x-3">
      <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
      <form id="deleteForm" method="POST" action="delete_task.php" class="inline">
        <input type="hidden" name="id" id="deleteTaskId" value="">
        <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      const name = btn.dataset.name;
      const description = btn.dataset.description;
      document.getElementById('deleteModalContent').innerHTML = `
        <p>Are you sure you want to delete this task?</p><br/>
        ID: ${id}<br/>Name: ${name}
      `;
      document.getElementById('deleteTaskId').value = id;
      document.getElementById('deleteModal').classList.remove('hidden');
      document.getElementById('deleteModal').classList.add('flex');
    });
  });

  // Close modal on escape
  document.addEventListener('keydown', (e) => {
    if (e.key === "Escape") closeDeleteModal();
  });
});

function closeDeleteModal() {
  const modal = document.getElementById('deleteModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}
</script>

<?php require_once 'footer.php'; ?>
</body>
</html>
