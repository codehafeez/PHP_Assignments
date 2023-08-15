<?php
session_start();
class SalaryClass 
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
    
    function Show_Employee_Salary_Information_KeyEvent_EmployeeId($employee_id)
    {
        try 
        {
            $response = array();
            $sql2 = "SELECT * FROM employee_table WHERE employee_id='$employee_id'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { $response = $row2; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }    
    
    function Save_Salary_Employee_Data_Function($salary_employee_id, $salary_employee_amount, $salary_employee_submit_date, $salary_employee_note) 
    {
        try 
        {
            $sql2 = "SELECT * FROM employee_salary_table WHERE employee_id_fk='$salary_employee_id' AND employee_salary_submit_date='$salary_employee_submit_date'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { echo 'Sorry!, One date only one salary can etner...'; }
            else 
            {
                $sql = "INSERT INTO employee_salary_table (employee_salary_amount, employee_salary_submit_date, employee_salary_description, employee_id_fk) VALUES (?,?,?,?)";
                $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
                $stmt->bind_param("ssss", $salary_employee_amount, $salary_employee_submit_date, $salary_employee_note, $salary_employee_id);
                mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
                echo 'Successfully Save';
            }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }

    function Load_Employee_Salary_Information_DataTable()
    {
        try
        {
            $sql = "SELECT * FROM employee_salary_table ORDER BY employee_salary_submit_date";
            $result=  $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Employee ID </th>
                <th> Amount </th>
                <th> Date </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            while($row = mysqli_fetch_array($result)) 
            {
                $total_amount = $total_amount."".$row["employee_salary_amount"]."-";
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["employee_id_fk"]. "</td>"
                ."<td>" . $row["employee_salary_amount"]. "</td>"
                ."<td>" . $row["employee_salary_submit_date"]. "</td>"
                ."<td>" . $row["employee_salary_description"]. "</td>"
                ."<td> <button class='btn btn-success employee_salary_information_view_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary employee_salary_information_update_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger employee_salary_information_delete_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo "</tbody></table> <input type='text' id='employee_salary_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Employee_Salary_Search_Information($search_value)
    {
        try 
        {
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Employee ID </th>
                <th> Amount </th>
                <th> Date </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            $sql = "SELECT * FROM employee_salary_table WHERE employee_id_fk ='$search_value' ORDER BY employee_salary_submit_date";            
            $result = $this->conn->query($sql);
            while($row = mysqli_fetch_array($result)) 
            {
                $total_amount = $total_amount."".$row["employee_salary_amount"]."-";
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["employee_id_fk"]. "</td>"
                ."<td>" . $row["employee_salary_amount"]. "</td>"
                ."<td>" . $row["employee_salary_submit_date"]. "</td>"
                ."<td>" . $row["employee_salary_description"]. "</td>"
                ."<td> <button class='btn btn-success employee_salary_information_view_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary employee_salary_information_update_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger employee_salary_information_delete_button' id='".$row["employee_salary_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            if($row_count < 2)
            {
                $sql2 = "SELECT * FROM employee_salary_table
                WHERE employee_salary_amount LIKE'%$search_value%'
                OR employee_salary_submit_date LIKE'%$search_value%'
                OR employee_salary_description LIKE'%$search_value%'
                ORDER BY employee_salary_submit_date";
                $result2 = $this->conn->query($sql2);
                while($row2 = mysqli_fetch_array($result2)) 
                {
                    $total_amount = $total_amount."".$row2["employee_salary_amount"]."-";
                    echo "<tr>"
                    ."<td>" .$row_count. "</td>"
                    ."<td>" . $row2["employee_id_fk"]. "</td>"
                    ."<td>" . $row2["employee_salary_amount"]. "</td>"
                    ."<td>" . $row2["employee_salary_submit_date"]. "</td>"
                    ."<td>" . $row2["employee_salary_description"]. "</td>"
                    ."<td> <button class='btn btn-success employee_salary_information_view_button' id='".$row2["employee_salary_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                    ."<td> <button class='btn btn-primary employee_salary_information_update_button' id='".$row2["employee_salary_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                    ."<td> <button class='btn btn-danger employee_salary_information_delete_button' id='".$row2["employee_salary_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                    . "</tr>";
                    $row_count++;
                }
            }
            echo "</tbody></table> <input type='text' id='employee_salary_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Employee_Salary_Information_PopUpModel($employee_id)
    {
        try 
        {
            $response = array();
            $sql2 = "SELECT * FROM employee_salary_table, employee_table WHERE employee_salary_id='$employee_id' AND employee_id = employee_id_fk";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { $response = $row2; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Employee_Salary_Information_Delete($employee_salary_id)
    {
        try
        {
            $sql = "Delete FROM employee_salary_table WHERE employee_salary_id=?";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("s", $employee_salary_id);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Salary_Employee_Data_Function($salary_employee_id, $my_salary_id, $salary_employee_amount, $salary_employee_submit_date, $salary_employee_note) 
    {
        try
        {
            $sql2 = "SELECT count(employee_id_fk) value_count FROM employee_salary_table WHERE employee_id_fk='$salary_employee_id' AND employee_salary_submit_date='$salary_employee_submit_date'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) 
            { 
                if($row2["value_count"] < 2)
                {
                    $sql = "UPDATE employee_salary_table SET employee_salary_amount=?, employee_salary_submit_date=?, employee_salary_description=? WHERE employee_salary_id='$my_salary_id'";
                    $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
                    mysqli_stmt_bind_param($stmt,"sss", $salary_employee_amount, $salary_employee_submit_date, $salary_employee_note);
                    mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
                    echo 'Update Successfully';
                }
                else { echo 'Sorry!, One date only one salary can etner...';  }
            }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
