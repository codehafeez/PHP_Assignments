<?php
session_start();
class EmployeeInformationClass 
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
    
    function Load_Employees_Table_Function()
    {
        try 
        {
            $sql = "SELECT * FROM employee_table ORDER BY employee_date_of_joining";
            $result=  $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Name </th>
                <th> Father Name </th>
                <th> Father CNIC </th>
                <th> Gender </th>
                <th> Job Title </th>
                <th> Joining Date </th>
                <th> Status </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["employee_name"]. "</td>"
                ."<td>" . $row["employee_father_name"]. "</td>"
                ."<td>" . $row["employee_father_cnic"]. "</td>"
                ."<td>" . $row["employee_gender"]. "</td>"
                ."<td>" . $row["employee_job_title"]. "</td>"
                ."<td>" . $row["employee_date_of_joining"]. "</td>"
                ."<td>" . $row["employee_status"]. "</td>"
                ."<td> <button class='btn btn-success employee_information_view_button' id='".$row["employee_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary employee_information_update_button' id='".$row["employee_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger employee_information_delete_button' id='".$row["employee_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo '</tbody></table>';
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function SearchEmployeeInformation($employee_search)
    {
        try
        {
            $sql = "SELECT * FROM employee_table
                WHERE employee_name LIKE'%$employee_search%'
                OR employee_father_name LIKE'%$employee_search%'
                OR employee_father_cnic LIKE'%$employee_search%'
                OR employee_job_title LIKE'%$employee_search%'
                OR employee_date_of_joining LIKE'%$employee_search%'
                ORDER BY employee_date_of_joining";
            $result = $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Name </th>
                <th> Father Name </th>
                <th> Father CNIC </th>
                <th> Gender </th>
                <th> Job Title </th>
                <th> Joining Date </th>
                <th> Status </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["employee_name"]. "</td>"
                ."<td>" . $row["employee_father_name"]. "</td>"
                ."<td>" . $row["employee_father_cnic"]. "</td>"
                ."<td>" . $row["employee_gender"]. "</td>"
                ."<td>" . $row["employee_job_title"]. "</td>"
                ."<td>" . $row["employee_date_of_joining"]. "</td>"
                ."<td>" . $row["employee_status"]. "</td>"
                ."<td> <button class='btn btn-success employee_information_view_button' id='".$row["employee_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary employee_information_update_button' id='".$row["employee_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger employee_information_delete_button' id='".$row["employee_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo '</tbody></table>';
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function SingleEmployeeInformationForModel($employee_id)
    {
        try 
        {
            $sql = "SELECT * FROM employee_table WHERE employee_id='+$employee_id+'";
            $result = $this->conn->query($sql);
            if($row = mysqli_fetch_assoc($result)) {
                $response = array();
                $response = $row;
            }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function UpdateSingleEmployeeInformationForModel($employee_id_update, $employee_name_update, $employee_father_name_update, $employee_gender_update, $employee_job_title_update, $employee_salary_update, $employee_date_of_birth_update, $employee_joining_date_update, $employee_father_cnic_update, $employee_contact_number_update, $employee_address_update, $employee_status_update, $employee_description_update)
    {        
        try
        {
            $sql = "UPDATE employee_table SET employee_name=?, employee_father_name=?, employee_gender=?, employee_job_title=?, employee_salary=?, employee_date_of_birth=?, employee_date_of_joining=?, employee_father_cnic=?, employee_contact_number=?, employee_address=?, employee_status=?, employee_description=? WHERE employee_id='$employee_id_update'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"ssssssssssss", $employee_name_update, $employee_father_name_update, $employee_gender_update, $employee_job_title_update, $employee_salary_update, $employee_date_of_birth_update, $employee_joining_date_update, $employee_father_cnic_update, $employee_contact_number_update, $employee_address_update, $employee_status_update, $employee_description_update);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }

    function DeleteSingleEmployeeInformationForModel($employee_id)
    {
        try 
        {
            $sql = "Delete FROM employee_table WHERE employee_id=?";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("s", $employee_id);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);            
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}