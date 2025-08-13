<?php
class Employee {
    private $conn;
    private $table_name = "employees";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create new employee
    public function create($name, $email) {
        $query = "INSERT INTO {$this->table_name} (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        
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
        
        // Sanitize data
        $id = htmlspecialchars(strip_tags($id));
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        
        return $stmt->execute();
    }

    // Delete employee by id
    public function delete($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $id = htmlspecialchars(strip_tags($id));
        
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>