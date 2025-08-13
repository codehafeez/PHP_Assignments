<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<div class="container mx-auto max-w-md mt-10">
    <div class="bg-white rounded-lg shadow p-6 text-center">
        <h1 class="text-2xl font-bold mb-4">500 - Server Error</h1>
        <p class="mb-6">Something went wrong on our end. Please try again later.</p>
        <a href="<?= base_url('tasks') ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Return to Home
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>