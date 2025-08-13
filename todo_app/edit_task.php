<?php
require_once 'functions.php';
checkLogin();

// Check if 'id' parameter is provided
if (!isset($_GET['id'])) {
    $_SESSION['flash_error'] = 'Task ID not specified.';
    header('Location: index.php');
    exit;
}

$task_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

// Fetch existing task data (ensure it belongs to user)
$task = getTaskById($conn, $task_id, $user_id);
if (!$task) {
    $_SESSION['flash_error'] = 'Task not found or access denied.';
    header('Location: index.php');
    exit;
}

$title = "Edit Task - " . htmlspecialchars($task['task_name']);

$errors = [];
// Initialize fields with existing data
$task_name = $task['task_name'];
$task_description = $task['task_description'];
$task_status = $task['task_status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from form
    $task_name = trim($_POST['task_name'] ?? '');
    $task_description = trim($_POST['task_description'] ?? '');
    $task_status = trim($_POST['task_status'] ?? '');

    // Validation
    if ($task_name === '') {
        $errors[] = 'Task name is required.';
    }
    if ($task_description === '') {
        $errors[] = 'Task description is required.';
    }
    if ($task_status === '') {
        $errors[] = 'Task status is required.';
    }

    if (empty($errors)) {
        // Update task
        $result = updateTask($conn, $task_id, $user_id, $task_name, $task_description, $task_status);
        if (isset($result['success'])) {
            $_SESSION['flash_success'] = $result['success'];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = $result['error'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>
<head>
  <title><?php echo htmlspecialchars($title); ?></title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100 p-6">
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

  <?php if (!empty($errors)): ?>
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" action="">
    <!-- Task Name -->
    <div class="mb-4">
      <label class="block font-semibold mb-1" for="task_name">Task Name</label>
      <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task_name); ?>" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Description -->
    <div class="mb-4">
      <label class="block font-semibold mb-1" for="editor">Task Description</label>
      <div id="editor" style="height: 200px; background: white; border: 1px solid #cbd5e1; border-radius: 0.375rem; padding: 0.5rem;"><?php echo htmlspecialchars($task_description); ?></div>
      <input type="hidden" name="task_description" id="task_description" value="<?php echo htmlspecialchars($task_description); ?>">
    </div>

    <!-- Status -->
    <div class="mb-4">
      <label class="block font-semibold mb-1" for="task_status">Task Status</label>
      <select id="task_status" name="task_status" class="w-full border px-3 py-2 rounded" required>
        <option value="">-- Select Status --</option>
        <option value="Pending" <?php echo ($task_status === 'Pending') ? 'selected' : ''; ?>>Pending</option>
        <option value="In Progress" <?php echo ($task_status === 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
        <option value="Completed" <?php echo ($task_status === 'Completed') ? 'selected' : ''; ?>>Completed</option>
      </select>
    </div>

    <div class="flex justify-between items-center">
      <a href="index.php" class="text-gray-600 hover:underline">Cancel</a>
      <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
    </div>

  </form>
</div>

<!-- Include Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  // Initialize Quill editor
  const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ header: [1, 2, false] }],
        ['bold', 'italic', 'underline'],
        ['link', 'blockquote', 'code-block'],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ]
    }
  });

  // Populate Quill with existing description
  const existingDescription = <?php echo json_encode($task_description ?? ''); ?>;
  if (existingDescription) {
    quill.root.innerHTML = existingDescription;
  }

  // Sync Quill content to hidden input before submitting
  document.querySelector('form').addEventListener('submit', () => {
    document.getElementById('task_description').value = quill.root.innerHTML;
  });
</script>
<?php require_once 'footer.php'; ?>
</body>
</html>