<?php
include('config.php');
if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token']=$token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        $_SESSION['user_email_address'] =$data['email'];
        $_SESSION['user_first_name'] =$data['given_name'];
        $_SESSION['user_last_name'] = $data['family_name'];
        $_SESSION['user_picture'] = $data['picture'];
    }
}
?>
<html>
<head>
<title>PHP Login using Google Account</title>
</head>
<body>
<h2 align="center">PHP Login using Google Account</h2>

<?php
if(isset($_SESSION['user_email_address'])){ ?>
	<img src="<?=$_SESSION['user_picture']?>">
<ul>
<li>Name :  <?=$_SESSION['user_first_name']?> <?=$_SESSION['user_last_name']?></li>
<li>Email : <?=$_SESSION['user_email_address']?> </li>
</ul>
<a href="logout.php">Logout</a>

<?php } else { ?>
	<a href="<?=$google_client->createAuthUrl()?>">Login with Google</a>
<?php } ?>

</body>
</html>
