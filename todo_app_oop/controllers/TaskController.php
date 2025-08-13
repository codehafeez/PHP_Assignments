<?php
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../includes/functions.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        checkLogin();
        $userId = current_user_id();
        $isAdmin = isAdmin();

        // Get all users for filter dropdown (admin only)
        $allUsers = [];
        if ($isAdmin) {
            $userModel = new User();
            $allUsers = $userModel->getAllExcept($userId);
        }

        // Get filtered tasks
        $createdBy = $_GET['created_by'] ?? null;
        $tasks = $isAdmin ? $this->taskModel->getAll($createdBy) : $this->taskModel->getByUserId($userId);

        require_once __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        checkLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect('tasks/add');
            }

            $name = sanitize($_POST['task_name']);
            $description = sanitize($_POST['task_description']);
            $status = sanitize($_POST['task_status']);
            $userId = current_user_id();

            if ($this->taskModel->create($name, $description, $status, $userId)) {
                flash('success', 'Task created successfully');
                redirect('tasks');
            } else {
                flash('error', 'Failed to create task');
                redirect('tasks/add');
            }
        }

        require_once __DIR__ . '/../views/tasks/add.php';
    }

    public function edit($id) {
        checkLogin();
        $userId = current_user_id();
        $task = $this->taskModel->getById($id, $userId);

        if (!$task && !isAdmin()) {
            flash('error', 'Task not found or access denied');
            redirect('tasks');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect("tasks/edit/$id");
            }

            $name = sanitize($_POST['task_name']);
            $description = sanitize($_POST['task_description']);
            $status = sanitize($_POST['task_status']);

            if ($this->taskModel->update($id, $userId, $name, $description, $status)) {
                flash('success', 'Task updated successfully');
                redirect('tasks');
            } else {
                flash('error', 'Failed to update task');
                redirect("tasks/edit/$id");
            }
        }

        require_once __DIR__ . '/../views/tasks/edit.php';
    }

    public function delete($id) {
        checkLogin();
        $userId = current_user_id();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && validate_csrf($_POST['csrf_token'])) {
            if ($this->taskModel->delete($id, $userId)) {
                flash('success', 'Task deleted successfully');
            } else {
                flash('error', 'Failed to delete task');
            }
        }

        redirect('tasks');
    }
}