<?php
require_once('vendor/autoload.php');

$google_client = new Google_Client();
$google_client->setClientId('*******************************************');
$google_client->setClientSecret('***************************************');
$google_client->setRedirectUri('http://localhost/google-login-php');
$google_client->addScope('email');
$google_client->addScope('profile');

session_start();
?>