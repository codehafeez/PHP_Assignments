<?php
if (isset($_POST['submit_btn'])) {
	$name = $_POST['name'];
	$recaptcha = $_POST['g-recaptcha-response'];
	$secret_key = '******************************************';
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='. $secret_key . '&response=' . $recaptcha;
	$response = file_get_contents($url);
	$response = json_decode($response);
	if ($response->success == true) {
		echo '<script>alert("Google reCAPTACHA verified")</script>';
	} else {
		echo '<script>alert("Error in Google reCAPTACHA")</script>';
	}
}
?>