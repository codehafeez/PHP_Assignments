<?php 
$languagesData = include 'languages_view_data.php';
echo "<pre>";
print_r($languagesData);

	// ==> according to section select language and show data
	$selectedLanguage = $languagesData['english'];
	// $selectedLanguage = $languagesData['urdu'];
?>



<center>
<h1 style="margin-top:20px;">Multi Languages Example</h1>
<br/><hr/><h2><?=$selectedLanguage['v1']?></h2><hr/><br/>	
<br/><a href="#">English</a>
<br/><a href="#">Urdu</a>
</center>
