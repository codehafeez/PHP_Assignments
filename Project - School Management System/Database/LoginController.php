<?php
    include_once './LoginDatabase.php';
    $obj_class = new LoginDatabase();

    if (isset($_POST['email'])&&isset($_POST['password'])){
        echo $obj_class->LogIn($_POST['email'],$_POST['password']);
    }
?>