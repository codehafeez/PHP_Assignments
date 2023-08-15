<?php
    include_once './LoginDatabase.php';
    $obj_class = new LoginDatabase();
    // Login
    if (isset($_POST['userId'])&&isset($_POST['userPassowrd'])) 
    {
    echo $obj_class->LogIn($_POST['userId'],$_POST['userPassowrd']);
    }
    elseif (isset($_POST['androiduserId'])&&isset($_POST['androiduserPassowrd'])) 
    {
    echo $obj_class->Androidlogin($_POST['androiduserId'],$_POST['androiduserPassowrd']);
    }
?>