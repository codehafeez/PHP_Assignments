<?php
 // Include the autoloader provided in the SDK
require_once(__DIR__.'/Facebook/autoload.php');
define('APP_ID', '*****************************');
define('APP_SECRET', '*************************');
define('API_VERSION', 'v2.5');

if(!session_id()){
    session_start();
}

// Call Facebook API
$fb = new Facebook\Facebook([
 'app_id' => APP_ID,
 'app_secret' => APP_SECRET,
 'default_graph_version' => API_VERSION,
]);


$fb_helper = $fb->getRedirectLoginHelper();
try {
    if(isset($_SESSION['facebook_access_token']))
		{$accessToken = $_SESSION['facebook_access_token'];}
	else
		{$accessToken = $fb_helper->getAccessToken();}
} catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
}
?>