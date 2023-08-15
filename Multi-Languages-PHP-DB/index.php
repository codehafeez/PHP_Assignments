<?php
  include('db_connection.php');
  session_start();
  $_SESSION["language_selected"] = "English";   

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Multi Language PHP - Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

  <h2 style="text-align:center;">Multi Language PHP - Example</h2>
  <a href="phrase.php" class="btn btn-primary">Add Phrase</a>
  <br/><br/>


  <form action="save_language.php" method="post">
  <input style="padding:3px;" type="text" name="language_name" placeholder="Language Name">
  <input type="submit" class="btn btn-success" value="Submit">
  </form>


  <table style="margin-top:20px;" class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Language</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SHOW COLUMNS FROM language WHERE field != 'id' AND field != 'phrase';";
        $result = $conn->query($sql);
        $count = 0;
        while($row = $result->fetch_assoc()) { 
          $count++;
          echo '<tr>
            <td>'.$count.'</td>
            <td>'.$row["Field"].'</td>
            <td><a href="edit.php?title='.$row['Field'].'">Edit</td>
            </tr>';
        }
    ?>
    </tbody>
  </table>



<form style="margin-bottom:20px; float:right" method="POST" action="">
    <select name="langSelected" onchange="this.form.submit()">
      <option value="" disabled selected>Select Language</option>
      <option>English</option>
      <option>Urdu</option>
    </select>
</form>



<?php
   if(isset($_POST["langSelected"])){
       $lang = $_POST["langSelected"];
       $_SESSION["language_selected"] = $lang;
   }
?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Phrase</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $lang = $_SESSION['language_selected'];
        $sql = "Select phrase, ".$lang." FROM language";
        $result = $conn->query($sql);
        $count = 0;
        while($row = $result->fetch_assoc()) { 
          $count++;
          echo '<tr>
            <td>'.$count.'</td>
            <td>'.$row["phrase"].'</td>
            <td>'.$row[$lang].'</td>
            </tr>';
        }
    ?>
    </tbody>
  </table>


</div>
</body>
</html>
