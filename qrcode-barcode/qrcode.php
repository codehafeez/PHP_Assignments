<?php
require 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

$qrText = 'https://codehafeez.com/';
$directory = 'images';
$savePath = $directory . '/qrcode.png';

// Auto-create folder if it doesn't exist
if (!is_dir($directory)) {
    mkdir($directory, 0755, true); // 0755 permissions, true = recursive
}

$result = Builder::create()
    ->writer(new PngWriter())
    ->data($qrText)
    ->size(300)
    ->margin(10)
    ->build();

// Save to file
file_put_contents($savePath, $result->getString());

// Show image in browser
header('Content-Type: image/png');
echo $result->getString();
