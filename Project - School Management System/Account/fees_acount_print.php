<?php
session_start();
if (!isset($_SESSION['loginTrue'])) { header('Location: ../index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assets/css/ace.min.css"/>
</head>
<body class="no-skin">
    
<center style="margin-top:50px;">
<img src="VoucharDesign.png" width="70%"/>
</center>
    
</body>
</html>
