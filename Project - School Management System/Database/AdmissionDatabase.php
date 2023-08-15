<?php
session_start();
class AdmissionClass 
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "school_system_db";

    function __construct() {
    $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
        die("Connection failed: " . $this->conn->connect_error);    
        }
    }
    
    function Load_Student_Last_Id()
    {
        try {
            $sql = "SELECT * FROM student_table ORDER BY student_id DESC LIMIT 1";
            $result=  $this->conn->query($sql);
            if($row = mysqli_fetch_array($result)){ echo $row['student_id']+1; }
            else { echo '1'; }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Save_New_Student_Data_Function
    (
        $student_name, 
        $student_father_name, $student_gender, 
        $student_class, $student_date_of_birth, 
        $student_date_of_admission, $student_father_cnic_number, 
        $student_contact_number, $student_address) {
        try {
            $sql = "INSERT INTO student_table (student_name, student_father_name, student_gender, student_class, student_date_of_birth, student_date_of_admission, student_father_cnic, student_contact_number, student_address) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("sssssssss", $student_name,$student_father_name, $student_gender,$student_class, $student_date_of_birth,$student_date_of_admission, $student_father_cnic_number,$student_contact_number, $student_address);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
