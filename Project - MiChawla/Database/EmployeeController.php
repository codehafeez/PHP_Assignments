<?php

    include_once './EmployeeDatabase.php';
    $obj_class = new EmployeeDatabase();
    if (isset($_POST['LoadEmployeeTable'])) 
    {
    echo $obj_class->LoadEmployeeTable();
    }
    elseif (isset ($_POST['username'])&&isset ($_POST['userType'])&&isset ($_POST['password'])) {
    $status="Open";
    echo $obj_class->insertFunction($_POST['username'], $_POST['userType'], $_POST['password'],$status);
    }
    else if (isset($_POST['EmployeeOption'])) 
    {
    echo $obj_class->LoadEmployeeOption();
    }
    
    elseif (isset ($_POST['updateId'])) 
    {
    echo $obj_class->modifyFunction($_POST['updateId']);
    }
    elseif (isset ($_POST['uupdateId'])&&isset ($_POST['ustatus'])) 
    {
    echo $obj_class->UpdateStatusFunction($_POST['uupdateId'], $_POST['ustatus']);
    }
    elseif (isset ($_POST['idUpdate'])&&isset ($_POST['usernameUpdate'])&&isset ($_POST['userTypeUpdate'])&&isset ($_POST['passwordUpdate'])) 
    {
    echo $obj_class->updateFunction($_POST['idUpdate'], $_POST['usernameUpdate'], $_POST['userTypeUpdate'], $_POST['passwordUpdate']);
    }
    
?>