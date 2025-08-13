<?php
require 'vendor/autoload.php';
use Picqer\Barcode\BarcodeGeneratorPNG;

$data = '123456789012';
$generator = new BarcodeGeneratorPNG();
header('Content-Type: image/png');

$directory = 'images';
$filename = 'barcode.png';
$filepath = $directory . '/' . $filename;


$barcode_type = $generator::TYPE_CODE_128;        // Alphanumeric (recommended)
// $barcode_type = $generator::TYPE_CODE_39;      // Alphanumeric
// $barcode_type = $generator::TYPE_EAN_13;       // 13-digit numeric (standard product barcodes)
// $barcode_type = $generator::TYPE_EAN_8;        // 8-digit numeric
// $barcode_type = $generator::TYPE_UPC_A;        // 12-digit numeric
// $barcode_type = $generator::TYPE_STANDARD_2_5; // Numeric only
// echo $generator->getBarcode($data, $barcode_type);



// 1. Create images folder if not exists
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

// 2. Generate barcode image data
$barcodeData = $generator->getBarcode($data, $barcode_type);
file_put_contents($filepath, $barcodeData);

if (file_exists($filepath)) {
    header('Content-Type: image/png');
    readfile($filepath);
} else {
    echo "Barcode image not found.";
}
