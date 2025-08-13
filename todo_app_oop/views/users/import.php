<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<div class="container">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-6">Import Users</h2>

        <?php if ($error = flash('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="mb-6">
            <a href="<?= base_url('users/download-template') ?>" 
               class="inline-flex items-center bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Download Import Template
            </a>
        </div>

        <form method="POST" action="<?= base_url('users/import') ?>" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            
            <div class="mb-4">
                <label for="import_file" class="block text-gray-700 mb-2">Excel File</label>
                <input type="file" id="import_file" name="import_file" accept=".xlsx,.xls,.csv" required
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Please upload an Excel file (.xlsx, .xls) or CSV file</p>
            </div>

            <div class="mb-6">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                    <p class="font-bold">Note:</p>
                    <p>• The file should have columns in this order: ID, Name, Email, Role, Created At</p>
                    <p>• The first row will be treated as headers and skipped</p>
                    <p>• New users will be created with random passwords</p>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="<?= base_url('users') ?>" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
                <button type="submit" 
                        class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Import Users
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>