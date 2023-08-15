<?php 
session_start();
if(!isset($_SESSION["user"])){ header("location:index.php"); }
?>
<title>Login with Remember Me using PHP & MySQL</title>
<div class="container">	
	<div class="col-md-12">   
	<h2>Login with Remember Me using PHP & MySQL</h2>	
	</div>
	<div class="col-md-6">                    
	<h3>Welcome - <?php echo $_SESSION["user"]; ?></h3>
	<br />
	<p><a href="logout.php">Logout</a></p>	                    
	</div> 	
</div>	




  