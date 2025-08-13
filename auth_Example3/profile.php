<?php
session_start();
include('config.php');
include('auto_logout.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Fetch active sessions for the user
$stmt = $conn->prepare("SELECT * FROM user_sessions WHERE user_id = ? AND id <> ?");
$stmt->bind_param("ii", $user_id, $_SESSION['session_id']);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            display: inline;
        }
        button {
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            background-color: lightgreen;
            color: darkgreen;
            border: 1px solid green;
        }
    </style>
</head>
<body>

<h2>Welcome, <?= htmlspecialchars($user['username']); ?></h2>
<p>Email: <?= htmlspecialchars($user['email']); ?></p>
<p>Current Session ID: <?= htmlspecialchars($_SESSION['session_id']); ?></p>

<?php
// Check if there's a success message from the logout_device.php
if (isset($_SESSION['message'])) {
    echo "<div class='message'>{$_SESSION['message']}</div>";
    unset($_SESSION['message']); // Clear the message after displaying it
}

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Session ID</th>
            <th>User ID</th>
            <th>Status</th>
            <th>Session Active Since</th>
            <th>Session Expiry (Seconds)</th>
            <th>Action (Logout Device)</th>
          </tr>";

    while ($session = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($session['id']) . "</td>";
        echo "<td>" . htmlspecialchars($session['user_id']) . "</td>";
        echo "<td>" . ($session['status'] ? 'Active' : 'Inactive') . "</td>";
        echo "<td>" . htmlspecialchars($session['session_active']) . "</td>";
        echo "<td>" . htmlspecialchars($session['session_destroy_seconds']) . "</td>";

        // Only show the logout button if the session is active
        if ($session['status'] == 1) {
            echo "<td>
                    <form action='logout_device.php' method='POST'>
                        <input type='hidden' name='session_id' value='" . htmlspecialchars($session['id']) . "'>
                        <button type='submit'>Submit</button>
                    </form>
                  </td>";
        } else {
            echo "<td>Logout</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

$conn->close();
?>

<br><br>
<a href='logout.php'>Logout</a>
</body>
</html>
