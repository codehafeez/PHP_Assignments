<!DOCTYPE html>
<html lang="en">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php'; ?>
<title> Login </title>
<script src="js/LoginJS.js"></script>
</head>
<body>
 <div class="Login_Form">
 <div class="container">
 <div class="card card-container">
     <center><img id="profile-img" style="width:50%;" class="img-responsive" src="img/logo2.png" /></center>
<br/>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
<input class="form-control" type="text" id="id" name="id" placeholder="User id">
</div>
<p id="idMessage" style="color:red"></p>
<p></p>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
<input class="form-control" type="password" id="password" name="password" placeholder="Password">
</div>
<p id="passwordMessage" style="color:red"></p>
<p></p>
<div class="form-group">
<button class="btn btn-primary btn-block" id="login_Button" style="font-size: 16px;"> Login </button>
</div>
</div>
</div>
</div>    
</body>
</html>