<?php
require_once __DIR__ . '/../config/database.php';

class Task {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll(?int $createdBy = null): array {
        try {
            $sql = "SELECT t.*, u.name as user_name 
                    FROM tasks t
                    JOIN users u ON t.user_id = u.id";
            
            if ($createdBy !== null) {
                $sql .= " WHERE t.user_id = ?";
            }
            
            $sql .= " ORDER BY t.id DESC";
            
            $stmt = $this->db->prepare($sql);
            
            if ($createdBy !== null) {
                $stmt->bind_param("i", $createdBy);
            }
            
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("Task getAll error: " . $e->getMessage());
            return [];
        }
    }    

    public function getByUserId(int $userId): array {
        try {
            $stmt = $this->db->prepare("
                SELECT * FROM tasks 
                WHERE user_id = ? 
                ORDER BY id DESC
            ");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("Task getByUserId error: " . $e->getMessage());
            return [];
        }
    }

    public function getById(int $id, int $userId): ?array {
        try {
            $query = isAdmin() ? 
                "SELECT * FROM tasks WHERE id = ?" :
                "SELECT * FROM tasks WHERE id = ? AND user_id = ?";
                
            $stmt = $this->db->prepare($query);
            
            if (isAdmin()) {
                $stmt->bind_param("i", $id);
            } else {
                $stmt->bind_param("ii", $id, $userId);
            }
            
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            error_log("Task getById error: " . $e->getMessage());
            return null;
        }
    }

    public function create(string $name, string $description, string $status, int $userId): bool {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO tasks 
                (task_name, task_description, task_status, user_id) 
                VALUES (?, ?, ?, ?)
            ");
            $stmt->bind_param("sssi", $name, $description, $status, $userId);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Task create error: " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, int $userId, string $name, string $description, string $status): bool {
        try {
            $query = isAdmin() ?
                "UPDATE tasks SET task_name = ?, task_description = ?, task_status = ? WHERE id = ?" :
                "UPDATE tasks SET task_name = ?, task_description = ?, task_status = ? WHERE id = ? AND user_id = ?";
                
            $stmt = $this->db->prepare($query);
            
            if (isAdmin()) {
                $stmt->bind_param("sssi", $name, $description, $status, $id);
            } else {
                $stmt->bind_param("sssii", $name, $description, $status, $id, $userId);
            }
            
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Task update error: " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id, int $userId): bool {
        try {
            $query = isAdmin() ?
                "DELETE FROM tasks WHERE id = ?" :
                "DELETE FROM tasks WHERE id = ? AND user_id = ?";
                
            $stmt = $this->db->prepare($query);
            
            if (isAdmin()) {
                $stmt->bind_param("i", $id);
            } else {
                $stmt->bind_param("ii", $id, $userId);
            }
            
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Task delete error: " . $e->getMessage());
            return false;
        }
    }
}