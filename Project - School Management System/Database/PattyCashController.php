<?php
    include_once './PattyCashDatabase.php';
    $obj_class = new PattyCashClass();

    if (isset($_POST['patty_cash_date'])&&isset($_POST['patty_cash_amount'])&&isset($_POST['patty_cash_description'])) 
    {    
        echo $obj_class->Save_Patty_Cash_Data_Function($_POST['patty_cash_date'],
            $_POST['patty_cash_amount'],$_POST['patty_cash_description']);
    }
    
    else if (isset($_POST['Load_Patty_Cash_Information_Data'])){    
        echo $obj_class->Load_Patty_Cash_Information_Function();
    }
    
    else if (isset($_POST['patty_cash_id'])){    
        echo $obj_class->Single_Patty_Cash_Information_PopUpModel($_POST['patty_cash_id']);
    }
    
    else if (isset($_POST['delete_patty_cash_information'])){    
        echo $obj_class->Single_Patty_Cash_Information_Delete($_POST['delete_patty_cash_information']);
    }
    
    else if (isset($_POST['update_patty_cash_id'])&&isset($_POST['update_patty_cash_date'])&&isset($_POST['update_patty_cash_amount'])&&isset($_POST['update_patty_cash_description'])) {    
        echo $obj_class->Single_Patty_Cash_Information_Update($_POST['update_patty_cash_id'],
            $_POST['update_patty_cash_date'],$_POST['update_patty_cash_amount'], $_POST['update_patty_cash_description']);
    }
    
    else if (isset($_POST['search_value_patty_cash'])){    
        echo $obj_class->Patty_Cash_Search_Information($_POST['search_value_patty_cash']);
    }
?>

