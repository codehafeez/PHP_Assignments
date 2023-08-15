<?php
session_start();
if (!isset($_SESSION['loginTrue'])) { header('Location: ../index.php'); } 
?>
<!DOCTYPE html>
<html>
<head>
<title> School Management System </title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assets/css/ace.min.css"/>
</head>
<body class="no-skin">
<!-- ================================ (Start) Navbar - Top ================================ -->
<?php include '../nav_top.php'; ?>
<!-- ================================ (End) Navbar - Top ================================== -->
<div class="main-container ace-save-state" id="main-container">



    
    
    
    
    


<!-- ==========================================================================================================
                                    Changes Area - Left Side - Dashboard
============================================================================================================ -->
<div id="sidebar" class="sidebar responsive ace-save-state">
<ul class="nav nav-list">
<li> <a href="../Dashboard/dashboard_home.php"> <i class="menu-icon fa fa-home"></i> <span class="menu-text"> Dashboard </span> </a> </li>

<li>
<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-users"></i>
<span class="menu-text"> Student </span> <b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
<ul class="submenu nav-show">
<li> <a href="../Student/new_employee.php"> <i class="menu-icon fa fa-caret-right"></i> New Admission </a> <b class="arrow"></b> </li>
<li> <a href="../Student/student_information.php"> <i class="menu-icon fa fa-caret-right"></i> Student Information </a> <b class="arrow"></b> </li>
</ul>
</li>

<li>
<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-child"></i>
<span class="menu-text"> Employee </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b> 
<ul class="submenu nav-show">
<li> <a href="../Employee/new_employee.php"> <i class="menu-icon fa fa-caret-right"></i> Add New Employee </a> <b class="arrow"></b> </li>
<li> <a href="../Employee/employee_information.php"> <i class="menu-icon fa fa-caret-right"></i> Employee Information </a> <b class="arrow"></b> </li>
</ul>
</li>

<li class="active open">
<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-calculator"></i>
<span class="menu-text"> Account </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
<ul class="submenu nav-show">
<li> <a href="../Account/fees_acount.php"> <i class="menu-icon fa fa-caret-right"></i> Fees </a> <b class="arrow"></b> </li>
<li class="active"> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Salary </a> <b class="arrow"></b> </li>
<li> <a href="../Account/patty_cash_account.php"> <i class="menu-icon fa fa-caret-right"></i> Patty Cash </a> <b class="arrow"></b> </li>
</ul>
</li>

<li><a href="../TimeTable//time_table.php"> <i class="menu-icon fa fa-calendar"></i> <span class="menu-text"> Time Table </span> </a></li>
<li><a href="../Setting/user_setting.php"> <i class="menu-icon fa fa-gear"></i> <span class="menu-text"> Setting </span> </a></li>
<li><a href="../Database/Logout.php"> <i class="menu-icon fa fa-sign-out"></i> Logout </a></li>
</ul>
    
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>	
</div>
<!-- ===========================================================================================================
======================================== (End) Left Side - Dashboard ===========================================
=============================================================================================================-->


















<div class="main-content">
<div class="main-content-inner">	
<div class="page-content">
<!-- ================================ (Start) Navbar - Right Setting ================================ -->
<?php include '../nav_right_setting.php'; ?>
<!-- ================================== (End) Navbar - Right Setting ================================ -->

		


















<!-- ==========================================================================================================
                                    Changes Area - Show Page Working Area
============================================================================================================ -->
<?php include 'salary_acount_working_page_area.php'; ?>
<!-- ===========================================================================================================
============================================ (End) Page Working Area ===========================================
=============================================================================================================-->
		




	
	















</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> </a>
</div><!-- /.main-container -->
<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/ace.min.js"></script>
<script src="../JS_Connect_DB/SalaryJS.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
jQuery(function($) {
    $('.input-mask-phone').mask('999 - 9999999');
    $('.input-mask-cnic-number').mask('99999 - 9999999 - 9');
    
    $('[data-rel=tooltip]').tooltip({container:'body'});

    // Number Conver to Accounting Format
    var inputAmount = $(".number_account_format");
    inputAmount.on("keyup", function(event)
    {            
        var thisValue = $(this);
        var input = thisValue.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt(input, 10) : 0;
        thisValue.val( function() {
            return (input === 0) ? "" : input.toLocaleString("en-US");
        });
    });
});
</script>
</body>
</html>
