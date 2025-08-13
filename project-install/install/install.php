<?php
// install/install.php
if (file_exists('../config.php')) {
    die('Installation already completed.');
}

require 'functions.php';

$errors = [];
$inputs = sanitizeInputs($_POST);

// Validate inputs
if (empty($inputs['db_host'])) $errors[] = 'Database host is required';
if (empty($inputs['db_name'])) $errors[] = 'Database name is required';
if (empty($inputs['db_user'])) $errors[] = 'Database user is required';
if (!filter_var($inputs['admin_email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email address';
if (strlen($inputs['admin_password']) < 8) $errors[] = 'Password must be at least 8 characters';

if (empty($errors)) {
    // Test database connection
    $conn = @new mysqli($inputs['db_host'], $inputs['db_user'], $inputs['db_pass']);
    
    if ($conn->connect_error) {
        $errors[] = "Database connection failed: " . $conn->connect_error;
    } else {
        // Create database if not exists
        if (!$conn->query("CREATE DATABASE IF NOT EXISTS `{$inputs['db_name']}`")) {
            $errors[] = "Error creating database: " . $conn->error;
        }
        
        // Select the database
        $conn->select_db($inputs['db_name']);
        
        // ================================================================
        // ================================================================
        // ================================================================

        // $sql = "CREATE TABLE IF NOT EXISTS `users` (
        //     `id` INT AUTO_INCREMENT PRIMARY KEY,
        //     `email` VARCHAR(255) NOT NULL UNIQUE,
        //     `password` VARCHAR(255) NOT NULL,
        //     `is_admin` TINYINT(1) DEFAULT 0,
        //     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        // );
        // CREATE TABLE IF NOT EXISTS `products` (
        //     `id` INT AUTO_INCREMENT PRIMARY KEY,
        //     `name` VARCHAR(255) NOT NULL,
        //     `description` TEXT,
        //     `price` DECIMAL(10,2) NOT NULL,
        //     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        //     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // )";
        // if (!$conn->multi_query($sql)) {
        //     $errors[] = "Error creating tables: " . $conn->error;
        // } else {
        //     while ($conn->next_result()) { /* flush */ }
        //     $hashedPassword = password_hash($admin_password, PASSWORD_DEFAULT);
        //     $stmt = $conn->prepare("INSERT INTO `users` (email, password, is_admin) VALUES (?, ?, 1)");
        //     $stmt->bind_param("ss", $admin_email, $hashedPassword);
        // if (!$stmt->execute()) {
        //     $errors[] = "Error creating admin user: " . $stmt->error;
        // }
        // $stmt->close();
        // if (empty($errors)) {
        //     $sampleProducts = [
        //         [
        //             'name' => 'Premium Widget', 
        //             'description' => 'Our highest quality widget with lifetime warranty',
        //             'price' => 49.99
        //         ],
        //         [
        //             'name' => 'Standard Widget', 
        //             'description' => 'Reliable everyday widget for general use',
        //             'price' => 29.99
        //         ],
        //         [
        //             'name' => 'Starter Kit', 
        //             'description' => 'Everything you need to get started',
        //             'price' => 89.99
        //         ],
        //         [
        //             'name' => 'Deluxe Bundle', 
        //             'description' => 'Premium package with all accessories',
        //             'price' => 149.99
        //         ],
        //         [
        //             'name' => 'Basic Component', 
        //             'description' => 'Essential component for simple projects',
        //             'price' => 9.99
        //         ]
        //     ];
        //     $productStmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        //     foreach ($sampleProducts as $product) {
        //         $productStmt->bind_param("ssd", 
        //             $product['name'],
        //             $product['description'],
        //             $product['price']
        //         );
        //         if (!$productStmt->execute()) {
        //             $errors[] = "Failed to add sample product: " . $productStmt->error;
        //             break;
        //         }
        //     }
        //     $productStmt->close();
        // }

        // ================================================================
        // ================================================================
        // ================================================================

        // Create tables using multi_query
        $sql = file_get_contents('schema.sql');
        if ($conn->multi_query($sql)) {
            // Important: Clear all results from multi_query
            do {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            } while ($conn->next_result());
            
            // Now it's safe to run other queries
            $hashedPassword = password_hash($inputs['admin_password'], PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (email, password, is_admin) VALUES (?, ?, 1)");
            
            if (!$stmt) {
                $errors[] = "Prepare failed: " . $conn->error;
            } else {
                $stmt->bind_param("ss", $inputs['admin_email'], $hashedPassword);
                
                if (!$stmt->execute()) {
                    $errors[] = "Error creating admin user: " . $stmt->error;
                }
                $stmt->close();
            }
            
            // Create config file if no errors
            if (empty($errors)) {
                if (!createConfigFile($inputs)) {
                    $errors[] = "Could not create config file. Check directory permissions.";
                } else {
                    header('Location: success.php');
                    exit;
                }
            }
        } else {
            $errors[] = "Error creating tables: " . $conn->error;
        }
        $conn->close();
    }
}

// If errors occurred, show them
require 'index.php';