<?php

  include('db_connection.php');
  $name = $_POST['language_name'];
  
  $sql = "ALTER TABLE language ADD $name varchar(255)";
  if ($conn->query($sql) === TRUE) {
    echo "Language name successfully added";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



?>