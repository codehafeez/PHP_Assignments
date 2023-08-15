<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryMembers.js"></script>   
</head>
<body class="skin-black">
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LotteryLeftNav.php';?>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>    
<input type="hidden" value="" id="lotteryid"/>
<aside class="right-side">
<section class="content-header"><h1 id="lotteryname">Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Dashboard</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Clients List</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="clientstable">
<tr>
<th>#Number</th>    
<th>Client Name</th>
<th>Father Name</th>
<th>Mobile Number</th>
<th>Type</th>
<th colspan="3">Action </th>
</tr>
<tbody id="clientstablebody"></tbody>
</table>
<button type="button" class="btn btn-primary pull-right" id="clientbutton">Add Member</button><br><br>
<div  id="Clientform">
<div class="input-group">
<input type="hidden" id="clientid">    
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" id="clientname" placeholder="Member Name">
</div><br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" id="clientfather" placeholder="Father Name">
</div>
<br>
<div   class="input-group">
<span  class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="number" class="form-control" id="mobilenumber" placeholder="Phone Number">
</div>
<br>
<div   class="input-group">
<span  class="input-group-addon"><i class="fa fa-user"></i></span>
<select class="form-control" id="nametype">
<option value="Full">Full Name</option>
<option value="Half">Half Name</option>
</select>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-primary col-lg-offset-8" id="saveclient">Submit</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-primary" id="saveupdate" >Update</button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-danger" >Cancel</button>
</div>
</div>
</div><!-- /.box-body -->
</div><!-- /.box -->
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
<h4 class="modal-title">Member</h4>
</div>
<div class="modal-body">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
Are You Sure You Want To Delete This Member?   
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
<div id="Messagebox" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Message</h4>
</div>
<div class="modal-body alert alert-success">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
<strong> Lottery Member Saved Successfully.</strong>
</label>
</div>
</div>
</div>    
</div>
<div class="modal-footer">   
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
</div>
</div>
</div>
</body>
</html>



