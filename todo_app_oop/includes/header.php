<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check current page
$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/todo_app';
if (strpos($currentUri, $basePath) === 0) {
    $currentUri = substr($currentUri, strlen($basePath));
}
$isTasksPage = $currentUri === '/tasks' || $currentUri === '/';
$isProfilePage = strpos($currentUri, '/profile') !== false;
$isUsersPage = strpos($currentUri, '/users') !== false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/print.css') ?>">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="<?= base_url('tasks') ?>" class="text-xl font-bold hover:text-blue-200 transition-colors">Todo App</a>
            <div class="flex items-center space-x-3">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="mr-4 text-blue-100">Welcome, <?= htmlspecialchars($_SESSION['name']) ?></span>
                    
                    <?php if (isAdmin() && !$isUsersPage): ?>
                        <a href="<?= base_url('users') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                            Users
                        </a>
                    <?php endif; ?>

                    <!-- Show Home button only when NOT on tasks page -->
                    <?php if (!$isTasksPage): ?>
                        <a href="<?= base_url('tasks') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                            Tasks
                        </a>
                    <?php endif; ?>
                    
                    <!-- Show Profile button only when NOT on profile page -->
                    <?php if (!$isProfilePage): ?>
                        <a href="<?= base_url('profile') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                            Profile
                        </a>
                    <?php endif; ?>
                    
                    <a href="<?= base_url('logout') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                        Login
                    </a>
                    <a href="<?= base_url('register') ?>" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                        Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">