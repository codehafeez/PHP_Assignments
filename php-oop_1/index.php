<!-- 
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
 -->
 
<?php
// Database connection class
class Database {
    private $host = 'localhost';
    private $db_name = 'hafeez_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Employee class for CRUD
class Employee {
    private $conn;
    private $table_name = "employees";

    public function __construct($db){
        $this->conn = $db;
    }

    // Create new employee
    public function create($name, $email) {
        $query = "INSERT INTO {$this->table_name} (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Read all employees
    public function read() {
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update employee by id
    public function update($id, $name, $email) {
        $query = "UPDATE {$this->table_name} SET name=:name, email=:email WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Delete employee by id
    public function delete($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

// Usage example
$db = new Database();
$conn = $db->getConnection();

$employee = new Employee($conn);

// Create a new employee
$employee->create("John Doe", "john@example.com");

// Read employees
$employees = $employee->read();
print_r($employees);

// Update employee with id 1
$employee->update(1, "Johnny Doe", "johnny@example.com");

// Delete employee with id 1
$employee->delete(1);
?>
