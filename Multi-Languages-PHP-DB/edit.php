<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:20px;">
  <a href="index.php" class="btn btn-primary">Back</a>
  <form action="update.php" method="post">
 	  <input name="phrase" type="hidden" value="<?=$_GET['title']?>">
	  <table style="margin-top:20px;" class="table table-bordered">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Phrase</th>
	        <th><?=$_GET['title']?></th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php
	        include('db_connection.php');
	        $title = $_GET['title'];
	        $sql = "SELECT id, phrase, $title FROM language";
	        $result = $conn->query($sql);
	        $count = 0;
	        while($row = $result->fetch_assoc()) { 
	          $count++;
	          echo '<tr>
	            <td>'.$count.'</td>
	            <td>'.$row["phrase"].'</td>
	            <td>
	            	<input name="phrase_name[id][]" type="hidden" value="'.$row["id"].'">
	            	<input name="phrase_name[name][]" type="text" value="'.$row["$title"].'">
	            </td>
	            </tr>';
	        }
	    ?>
	    </tbody>
	  </table>
	  <input class="btn btn-success pull-right" type="submit" value="Update"/>
  </from>

</div>
</body>
</html>
