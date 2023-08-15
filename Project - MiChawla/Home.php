<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/Clients.js"></script>    
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>   
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LeftNav.php';?>
<aside class="right-side">
<section class="content-header">
<h1>Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Clients</li>
</ol>
<section class="content">
</section>
</section>
</aside>
</div>
</body>
</html>

