<?php
    include_once './EmployeeInformationDatabase.php';
    $obj_class = new EmployeeInformationClass();

    if (isset($_POST['Load_Employees_Data'])){
        echo $obj_class->Load_Employees_Table_Function();
    }
    
    else if (isset($_POST['employee_id'])){
        echo $obj_class->SingleEmployeeInformationForModel($_POST['employee_id']);
    }
        
    else if (isset($_POST['employee_id_update'])&&isset($_POST['employee_name_update'])&&isset($_POST['employee_father_name_update'])
            &&isset($_POST['employee_gender_update'])&&isset($_POST['employee_job_title_update'])
            &&isset($_POST['employee_salary_update'])&&isset($_POST['employee_date_of_birth_update'])
            &&isset($_POST['employee_joining_date_update'])&&isset($_POST['employee_father_cnic_update'])
            &&isset($_POST['employee_contact_number_update'])&&isset($_POST['employee_address_update'])&&isset($_POST['employee_status_update'])&&isset($_POST['employee_description_update'])){
        
        echo $obj_class->UpdateSingleEmployeeInformationForModel($_POST['employee_id_update'],$_POST['employee_name_update'], $_POST['employee_father_name_update'],
            $_POST['employee_gender_update'], $_POST['employee_job_title_update'],                 
            $_POST['employee_salary_update'], $_POST['employee_date_of_birth_update'],                 
            $_POST['employee_joining_date_update'], $_POST['employee_father_cnic_update'],                 
            $_POST['employee_contact_number_update'], $_POST['employee_address_update'], $_POST['employee_status_update'],$_POST['employee_description_update']
        );
    }
    
    else if (isset($_POST['employee_id_delete'])){
        echo $obj_class->DeleteSingleEmployeeInformationForModel($_POST['employee_id_delete']);
    }
    
    else if (isset($_POST['employee_search'])){
        echo $obj_class->SearchEmployeeInformation($_POST['employee_search']);
    }
?>
