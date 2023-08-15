<?php

	include('db_connection.php');
	$name = $_POST['phrase_name'];
  
	$sql = "INSERT INTO language (phrase) VALUES ('$name')";
	if ($conn->query($sql) === TRUE) {
		echo "Phrase name successfully added";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}



?>