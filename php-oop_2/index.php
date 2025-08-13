<?php
// Include necessary files
require_once 'config/Database.php';
require_once 'models/Employee.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Employee object
$employee = new Employee($db);

// Example CRUD operations
try {
    // Create
    $employee->create("John Doe", "john@example.com");
    $employee->create("Jane Smith", "jane@example.com");
    
    // Read
    echo "<h2>All Employees:</h2>";
    $employees = $employee->read();
    foreach ($employees as $emp) {
        echo "ID: {$emp['id']}, Name: {$emp['name']}, Email: {$emp['email']}<br>";
    }
    
    // Update
    if (!empty($employees)) {
        $firstEmployeeId = $employees[0]['id'];
        $employee->update($firstEmployeeId, "Johnny Doe", "johnny@example.com");
        
        echo "<h2>After Update:</h2>";
        $updatedEmployees = $employee->read();
        foreach ($updatedEmployees as $emp) {
            echo "ID: {$emp['id']}, Name: {$emp['name']}, Email: {$emp['email']}<br>";
        }
    }
    
    // Delete
    if (!empty($employees)) {
        $employee->delete($firstEmployeeId);
        echo "<h2>After Delete:</h2>";
        $remainingEmployees = $employee->read();
        if (empty($remainingEmployees)) {
            echo "No employees found.";
        } else {
            foreach ($remainingEmployees as $emp) {
                echo "ID: {$emp['id']}, Name: {$emp['name']}, Email: {$emp['email']}<br>";
            }
        }
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>