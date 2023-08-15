<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryAuctionJS.js"></script>   
</head>
<body class="skin-black">
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LotteryLeftNav.php';?>
<input type="hidden" value="<?php echo $_SESSION['userid'];  ?>" id="userid"/>    
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
<h3 class="box-title">Wake List</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="waketable">
<tr>
<th>Member Name S/O</th>
<th>Walk Number</th>
<th>Walk Taken By</th>
<th>Percentage</th>
<th>Lottery Amount</th>
<th>Walk Amount</th>
<th>Admin commission</th>
<th>Member Benefit</th>
<th>Net Amount</th>
<th>Action</th>
<th>Notification</th>
</tr>
<tbody id="waketablebody"></tbody>
</table>
<button type="button" class="btn btn-primary pull-right" id="wakeformbtn">Add Wake</button><br><br>
<div  id="wakeform">
<input type="hidden" id="wakerowid">    
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
<input class="form-control" type="date" id="wakedate">    
</div>
<br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-money"></i></span>
<input type="number" class="form-control" id="wakeamount" placeholder="Wake Amount">
</div>
<br>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-money"></i></span>
<input type="number" class="form-control" id="admincommison" placeholder="Admin Commission">
</div>
<br>
<div class="box-footer">
<button type="submit" class="btn btn-primary col-lg-offset-8" id="savewake">Save </button>
&nbsp&nbsp&nbsp <button type="submit" class="btn btn-primary" id="wakeupdate" >Update</button>
&nbsp&nbsp&nbsp <button  class="btn btn-danger" id="cancelbtnwalkform" >Cancel</button>
</div>
</div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>
</section>
</aside>
</div>
<div id="Deltemodal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Walk</h4>
</div>
<div class="modal-body">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
Are You Sure You Want To Delete This Walk?   
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
<div id="DeleteWalkMember" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Walk Member</h4>
</div>
<div class="modal-body">
<div class="form-group row">
<div class="col-md-12">
<div class="form-check"  id="parent_box">
<label class="form-check-label">
Are You Sure You Want To Delete This Member?   
</label>
<input type="hidden" id="deletewalkid">
</div>
</div>
</div>    
</div>
<div class="modal-footer">   
<button type="button" id="deletewalkmemberentry" class="btn btn-danger">Delete</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
</div>
</div>
</div>
<div id="addwalkmembermodal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Walk Member</h4>
</div>
<input type="hidden" id="lotterywalkid">
<input type="hidden" id="walkmemberentryid">
<div class="modal-body">
<div class="form-group row">
<label class="form-label">Lottery Member</label>
<select class="form-control" id="WalkMembers"></select>
</div>
<br>
<div class="form-group row">
<label class="form-label">Percentage</label>
<input type="number" class="form-control" id="percentage"></input>
</div>
<div class="form-group row"></div>
</div>
<div class="modal-footer">   
<button type="button" id="savewalkmember" class="btn btn-primary">Save</button>
<button type="button" id="updatewalkmember" class="btn btn-primary">Update</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
</div>
</div>
</div>
</body>
</html>



