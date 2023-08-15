<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/DailyReportJS.js"></script>   
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
<li class="active">Daily Recovery</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Daily Recovery</h3>
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
<select class="form-control" id="lotteryname"></select>
<br>
<select class="form-control" id="employeename"></select>
<center><h3 class="box-title" id="textdate"><?php echo date('d-M-Y')?></h3></center>
<div class="input-group-btn pull-left">
<button class="btn btn-sm btn-default" id="PreviousDate"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
</div>
<div class="input-group-btn pull-right" style="margin-right: 10px;">
<button class="btn btn-sm btn-default" id="NextDate"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
</div>
</div>    
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="dailyenterytable">
<tr>
<th>Member Name S/O Name</th>
<th>Lottery Name</th>
<th>Amount</th>
<th>Payment Type</th>
<th>Payment Description</th>
<th>Taken By</th>
<th>Delete</th>
</tr>
<tbody id="dailyenterytablebody"></tbody>
</table>
<button type="button" class="btn btn-primary pull-right" id="recoverybtn" style="margin-top: 10px; margin-bottom: 10px;">Add Recovery</button>    
<div class="row" id="recoveryform" style="margin-top: 10px; margin-bottom:10px;">
<div class="col-xs-12">
<div class="box box-info">
<div class="box-header">
<h3 class="box-title">Members</h3>
</div>
<div class="box-body">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<select  id="entryemployeename" class="form-control"></select>
</div>   
<br>
<div class="input-group">
<input type="hidden" id="clientid">
<input type="hidden" id="rmemberid">
<span class="input-group-addon"><i class="fa fa-money"></i></span>
<select class="form-control" id="lotteryname2"></select>
</div>
<br>
<div id="membernamelist" style="margin-left: 20px;"></div>
<div class="input-group" id="ClientLotteryList" style="margin-left:20px;"></div>
<select class="form-control" id="Paymentype">
<option value="">Select Payment Type</option>
<option value="Cash">Cash</option>
<option value="Payment"> Cheque</option>
</select>
<div id="cashform">    
<label>Amount</label>
<input type="hidden" id="recoverylotteryid"value="0">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-money"></i></span>
<input type="number" id="cashamount" class="form-control" placeholder="Amount" >
</div>
<br>   
<div class="box-footer">
<button class="btn btn-primary col-lg-offset-10" type="submit" id="CashSaveButton"> <i class='fa fa-plus-circle'></i> Save </button>
</div>
</div>
<div id="checkform">    
<label>Check Info</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input type="text" id="bankname" class="form-control" placeholder="Bank Name" >
</div>
<br>   
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
<input type="number" id="checknumber" class="form-control" placeholder="Check Number" >
</div>
<br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-money"></i></span>
<input type="number" id="checkamount" class="form-control" placeholder="Check Amount" >
</div>
<br>
<div class="box-footer">
<button class="btn btn-primary col-lg-offset-10" type="submit" id="BankButton"> <i class='fa fa-plus-circle'></i> Save </button>
</div>
</div>
</div>    
</div>
</div><!-- /.col-lg-6 -->
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
<div id="Deltemodal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Recovery</h4>
</div>
<div class="modal-body">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
Are You Sure You Want To Delete This Entry?   
</label>
<input type="hidden" id="deleteentryid">
</div>
</div>
</div>    
</div>
<div class="modal-footer">   
<button type="button" id="deleteentry" class="btn btn-danger">Delete</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
</div>
</div>
</div>
</body>
</html>