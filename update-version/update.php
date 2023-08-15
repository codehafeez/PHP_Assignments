<?php
  
	$url = 'https://qzdevelopers.com/img/qzdevelopers.png';
	$dir = __DIR__ . "/images"; // Full Path
	$name = 'logo.png';
	is_dir($dir) || @mkdir($dir) || die("Can't Create folder");
	copy($url, $dir . DIRECTORY_SEPARATOR . $name);


	$url = 'https://codehafeez.com/style.css';
	$dir = __DIR__ . "/css"; // Full Path
	$name = 'style.css';
	is_dir($dir) || @mkdir($dir) || die("Can't Create folder");
	copy($url, $dir . DIRECTORY_SEPARATOR . $name);
?>

<h1>Successfully Update</h1>
<hr/>
<a href="index.php">Back to Home</a>



