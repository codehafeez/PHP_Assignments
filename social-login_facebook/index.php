<?php
require_once 'config.php';

if (isset($accessToken))
{
	if (!isset($_SESSION['facebook_access_token'])) 
	{
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		$oAuth2Client = $fb->getOAuth2Client();
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} 
	else  {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
		
	try {
		$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
		$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
		$fb_user = $fb_response->getGraphUser();
		$picture = $fb_response_picture->getGraphUser();		
		$_SESSION['fb_user_id'] = $fb_user->getProperty('id');
		$_SESSION['fb_user_name'] = $fb_user->getProperty('name');
		$_SESSION['fb_user_email'] = $fb_user->getProperty('email');
		$_SESSION['fb_user_pic'] = $picture['url'];
		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Facebook API Error: ' . $e->getMessage();
		session_destroy();
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK Error: ' . $e->getMessage();
		exit;
	}
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login with Facebook</title>
</head>
<body>
<h1>Login with Facebook</h1>


<?php if(isset($_SESSION['fb_user_id'])): ?>
<ul style="margin-top:30px">
<img src="<?php echo  $_SESSION['fb_user_pic']; ?>">
	<li>Facebook ID: <?php echo  $_SESSION['fb_user_id']; ?></li>
	<li>Full Name: <?php echo $_SESSION['fb_user_name']; ?></li>
	<li>Email: <?php echo $_SESSION['fb_user_email']; ?></li>
</ul>
<a href="logout.php">Logout</a>


<?php else: ?>
<a href="<?= $fb_helper->getLoginUrl('http://localhost/facebook-login-php/')?>">Sign in with Facebook</a>
<?php endif ?>

</body>
</html>