<?php

$stmt = $conn->prepare("SELECT * FROM user_sessions WHERE user_id = ? AND id = ? LIMIT 1");
$stmt->bind_param("ii", $_SESSION['user_id'], $_SESSION['session_id']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0)
{
    $user = $result->fetch_assoc();    
    $session_active = $user['session_active'];
    $timeout = $user['session_destroy_seconds'];
    $created_at = $user['created_at'];
    $timestamp = strtotime($created_at); // convert to seconds

    echo "Action DB Seconds : ".$session_active."<br/>Action Session Seconds : ".$_SESSION['LAST_ACTIVITY']."<br/>DateTime Convert to Seconds : ".$timestamp."<br/><br/>";
    echo "DateTime : ".$created_at."<br>Session Expiry (Seconds): ".$timeout."<br/><br/>";

    $timeSession = time() - $session_active;
    echo "Session Time Seconds : ".$timeSession."<br/>";

    if ((time() - $session_active) > $timeout) {

        $id = $_SESSION['session_id'];
        $stmt = $conn->prepare("UPDATE user_sessions SET status = 0, session_destroy_seconds = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
    
}

?>
