<?php
    include_once './SalaryDatabase.php';
    $obj_class = new SalaryClass();

    if (isset($_POST['KeyEvent_salary_employee_id'])){
        echo $obj_class->Show_Employee_Salary_Information_KeyEvent_EmployeeId($_POST['KeyEvent_salary_employee_id']);
    }
    
    else if (isset($_POST['salary_employee_id'])&&isset($_POST['salary_employee_amount'])
        &&isset($_POST['salary_employee_submit_date'])&&isset($_POST['salary_employee_note'])){    
        echo $obj_class->Save_Salary_Employee_Data_Function($_POST['salary_employee_id'],$_POST['salary_employee_amount'],
            $_POST['salary_employee_submit_date'],$_POST['salary_employee_note']);
    }
    
    else if (isset($_POST['Load_Salary_Information_Data'])){
        echo $obj_class->Load_Employee_Salary_Information_DataTable();
    }
    
    else if (isset($_POST['employee_salary_id'])){
        echo $obj_class->Single_Employee_Salary_Information_PopUpModel($_POST['employee_salary_id']);
    }

    else if (isset($_POST['delete_employee_salary_information'])){
        echo $obj_class->Single_Employee_Salary_Information_Delete($_POST['delete_employee_salary_information']);
    }
    
    else if (isset($_POST['update_salary_employee_id'])&&isset($_POST['my_salary_id'])
        &&isset($_POST['update_salary_employee_amount'])
        &&isset($_POST['update_salary_employee_submit_date'])&&isset($_POST['update_salary_employee_note'])) 
    {    
        echo $obj_class->Update_Salary_Employee_Data_Function($_POST['update_salary_employee_id'],
            $_POST['my_salary_id'],$_POST['update_salary_employee_amount'],
            $_POST['update_salary_employee_submit_date'],$_POST['update_salary_employee_note']);
    }
    
    else if (isset($_POST['search_employee_salary_data'])){
        echo $obj_class->Employee_Salary_Search_Information($_POST['search_employee_salary_data']);
    }
?>