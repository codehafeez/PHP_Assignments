<?php
function myFun(){
	$arr = func_get_args(); // get all parameters pass from function
	echo "<pre>";
	print_r($arr);
}
echo "<br/><hr/><h2>func_get_args => function pass multiple parameters</h2>";
myFun("Hafeez", "Noman", "Ali"); // pass multiple parameters





echo "<br/><hr/><h2>glob => Get all images from folder</h2>";
$arr = glob("my_images/*.jpeg");
echo "<pre>";
print_r($arr);

foreach ($arr as $value) {
	echo "<img style='width:100px;' src='$value'/>";
}