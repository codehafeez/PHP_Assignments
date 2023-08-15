<?php
    include_once './StudentInformationDatabase.php';
    $obj_class = new StudentInformationClass();

    if (isset($_POST['Load_Students_Data'])){
        echo $obj_class->Load_Students_Table_Function();
    }
    
    else if (isset($_POST['student_id'])){
        echo $obj_class->SingleStudentInformationForModel($_POST['student_id']);
    }
    
    else if (isset($_POST['student_id_update'])&&isset($_POST['student_name_update'])&&isset($_POST['student_father_name_update'])
            &&isset($_POST['student_gender_update'])&&isset($_POST['student_class_update'])
            &&isset($_POST['student_date_of_birth_update'])&&isset($_POST['student_date_of_admission_update'])
            &&isset($_POST['student_father_cnic_update'])&&isset($_POST['student_contact_number_update'])
            &&isset($_POST['student_address_update'])&&isset($_POST['student_status_update'])&&isset($_POST['student_description_update'])){
        
        echo $obj_class->UpdateSingleStudentInformationForModel($_POST['student_id_update'],$_POST['student_name_update'], $_POST['student_father_name_update'],
            $_POST['student_gender_update'], $_POST['student_class_update'],                 
            $_POST['student_date_of_birth_update'], $_POST['student_date_of_admission_update'],                 
            $_POST['student_father_cnic_update'], $_POST['student_contact_number_update'],                 
            $_POST['student_address_update'], $_POST['student_status_update'],$_POST['student_description_update']
        );
    }
    
    else if (isset($_POST['student_id_delete'])){
        echo $obj_class->DeleteSingleStudentInformationForModel($_POST['student_id_delete']);
    }
    
    else if (isset($_POST['student_search'])){
        echo $obj_class->SearchStudentInformation($_POST['student_search']);
    }
?>


