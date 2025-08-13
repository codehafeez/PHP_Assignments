<?php
require_once 'functions.php';
checkLogin();

$title = 'Add Task';
$errors = '';
$success = '';

$task_name = '';
$task_description = '';
$task_status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = trim($_POST['task_name'] ?? '');
    $task_description = trim($_POST['task_description'] ?? '');
    $task_status = trim($_POST['task_status'] ?? '');
    $user_id = $_SESSION['user_id'];

    $result = addTask($conn, $task_name, $task_description, $task_status, $user_id);
    $errors = $result['errors'];
    $success = $result['success'];

    if (empty($errors)) {
        // Reset form fields
        $task_name = '';
        $task_description = '';
        $task_status = '';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>
<head>
  <title><?php echo $title; ?></title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100 p-6 font-sans">

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-4">Add Task</h1>

  <?php if (!empty($errors)): ?>
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
      <?php echo $errors; ?>
    </div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
      <?php echo $success; ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <!-- Task Name -->
    <div class="mb-4">
      <label class="block font-semibold mb-1">Task Name</label>
      <input type="text" name="task_name" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Description -->
    <div class="mb-4">
      <label class="block font-semibold mb-1">Task Description</label>
      <div id="editor" style="height: 200px; background: white; border: 1px solid #cbd5e1; border-radius: 0.375rem; padding: 0.5rem;"></div>
      <input type="hidden" name="task_description" id="task_description_input">
    </div>

    <!-- Status -->
    <div class="mb-4">
      <label class="block font-semibold mb-1">Task Status</label>
      <select name="task_status" class="w-full border px-3 py-2 rounded" required>
        <option value="">-- Select Status --</option>
        <option value="Pending">Pending</option>
        <option value="In Progress">In Progress</option>
        <option value="Completed">Completed</option>
      </select>
    </div>

    <div class="flex justify-between items-center">
      <a href="index.php" class="text-gray-600 hover:underline">Cancel</a>
      <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Add Task</button>
    </div>
  </form>

</div>

<!-- Quill -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
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

  document.querySelector('form').addEventListener('submit', function () {
    document.getElementById('task_description_input').value = quill.root.innerHTML;
  });  
</script>

<?php require_once 'footer.php'; ?>
</body>
</html>
