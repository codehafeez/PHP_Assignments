<?php
session_start();
class AddEmployeeClass 
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
    
    function Load_Employee_Last_Id()
    {
        try {
        $sql = "SELECT * FROM employee_table ORDER BY employee_id DESC LIMIT 1";
        $result=  $this->conn->query($sql);
        if($row = mysqli_fetch_array($result)){ echo $row['employee_id']+1; }
        else { echo '1'; }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Save_New_Employee_Data_Function
    (
        $employee_name, 
        $employee_father_name, $employee_gender, 
        $employee_job, $employee_date_of_birth, 
        $employee_date_of_joining, $employee_father_cnic_number, 
        $employee_contact_number, $employee_address, $employee_salary) {
        try {
            $sql = "INSERT INTO employee_table (employee_name, employee_father_name,employee_gender, employee_job_title, employee_salary , employee_date_of_birth, employee_date_of_joining, employee_father_cnic, employee_contact_number, employee_address)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("ssssssssss", $employee_name, $employee_father_name, $employee_gender, $employee_job, $employee_salary, $employee_date_of_birth, $employee_date_of_joining, $employee_father_cnic_number, $employee_contact_number, $employee_address);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
