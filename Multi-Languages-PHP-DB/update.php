<?php

  include('db_connection.php');
  $name = $_POST['phrase'];
  $phrase = $_POST['phrase_name'];

  // echo $name;
  // echo "<pre>";
  // print_r($phrase);

  $count = -1;
  foreach ($phrase['name'] as $value) {
  	$count++;
  	// echo $phrase['id'][$count]." === ".$value."<br/>";
  	$id = $phrase['id'][$count];
  	

	  $sql = "UPDATE language SET $name= '$value' WHERE id = $id";
	  if ($conn->query($sql) === TRUE) {
	    // echo "Successfully updated";
	  } else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	  }

  }

	echo "Successfully updated";

?>