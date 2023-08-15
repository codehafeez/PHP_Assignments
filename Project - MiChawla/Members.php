<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/MembersJS.js"></script>   
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
<li class="active">Members</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Lottery Members</h3>
<div class="box-tools">
<div class="input-group">
<input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
<div class="input-group-btn">
<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div>
<div class="col-xs-12" style="margin-bottom: 10px;">
<select class="form-control" id="lotteryname"></select>
</div>    
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="Memberstable">
<tr>
<th>Member ID</th>    
<th>Member Name</th>
<th>Member Father Name</th>
<th colspan="3">Action </th>
</tr>
<tbody id="Memberstablebody"></tbody>
</table>
<button type="button" class="btn btn-primary pull-right" id="membersbtn" style="margin-top: 10px; margin-bottom: 10px;">Add Members</button>    
<div class="row" id="membersform" style="margin-top: 10px; margin-bottom:10px;">
<div class="col-xs-12">
<div class="box box-info">
<div class="box-header">
<h3 class="box-title">Members</h3>
</div>
<div class="box-body">
<div class="input-group">
<input type="hidden" id="clientid">    
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" id="clientname" placeholder="Member Name">
</div><br>
<div id="nameresult">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<select class="form-control" id="lotteryname2"></select>
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-primary col-lg-offset-8" id="savemember">Submit</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-primary" id="saveupdate" >Update</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-danger" >Cancel</button>
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
</body>
</html>