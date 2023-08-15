<?php
    include_once './AddEmployeeDatabase.php';
    $obj_class = new AddEmployeeClass();

    if (isset($_POST['Load_Employee_ID'])){
        echo $obj_class->Load_Employee_Last_Id();
    }
    
    else if (isset($_POST['employee_name'])
        &&isset($_POST['employee_father_name'])
        &&isset($_POST['employee_gender'])
        &&isset($_POST['employee_job'])
        &&isset($_POST['employee_date_of_birth'])
        &&isset($_POST['employee_date_of_joining'])
        &&isset($_POST['employee_father_cnic_number'])
        &&isset($_POST['employee_contact_number'])
        &&isset($_POST['employee_address'])
        &&isset($_POST['employee_salary'])) {
        
        echo $obj_class->Save_New_Employee_Data_Function(
            $_POST['employee_name'],
            $_POST['employee_father_name'],$_POST['employee_gender'],
            $_POST['employee_job'],$_POST['employee_date_of_birth'],
            $_POST['employee_date_of_joining'],$_POST['employee_father_cnic_number'],
            $_POST['employee_contact_number'],$_POST['employee_address'],$_POST['employee_salary']
        );
    }
?>
