<?php
session_start();
require_once 'db.php';

// Check if user is logged in, else redirect
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

// Handle logout
function handleLogout() {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

// Call handleLogout to process logout request
handleLogout();

// login
function loginUser($conn) {
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Search by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $stmt->close();
                header('Location: index.php'); // redirect after successful login
                exit;
            } else {
                $error = "Invalid password."; // password incorrect
            }
        } else {
            $error = "Invalid login credentials."; // email not exist
        }
        $stmt->close();
    }

    return $error;
}

// signup
function registerUser($conn) {
    $error = '';
    $success = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Basic validation
        if (empty($name) || empty($email) || empty($password)) {
            $error = "Please fill all fields.";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format.';
        }
        elseif (strlen($password) < 6) {
            $error = "Password must be at least 6 characters.";
        }        
        else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            if ($stmt->fetch()) {
                $error = "Email is already registered.";
                $stmt->close();
            } else {
                $stmt->close();

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user
                $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $hashed_password);
                if ($stmt->execute()) {
                    $success = "Registration successful! You can now <a href='login.php' class='text-blue-500 hover:underline'>login</a>.";
                } else {
                    $error = "Error: " . $conn->error;
                }
                $stmt->close();
            }
        }
    }

    return [$error, $success];
}

// change password
function changeUserPassword($conn, $user_id, $old_password, $new_password, $confirm_password) {
    $errors = [];
    $success_message = '';

    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $errors[] = 'Please fill in all fields.';
        return ['errors' => $errors, 'success' => $success_message];
    }
    elseif (strlen($new_password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
        return ['errors' => $errors, 'success' => $success_message];
    }        

    if ($new_password !== $confirm_password) {
        $errors[] = 'New password and confirmation do not match.';
        return ['errors' => $errors, 'success' => $success_message];
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($old_password, $user['password'])) {
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_stmt->bind_param("si", $hashed_new_password, $user_id);
            if ($update_stmt->execute()) {
                $success_message = 'Password updated successfully.';
            } else {
                $errors[] = 'Failed to update password.';
            }
            $update_stmt->close();
        } else {
            $errors[] = 'Old password is incorrect.';
        }
    } else {
        $errors[] = 'User not found.';
    }
    $stmt->close();

    return ['errors' => $errors, 'success' => $success_message];
}

// update profile
function updateUserProfile($conn, $user_id, $name, $email) {
    $errors = [];
    $success = '';

    // Validate name and email (basic validation)
    if (empty($name)) {
        $errors[] = 'Name cannot be empty.';
    }
    if (empty($email)) {
        $errors[] = 'Email cannot be empty.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    // Check if email is already taken by another user
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    $stmt->bind_param('si', $email, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = 'Email is already taken by another user.';
    }
    $stmt->close();

    // If no errors, update user profile in DB
    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param('ssi', $name, $email, $user_id);
        if ($stmt->execute()) {
            $success = 'Profile updated successfully.';
        } else {
            $errors[] = 'Failed to update profile. Please try again.';
        }
        $stmt->close();
    }

    return ['errors' => $errors, 'success' => $success];
}

// get users
function getAllUsersExceptCurrent($conn, $currentUserId) {
    $stmt = $conn->prepare("SELECT id, name, email, role FROM users WHERE id != ? ORDER BY id DESC");
    if (!$stmt) {
        return ['error' => $conn->error];
    }
    $stmt->bind_param("i", $currentUserId);
    if (!$stmt->execute()) {
        return ['error' => $stmt->error];
    }
    $result = $stmt->get_result();
    return $result;
}

