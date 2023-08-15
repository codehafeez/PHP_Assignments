<?php
session_start();
if (!isset($_SESSION['userType'])) { header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './header.php';?>
<script src="js/EmployeeJS.js"></script>
</head>
<body class="skin-black">
<header class="header">
<?php include_once './UpperNav.php'; ?>
</header>
<input type="hidden" value="<?php      echo $_SESSION['userid'];  ?>" id="userid"/>
<div class="wrapper row-offcanvas row-offcanvas-left">
<?php include_once './LeftNav.php';?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header"><h1>Dashboard <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Employee List</li>
</ol>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Lottery Members</h3>
<div class="box-tools">    
<div class="box-body table-responsive no-padding">  
<table class="table table-hover" id="EmployeeTableId"> 
<thead> 
<th> ID </th>
<th> Name </th>
<th> Type </th>
<th> Password </th>
<th> Status </th>
<th> Edit </th>
<th> Status </th>
</thead>
<tbody id="LotteryTableBody"></tbody>
</table>
<button class="btn btn-primary pull-right insertButton"> <i class='fa fa-plus-circle'></i> Insert </button>
<br/>
<br/>
<div id="EmployeeForm">
<input class="form-control" id="id" type="hidden" readonly="true">
<div class="row">
<div class="col-xs-12 ">                    
<label>Username</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="id" id="username" class="form-control" placeholder="Username" >
</div>
<br>
<label>Type</label>
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-group"></i></span>
            <select class="form-control" id="userType"> 
            <option value="Super Admin"> Super Admin </option>
            <option value="Admin"> Admin </option>
            <option value="Employee"> Employee </option>
                
            </select>
            </div>
            <br>
            <label>Password</label>
            <div class="input-group">                            
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" id="password" class="form-control" placeholder="Password">
            </div>
            <br>                                    
            <div class="box-footer">
            <button class="btn btn-primary" id="saveButton"> <i class='fa fa-plus-circle'></i> Save </button>
            <button class="btn btn-danger pull-right" id="cancelUpdateButton"> <i class='fa fa-trash-o'></i> Cancel </button>
            <button class="btn btn-primary pull-right" id="saveUpdateButton"> <i class='fa fa-pencil-square-o'></i> Update </button>
</div>        
<br/><br/>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
</div>
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