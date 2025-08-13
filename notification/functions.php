<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'demo_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        return $this->conn;
    }
}

class Notification {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Handle AJAX requests
    public function handleRequest() {
        if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
            header('Content-Type: application/json');
            
            try {
                switch($_GET['action']) {
                    case 'create':
                        $success = $this->create(1, 'hello test msg');
                        echo json_encode(['success' => $success]);
                        break;
                    case 'mark_read':
                        $success = $this->markAsRead($_GET['id']);
                        echo json_encode(['success' => $success]);
                        break;
                    case 'mark_all_read':
                        $success = $this->markAllAsRead(1);
                        echo json_encode(['success' => $success]);
                        break;
                }
            } catch(Exception $e) {
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
            exit;
        }
    }

    public function create($user_id, $message) {
        $query = "INSERT INTO notifications (user_id, message, is_read, created_at) VALUES (?, ?, 0, NOW())";        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $user_id, $message);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to create notification");
        }

        return true;
    }

    public function getNotifications($user_id, $limit = 10) {
        $query = "SELECT * FROM notifications 
                  WHERE user_id = ? 
                  ORDER BY created_at DESC 
                  LIMIT ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $notifications = [];
        while ($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }
        
        return $notifications;
    }

    public function getUnreadCount($user_id) {
        $query = "SELECT COUNT(*) FROM notifications 
                  WHERE user_id = ? AND is_read = 0";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        return $count;
    }

    public function markAsRead($id) {
        $query = "UPDATE notifications 
                  SET is_read = 1 
                  WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function markAllAsRead($user_id) {
        $query = "UPDATE notifications 
                  SET is_read = 1 
                  WHERE user_id = ? AND is_read = 0";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        return $stmt->execute();
    }
}

// Initialize and handle AJAX requests if any
$db = new Database();
$notification = new Notification($db->connect());
$notification->handleRequest();