// get user by ID
function getUserById($conn, $id) {
    $stmt = $conn->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// delete user by ID
function deleteUserById($conn, $id) {
    if (!is_numeric($id) || $id <= 0) {
        return ['error' => 'Invalid user ID'];
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return ['success' => 'User deleted successfully.'];
    } else {
        return ['error' => 'Failed to delete user.'];
    }
}

// Update User
function updateUser($conn, $userId, $name, $email, $role, $password = '') {
    $errors = [];

    // Validate inputs
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (!in_array($role, ['user', 'admin'])) {
        $errors[] = "Role must be either 'user' or 'admin'.";
    }

    // Check if email is taken by another user
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    if (!$stmt) {
        $errors[] = "Database error: " . $conn->error;
        return ['errors' => $errors];
    }
    $stmt->bind_param("si", $email, $userId);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Email is already taken by another user.";
    }
    $stmt->close();

    if (!empty($errors)) {
        return ['errors' => $errors];
    }

    // Update user with or without password
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ?, password = ? WHERE id = ?");
        if (!$stmt) {
            $errors[] = "Database error: " . $conn->error;
            return ['errors' => $errors];
        }
        $stmt->bind_param("ssssi", $name, $email, $role, $hashed_password, $userId);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
        if (!$stmt) {
            $errors[] = "Database error: " . $conn->error;
            return ['errors' => $errors];
        }
        $stmt->bind_param("sssi", $name, $email, $role, $userId);
    }

    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => "User updated successfully."];
    } else {
        $errors[] = "Failed to update user: " . $stmt->error;
        $stmt->close();
        return ['errors' => $errors];
    }
}

function getAllTasks($conn) {
    $stmt = $conn->prepare("SELECT * FROM tasks ORDER BY id DESC");
    if (!$stmt) {
        return [];
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $tasks = [];
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
    $stmt->close();
    return $tasks;
}

function getAllTasksWithUser($conn) {
    $sql = "SELECT tasks.*, users.name AS username
            FROM tasks
            JOIN users ON tasks.user_id = users.id
            ORDER BY tasks.id DESC";
    $result = $conn->query($sql);
    if (!$result) {
        return [];
    }
    $tasks = [];
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
    return $tasks;
}

// get tasks by user id
function getTasksByUserId($conn, $user_id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY id DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $tasks = [];
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
    $stmt->close();
    return $tasks;
}

// Add Task
function addTask($conn, $task_name, $task_description, $task_status, $user_id) {
    $errors = '';
    $success = '';

    // Validation
    if (trim($task_name) === '') {
        $errors = 'Task name is required.';
    }
    if (trim($task_description) === '') {
        $errors = 'Task description is required.';
    }
    if (trim($task_status) === '') {
        $errors = 'Task status is required.';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_description, task_status, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $task_name, $task_description, $task_status, $user_id);
        if ($stmt->execute()) {
            $success = 'Task added successfully!';
        } else {
            $errors = 'Failed to add task.';
        }
        $stmt->close();
    }

    return ['errors' => $errors, 'success' => $success];
}

function deleteTaskUserById($conn, $taskId, $userId) {
    $stmt = $conn->prepare("SELECT id FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $taskId, $userId);
    $stmt->execute();
    if ($stmt->fetch() === false) {
        $stmt->close();
        return ['error' => 'Task not found or you do not have permission.'];
    }
    $stmt->close();

    // Delete task
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $taskId);

    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => 'Task deleted successfully.'];
    } else {
        $stmt->close();
        return ['error' => 'Failed to delete task.'];
    }
}

// Fetch a task by ID, ensuring it belongs to current user
function getTaskById($conn, $taskId, $userId) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
    if (!$stmt) return false;
    $stmt->bind_param("ii", $taskId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = $result->fetch_assoc();
    $stmt->close();
    return $task;
}

// Update a task with new data
function updateTask($conn, $taskId, $userId, $name, $description, $status) {
    // Verify ownership
    $stmt_check = $conn->prepare("SELECT id FROM tasks WHERE id = ? AND user_id = ?");
    if (!$stmt_check) return ['error'=>"Database error: " . $conn->error];
    $stmt_check->bind_param("ii", $taskId, $userId);
    $stmt_check->execute();
    if (!$stmt_check->fetch()) {
        $stmt_check->close();
        return ['error'=>'Task not found or access denied.'];
    }
    $stmt_check->close();

    // Proceed to update
    $stmt = $conn->prepare("UPDATE tasks SET task_name = ?, task_description = ?, task_status = ? WHERE id = ?");
    if (!$stmt) return ['error'=>"Database error: " . $conn->error];

    $stmt->bind_param("sssi", $name, $description, $status, $taskId);
    if ($stmt->execute()) {
        $stmt->close();
        return ['success'=>"Task updated successfully."];
    } else {
        $stmt->close();
        return ['error'=>"Failed to update task."];
    }
}

?>
