<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Base URL helper
function base_url(string $path = ''): string {
    $basePath = '/todo_app';
    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
}

// Redirect helper
function redirect(string $path): void {
    header('Location: ' . base_url($path));
    exit;
}

// Authentication functions
function checkLogin(): void {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['redirect_to'] = current_url();
        redirect('login');
    }
}

function isAdmin(): bool {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Current user ID
function current_user_id(): ?int {
    return $_SESSION['user_id'] ?? null;
}

// CSRF protection
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validate_csrf(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Input sanitization
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Flash message system
function flash(string $name, string $message = ''): ?string {
    if (!empty($message)) {
        $_SESSION[$name] = $message;
        return null;
    }
    
    if (isset($_SESSION[$name])) {
        $message = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $message;
    }
    
    return null;
}

// URL helpers
function current_url(): string {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function previous_url(): ?string {
    return $_SESSION['previous_url'] ?? null;
}

function set_previous_url(): void {
    $_SESSION['previous_url'] = current_url();
}

// Asset helper
function asset_url(string $path): string {
    return base_url('public/' . ltrim($path, '/'));
}