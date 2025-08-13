<?php

function getDeviceType() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/mobile|android|iphone|ipad|tablet/i', $userAgent)) {
        return "Mobile";
    } else {
        return "Laptop/Desktop";
    }
}

function getOperatingSystem() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/windows/i', $userAgent)) {
        return "Windows";
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        return "Mac OS";
    } elseif (preg_match('/linux/i', $userAgent)) {
        return "Linux";
    } elseif (preg_match('/android/i', $userAgent)) {
        return "Android";
    } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
        return "iOS";
    } else {
        return "Unknown OS";
    }
}

$ipAddress = $_SERVER['REMOTE_ADDR'];
$deviceName = gethostbyaddr($ipAddress);
$deviceType = getDeviceType();
$operatingSystem = getOperatingSystem();

echo "IP Address: $ipAddress <br>";
echo "Device Name: $deviceName <br>";
echo "Device Type: $deviceType <br>";
echo "Operating System: $operatingSystem <br><br>";

$data = json_decode(file_get_contents("https://ipinfo.io/json"), true);
echo "Public IP Address: " . $data['ip'] . "<br> City: " . $data['city'] . "<br> Country: " . $data['country'];




?>
