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


  <a href="index.php" class="btn btn-primary">Language List</a>
  <br/><br/>


  <form action="save_phrase.php" method="post">
  <input style="padding:3px;" type="text" name="phrase_name" placeholder="Phrase Name">
  <input type="submit" class="btn btn-success" value="Submit">
  </form>


  <table style="margin-top:20px;" class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Phrase</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include('db_connection.php');
        $sql = "SELECT * FROM language";
        $result = $conn->query($sql);
        $count = 0;
        while($row = $result->fetch_assoc()) { 
          $count++;
          echo '<tr>
            <td>'.$count.'</td>
            <td>'.$row["phrase"].'</td>
            </tr>';
        }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>
