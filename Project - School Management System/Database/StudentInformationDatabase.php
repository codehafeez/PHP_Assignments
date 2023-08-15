<?php
session_start();
class StudentInformationClass 
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
    
    function Load_Students_Table_Function()
    {
        try 
        {
            $sql = "SELECT * FROM student_table ORDER BY student_date_of_admission";
            $result=  $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Name </th>
                <th> Father Name </th>
                <th> Father CNIC </th>
                <th> Gender </th>
                <th> Class </th>
                <th> Admission Date </th>
                <th> Status </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["student_name"]. "</td>"
                ."<td>" . $row["student_father_name"]. "</td>"
                ."<td>" . $row["student_father_cnic"]. "</td>"
                ."<td>" . $row["student_gender"]. "</td>"
                ."<td>" . $row["student_class"]. "</td>"
                ."<td>" . $row["student_date_of_admission"]. "</td>"
                ."<td>" . $row["student_status"]. "</td>"
                ."<td> <button class='btn btn-success student_information_view_button' id='".$row["student_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary student_information_update_button' id='".$row["student_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger student_information_delete_button' id='".$row["student_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo '</tbody></table>';
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function SearchStudentInformation($student_search)
    {
        try
        {
                $sql = "SELECT * FROM student_table
                    WHERE student_name LIKE'%$student_search%'
                        OR student_father_name LIKE'%$student_search%'
                        OR student_father_cnic LIKE'%$student_search%'
                        OR student_class LIKE'%$student_search%'
                        OR student_date_of_admission LIKE'%$student_search%'
                    ORDER BY student_date_of_admission";
                $result = $this->conn->query($sql);
                echo '<table class="table table-striped">
                    <th> S.No# </th>
                    <th> Name </th>
                    <th> Father Name </th>
                    <th> Father CNIC </th>
                    <th> Gender </th>
                    <th> Class </th>
                    <th> Admission Date </th>
                    <th> Status </th>
                    <th> View </th>
                    <th> Edit </th>
                    <th> Delete </th>
                <tbody>';
                $row_count = 1;
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>"
                    ."<td>" .$row_count. "</td>"
                    ."<td>" . $row["student_name"]. "</td>"
                    ."<td>" . $row["student_father_name"]. "</td>"
                    ."<td>" . $row["student_father_cnic"]. "</td>"
                    ."<td>" . $row["student_gender"]. "</td>"
                    ."<td>" . $row["student_class"]. "</td>"
                    ."<td>" . $row["student_date_of_admission"]. "</td>"
                    ."<td>" . $row["student_status"]. "</td>"
                    ."<td> <button class='btn btn-success student_information_view_button' id='".$row["student_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                    ."<td> <button class='btn btn-primary student_information_update_button' id='".$row["student_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                    ."<td> <button class='btn btn-danger student_information_delete_button' id='".$row["student_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                    . "</tr>";
                    $row_count++;
                }
                echo '</tbody></table>';
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function SingleStudentInformationForModel($student_id)
    {
        try 
        {
            $response = array();
            $sql = "SELECT * FROM student_table WHERE student_id='+$student_id+'";
            $result = $this->conn->query($sql);
            if($row = mysqli_fetch_assoc($result)) { $response = $row; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function UpdateSingleStudentInformationForModel($student_id_update, $student_name_update, $student_father_name_update, $student_gender_update, $student_class_update, $student_date_of_birth_update, $student_date_of_admission_update, $student_father_cnic_update, $student_contact_number_update, $student_address_update, $student_status_update, $student_description_update)
    {
        try
        {
            $sql = "UPDATE student_table SET student_name=?, student_father_name=?, student_gender=?, student_class=?, student_date_of_birth=?, student_date_of_admission=?, student_father_cnic=?, student_contact_number=?, student_address=?, student_status=?, student_description=? WHERE student_id='$student_id_update'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssss", $student_name_update, $student_father_name_update, $student_gender_update, $student_class_update, $student_date_of_birth_update, $student_date_of_admission_update, $student_father_cnic_update, $student_contact_number_update, $student_address_update, $student_status_update, $student_description_update);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }

    function DeleteSingleStudentInformationForModel($student_id)
    {
        try 
        {
            $sql = "Delete FROM student_table WHERE student_id=?";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("s", $student_id);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);            
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}