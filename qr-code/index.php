<?php
include 'phpqrcode/qrlib.php';
$text = "www.codehafeez.com";
$file = 'images/'.uniqid().".png";
$ecc = 'L';
$pixel_Size = 10;
QRcode::png($text, $file, $ecc, $pixel_Size);
echo "<center><img src='".$file."'></center>";
?>