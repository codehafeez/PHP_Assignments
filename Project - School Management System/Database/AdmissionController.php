<?php
    include_once './AdmissionDatabase.php';
    $obj_class = new AdmissionClass();

    if (isset($_POST['Load_Student_ID'])){
        echo $obj_class->Load_Student_Last_Id();
    }
    
    else if (isset($_POST['student_name'])
        &&isset($_POST['student_father_name'])
        &&isset($_POST['student_gender'])
        &&isset($_POST['student_class'])
        &&isset($_POST['student_date_of_birth'])
        &&isset($_POST['student_date_of_admission'])
        &&isset($_POST['student_father_cnic_number'])
        &&isset($_POST['student_contact_number'])
        &&isset($_POST['student_address'])) {
        
        echo $obj_class->Save_New_Student_Data_Function(
            $_POST['student_name'],
            $_POST['student_father_name'],$_POST['student_gender'],
            $_POST['student_class'],$_POST['student_date_of_birth'],
            $_POST['student_date_of_admission'],$_POST['student_father_cnic_number'],
            $_POST['student_contact_number'],$_POST['student_address']
        );
    }
?>