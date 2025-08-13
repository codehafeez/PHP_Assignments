<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../includes/functions.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect('login');
            }

            $email = sanitize($_POST['email']);
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                redirect('tasks');
            } else {
                flash('error', 'Invalid email or password');
                redirect('login');
            }
        }

        set_previous_url();
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect('register');
            }

            $name = sanitize($_POST['name']);
            $email = sanitize($_POST['email']);
            $password = $_POST['password'];

            if (strlen($password) < 6) {
                flash('error', 'Password must be at least 6 characters');
                redirect('register');
            }

            if ($this->userModel->register($name, $email, $password)) {
                flash('success', 'Registration successful! Please login.');
                redirect('login');
            } else {
                flash('error', 'Registration failed. Email may already exist.');
                redirect('register');
            }
        }

        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function updateMyProfile() {
        checkLogin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect('profile');
            }

            $name = sanitize($_POST['name']);
            $email = sanitize($_POST['email']);
            $password = $_POST['password'];
            $userId = $_SESSION['user_id'];

            $userModel = new User();

            // Update name and email
            if ($userModel->updateMyProfile($userId, $name, $email)) {
                // Update session data
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;

                // Update password if provided
                if (!empty($password)) {
                    if (strlen($password) < 6) {
                        flash('error', 'Password must be at least 6 characters');
                        redirect('profile');
                    }
                    $userModel->changePassword($userId, $password);
                }

                flash('success', 'Profile updated successfully');
            } else {
                flash('error', 'Failed to update profile');
            }
        }

        redirect('profile');
    }

    public function logout() {
        session_destroy();
        redirect('login');
    }
}