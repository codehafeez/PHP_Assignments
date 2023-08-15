<?php
    include_once './FeeDatabase.php';
    $obj_class = new FeeClass();

    if (isset($_POST['KeyEvent_fee_student_id'])){
        echo $obj_class->Show_Student_Fees_Information_KeyEvent_StudentId($_POST['KeyEvent_fee_student_id']);
    }
    
    else if (isset($_POST['fee_student_issue_date'])
        &&isset($_POST['fee_student_id'])&&isset($_POST['fee_student_fee_type'])
        &&isset($_POST['fee_student_amount'])&&isset($_POST['fee_student_last_date'])
        &&isset($_POST['fee_student_submit_date'])&&isset($_POST['fee_student_note'])) 
    {    
        echo $obj_class->Save_Fees_Student_Data_Function($_POST['fee_student_issue_date'],
            $_POST['fee_student_id'],$_POST['fee_student_fee_type'],
            $_POST['fee_student_amount'],$_POST['fee_student_last_date'],
            $_POST['fee_student_submit_date'],$_POST['fee_student_note']);
    }
    
    else if (isset($_POST['Load_Fees_Information_Data'])){
        echo $obj_class->Load_Students_Fees_Information_DataTable();
    }
    
    else if (isset($_POST['student_fees_id'])){
        echo $obj_class->Single_Student_Fees_Information_PopUpModel($_POST['student_fees_id']);
    }
    
    else if (isset($_POST['update_student_id'])&&isset($_POST['update_my_fees_id'])
        &&isset($_POST['update_fee_student_fee_type'])
        &&isset($_POST['update_fee_student_amount'])&&isset($_POST['update_fee_student_issue_date'])
        &&isset($_POST['update_fee_student_last_date'])&&isset($_POST['update_fee_student_submit_date'])
        &&isset($_POST['update_fee_student_note'])){
        
        echo $obj_class->Update_Fees_Student_Data_Function($_POST['update_student_id'],
            $_POST['update_my_fees_id'],$_POST['update_fee_student_fee_type'],
            $_POST['update_fee_student_amount'],$_POST['update_fee_student_issue_date'],
            $_POST['update_fee_student_last_date'],$_POST['update_fee_student_submit_date'],
            $_POST['update_fee_student_note']);
    }
        
    else if (isset($_POST['search_student_fees_data'])){    
        echo $obj_class->Student_Fees_Search_Information($_POST['search_student_fees_data']);
    }
    
    else if (isset($_POST['delete_student_fees_information'])){    
        echo $obj_class->Single_Student_Fees_Information_Delete($_POST['delete_student_fees_information']);
    }
?>