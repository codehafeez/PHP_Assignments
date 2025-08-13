<?php
session_start();
require_once 'functions.php';

$current_user_id = 1;

// Initialize database and notification
$db = new Database();
$notification = new Notification($db->connect());

// Get notifications
$notifications = $notification->getNotifications($current_user_id);
$unread_count = $notification->getUnreadCount($current_user_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notification System</title>
    <style>
        .notification {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            background: #fff;
        }
        .unread {
            background: #79909a;
            font-weight: bold;
        }
        .badge {
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
        }
        button {
            margin: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>


    <button onclick="addNotification()">Click to Add New Notification</button>
    <br/><br/>

    <h1>🔔 Notifications Not Read (<?php echo $unread_count; ?>)</h1>
    <button onclick="markAllRead()">Mark All as Read</button>
    
    <div id="notifications">
        <?php if(empty($notifications)): ?>
            <p>No notifications found.</p>
        <?php else: ?>
            <?php foreach($notifications as $notif): ?>
                <div class="notification <?php echo $notif['is_read'] ? '' : 'unread'; ?>">
                    <?php echo htmlspecialchars($notif['message']); ?>
                    <small><?php echo $notif['created_at']; ?></small>
                    <?php if($notif['is_read'] == 0): ?>
                        <button onclick="markRead(<?php echo $notif['id']; ?>)">Click to Read</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
    function addNotification() {
        fetch('functions.php?action=create')
            .then(response => response.json())
            .then(data => {
                if(data.success) location.reload();
            });
    } 
           
    function markRead(id) {
        fetch('functions.php?action=mark_read&id=' + id)
            .then(response => response.json())
            .then(data => {
                if(data.success) location.reload();
            });
    }
    
    function markAllRead() {
        fetch('functions.php?action=mark_all_read')
            .then(response => response.json())
            .then(data => {
                if(data.success) location.reload();
            });
    }
    </script>
</body>
</html>