<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
    <script src="js/CashFlow.js"></script>   
</head>
<body class="skin-black">
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LeftNav.php';?>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>    
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header"><h1>Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Date Report</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Date Report</h3>
<div class="box-tools">
<div class="input-group">
<input type="text" name="table_search" class="form-control input-sm pull-right" id="searchdate" style="width: 150px;" placeholder="Search"/>
<div class="input-group-btn">
<button class="btn btn-sm btn-default" id="searchbtn"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div>
<div class="col-xs-12" style="margin-bottom: 10px;">
<!--<select class="form-control" id="lotteryname"></select>-->
<center><h3 class="box-title" id="textdate"><?php echo date('M-Y')?></h3></center>
<div class="input-group-btn pull-left">
<button class="btn btn-sm btn-default" id="PreviousDate"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
</div>
<div class="input-group-btn pull-right" style="margin-right: 10px;">
<button class="btn btn-sm btn-default" id="NextDate"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
</div>
</div>    
<div class="box-body table-responsive no-padding">
<table class="table table-hover">
<tr>
<th>Type</th>    
<th>Date</th>
<th>Amount </th>
<th>Description</th>
<th>Net Total</th>
</tr>   
<tbody id="dateenterytable"></tbody>
</table>
<!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
</div>
</div>
</div>
</div>    
</section><!-- right col -->
</section>
</aside>
</div><!-- /.row (main row) -->
</body>
</html>