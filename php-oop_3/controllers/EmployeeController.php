<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Employee.php';

class EmployeeController {
    private $employee;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->employee = new Employee($db);
    }

    // List all employees
    public function index() {
        $employees = $this->employee->read();
        require_once __DIR__ . '/../views/employees/index.php';
    }

    // Show create form
    public function create() {
        require_once __DIR__ . '/../views/employees/create.php';
    }

    // Store new employee
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            if ($this->employee->create($name, $email)) {
                header('Location: /PHP-New-Assignments/php-oop_3/index.php?action=index');
                exit;
            } else {
                echo "Error creating employee";
            }
        }
    }

    // Show edit form
    public function edit($id) {
        $employees = $this->employee->read();
        $employee = null;
        
        foreach ($employees as $emp) {
            if ($emp['id'] == $id) {
                $employee = $emp;
                break;
            }
        }
        
        if ($employee) {
            require_once __DIR__ . '/../views/employees/edit.php';
        } else {
            echo "Employee not found";
        }
    }

    // Update employee
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            if ($this->employee->update($id, $name, $email)) {
                header('Location: /PHP-New-Assignments/php-oop_3/index.php?action=index');
                exit;
            } else {
                echo "Error updating employee";
            }
        }
    }

    // Delete employee
    public function delete($id) {
        if ($this->employee->delete($id)) {
            header('Location: /PHP-New-Assignments/php-oop_3/index.php?action=index');
            exit;
        } else {
            echo "Error deleting employee";
        }
    }
}
?>