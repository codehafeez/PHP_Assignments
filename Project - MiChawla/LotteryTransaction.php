<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryTransaction.js"></script>   
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
<h3 class="box-title">Accounts</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-hover" id="Transactiontable">
<tr>
<th>Date</th>   
<th>Walk Number</th>
<th>Member Name S/O</th>
<th>Percen</th>
<th>Walk Amount </th>
<th>Given</th>
<th>Description</th>
<th>Remain</th>
</tr>
<tbody id="Transactiontablebody"></tbody></table>
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



