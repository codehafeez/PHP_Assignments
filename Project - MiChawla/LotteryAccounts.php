<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/LotteryAccounts.js"></script>   
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
<table class="table table-hover" id="waketable">
<tr>
<th>#Number</th>    
<th>Member Name S/O</th>
<th>Type</th>
<th>Total Given</th>
<th>Total Profit</th>
<th>Net Total</th>
</tr>
<tbody id="Membertablebody"></tbody></table>
</div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>
</section>
</aside>
</div>

</body>
</html>



