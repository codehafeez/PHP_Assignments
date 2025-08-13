<?php 
require_once __DIR__ . '/../../includes/header.php';
checkLogin();
if (!isAdmin()) {
    redirect('tasks');
}
?>

<div class="container mx-auto max-w-6xl mt-10">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Users Management</h2>
            <div class="space-x-2">
                <button onclick="window.print()" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
                    <i class="fas fa-print mr-2"></i> Print
                </button>
                <a href="<?= base_url('users/export-pdf') ?>" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">
                    <i class="fas fa-file-pdf mr-2"></i> Export PDF
                </a>                
                <a href="<?= base_url('users/export') ?>" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Export Users
                </a>
                <a href="<?= base_url('users/import') ?>" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                    Import Users
                </a>
                <a href="<?= base_url('users/add') ?>" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Add User
                </a>
            </div>
        </div>

        <?php if ($success = flash('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error = flash('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Role</th>
                        <th class="py-3 px-4 text-left">Created At</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b">
                            <td class="py-3 px-4"><?= htmlspecialchars($user['id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($user['name']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    <?= $user['role'] === 'admin' ? 'bg-purple-200 text-purple-800' : 'bg-gray-200 text-gray-800' ?>">
                                    <?= ucfirst(htmlspecialchars($user['role'])) ?>
                                </span>
                            </td>
                            <td class="py-3 px-4"><?= date('M j, Y', strtotime($user['created_at'])) ?></td>
                            <td class="py-3 px-4 space-x-2">
                                <a href="<?= base_url('users/edit/' . $user['id']) ?>" 
                                   class="text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="<?= base_url('users/delete/' . $user['id']) ?>" method="POST" class="inline">
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