<html>
<head>
<title>Google Cloud Translate</title>
</head>
<body>

	<h2 style="text-align:center; margin-top:50px;">English to Urdu - Google Cloud Translate</h2>

<?php

	// https://cloud.google.com/translate/docs/languages
	require_once ('vendor/autoload.php');
	use \Statickidz\GoogleTranslate;

	$text = 'Hello World';
	$english = 'en';
	$urdu = 'ur';
	$dutch = 'nl';
	
	$trans = new GoogleTranslate();
	$result = $trans->translate($english, $urdu, $text);

	echo '<h2>'.$result.'</h2>';
?>

</body>
</htmL>