<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
    
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>   
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './EmployeeLeftNav.php';?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Clients</li>
</ol>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Clients List</h3>
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
<table class="table table-hover" id="clientstable">
<tr>
<th>Client Name</th>
<th>Name</th>
<th>Father Name</th>
<th>Mobile Number</th>
<th colspan="3">Action </th>
</tr>
<tbody id="clientstablebody"></tbody>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
<button type="button" class="btn btn-primary pull-right" id="clientbutton">Add Clients</button>
<div class="row" id="Clientform" style="margin-top: 10px; margin-bottom:10px;">
<div class="col-xs-12">
<div class="box box-info">
<div class="box-header">
<h3 class="box-title">Add Client</h3>
</div>
<div class="box-body">
<div class="input-group">
<input type="hidden" id="clientid">    
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" id="clientname" placeholder="Username">
</div><br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" id="clientfather" placeholder="Father Name">
</div>
<br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" class="form-control" id="mobilenumber" placeholder="Phone Number">
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-primary col-lg-offset-8" id="saveclient">Submit</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-primary" id="saveupdate" >Update</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-danger" >Cancel</button>
</div>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
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
<h4 class="modal-title">Agency</h4>
</div>
<div class="modal-body">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
Are You Sure You Want To Delete This Client?   
</label>
<input type="hidden" id="deleteclientid">
</div>
</div>
</div>    
</div>
<div class="modal-footer">   
<button type="button" id="deleteclient" class="btn btn-danger">Delete</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
</div>
</div>
</div>
</body>
</html>

