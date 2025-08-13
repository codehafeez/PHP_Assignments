<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Tasks Management</h1>
            <a href="<?= base_url('tasks/add') ?>" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add Task
            </a>
        </div>

        <?php if ($message = flash('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <?php if ($error = flash('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Add Filter Form -->
        <form method="GET" action="<?= base_url('tasks') ?>" class="mb-6">
            <div class="flex items-center space-x-4">
                <div class="w-full md:w-1/4">
                    <select id="created_by" name="created_by" onchange="this.form.submit()"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Users</option>
                        <?php foreach ($allUsers as $user): ?>
                            <option value="<?= $user['id'] ?>" <?= (isset($_GET['created_by']) && $_GET['created_by'] == $user['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($user['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if (isset($_GET['created_by'])): ?>
                    <a href="<?= base_url('tasks') ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Clear Filter
                    </a>
                <?php endif; ?>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 text-left">Title</th>
                        <th class="py-3 px-4 text-left">Description</th>
                        <th class="py-3 px-4 text-left w-1/6 whitespace-nowrap">Status</th>
                        <?php if (isAdmin()): ?>
                            <th class="py-3 px-4 text-left">Created By</th>
                        <?php endif; ?>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr class="border-b">
                            <td class="py-3 px-4"><?= htmlspecialchars($task['task_name']) ?></td>
                            <td class="py-3 px-4"><?= nl2br(htmlspecialchars($task['task_description'])) ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    <?= $task['task_status'] === 'Completed' ? 'bg-green-200 text-green-800' : 
                                       ($task['task_status'] === 'In Progress' ? 'bg-blue-200 text-blue-800' : 'bg-yellow-200 text-yellow-800') ?>">
                                    <?= htmlspecialchars($task['task_status']) ?>
                                </span>
                            </td>
                            <?php if (isAdmin()): ?>
                                <td class="py-3 px-4"><?= htmlspecialchars($task['user_name'] ?? 'N/A') ?></td>
                            <?php endif; ?>
                            <td class="py-3 px-4 space-x-2">
                                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" 
                                   class="text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="<?= base_url('tasks/delete/' . $task['id']) ?>" method="POST" class="inline">
                                    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>