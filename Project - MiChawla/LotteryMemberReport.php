<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryMemberReport.js"></script>   
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
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Members</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Lottery Members</h3>
<div class="box-tools">
</div>
</div>
<div class="col-xs-12" style="margin-bottom: 10px;">
<select class="form-control" id="lotterymembers"></select>
<center><h1 id="date"><?php echo date('M-Y');?></h1></center>
<div class="input-group-btn pull-left">
<button class="btn btn-sm btn-default" id="PreviousDate"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
</div>
<div class="input-group-btn pull-right" style="margin-right: 10px;">
<button class="btn btn-sm btn-default" id="NextDate"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
</div>
<center><h3 id="totaltext"></h3></center>

</div>
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="Membersreporttable">
<tr>
<th>Date</th>
<th>Member Name S/O</th>
<th>Amount</th>
<th>Type </th>
<th>Description </th>
<th>Taken</th>
</tr>
<tbody id="Membersreporttablebody"></tbody>
</table>
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