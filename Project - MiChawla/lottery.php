<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryJS.js"></script>    
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LeftNav.php';?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Lottery</li>
</ol>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Lottery List</h3>
<div class="box-tools">
<div class="input-group">
<input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
<div class="input-group-btn">
<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="LoadLoteryTableId">
<tr>
<th> ID </th>
<th> Lottery Name </th>
<th> Amount </th>
<th> Status </th>
<th> Starting Date </th>
<th> Ending Date </th>
<th> View </th>
<th> Edit </th>
<th> Change Status </th>
</tr>
<tbody id="LoadLoteryTableBodyId"></tbody>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
<button class="btn btn-primary pull-right insertButton"> <i class='fa fa-plus-circle'></i> Add Lottery </button>
<div class="row" id="dataForm" style="margin-top: 10px; margin-bottom:10px;">
<div class="col-xs-12">
<div class="box box-info">
<div class="box-header">
<h3 class="box-title">Add Lottery</h3>
</div>
<div class="box-body">
<div class="input-group">
<div id="dataForm">
<div class="form-group" id="formId">
<label>Id</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input class="form-control" id="id" type="text" readonly="true">
</div>
</div>        
<div class="row">
<div class="col-xs-12">                    
<label>Lottery Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="id" id="loteryName" class="form-control" placeholder="Lottery Name" >
</div>
<br>
<label>Amount</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
<input type="number" id="amount" class="form-control" placeholder="Amount" >
</div>
<br>
<label>Start Date</label>
<div class="input-group">                            
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<input type="date" id="startingDate" class="form-control" >
</div>
<br>
<label>End Date</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<input type="date" id="endingDate" class="form-control" >
</div>
<br>
<div class="box-footer">
<button class="btn btn-primary" type="submit" id="saveButton"> <i class='fa fa-plus-circle'></i> Save </button>
<button class="btn btn-primary" type="submit" id="saveUpdateButton"> <i class='fa fa-pencil-square-o'></i> Update </button>
<button class="btn btn-danger" type="submit" id="saveDeleteButton"> <i class='fa fa-trash-o'></i> Delete </button>
</div>        
<br/><br/>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
</div>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
</div>    
</section><!-- right col -->
</section>
</aside>
</div><!-- /.row (main row) -->
</body>
</html>