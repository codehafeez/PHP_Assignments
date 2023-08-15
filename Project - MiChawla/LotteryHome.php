<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryHome.js"></script>   
</head>
<body class="skin-black">
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LotteryLeftNav.php';?>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>    
<input type="hidden" value="" id="lotteryid"/>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header"><h1 id="lotteryname">Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Dashboard</li>
</ol>
<section class="content">
</section><!-- right col -->
</section>
</aside>
</div><!-- /.row (main row) -->
</body>
</html>

