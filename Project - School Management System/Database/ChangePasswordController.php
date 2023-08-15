<?php
    include_once './ChangePasswordDatabase.php';
    $obj_class = new ChangePasswordClass();

    if (isset($_POST['setting_old_password'])&&isset($_POST['setting_new_password'])){
        echo $obj_class->Update_Password_Function($_SESSION['WorkingEmail'], $_POST['setting_old_password'], $_POST['setting_new_password']);
    }

?>
