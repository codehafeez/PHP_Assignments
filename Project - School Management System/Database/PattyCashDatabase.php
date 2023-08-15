<?php
session_start();
class PattyCashClass
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
    
    function Save_Patty_Cash_Data_Function($patty_cash_date, $patty_cash_amount, $patty_cash_description) 
    {
        try {
        $sql = "INSERT INTO patty_cash_table (patty_cash_date, patty_cash_amount, patty_cash_description) VALUES (?,?,?)";
        $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
        $stmt->bind_param("sss", $patty_cash_date, $patty_cash_amount, $patty_cash_description);
        mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        echo 'Successfully Save';
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_Patty_Cash_Information_Function()
    {
        try
        {
            $sql = "SELECT * FROM patty_cash_table ORDER BY patty_cash_date";
            $result=  $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Date </th>
                <th> Amount </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            while($row = mysqli_fetch_array($result)) {
                
                $total_amount = $total_amount."".$row["patty_cash_amount"]."-";                
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["patty_cash_date"]. "</td>"
                ."<td>" . $row["patty_cash_amount"]. "</td>"
                ."<td>" . $row["patty_cash_description"]. "</td>"
                ."<td> <button class='btn btn-success patty_cash_information_view_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary patty_cash_information_update_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger patty_cash_information_delete_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo "</tbody></table> <input type='text' id='patty_cash_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Patty_Cash_Search_Information($employee_search)
    {
        try
        {
            $sql = "SELECT * FROM patty_cash_table
                WHERE patty_cash_amount LIKE'%$employee_search%'
                OR patty_cash_date LIKE'%$employee_search%'
                OR patty_cash_description LIKE'%$employee_search%'
                ORDER BY patty_cash_date";
            
            $result = $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Date </th>
                <th> Amount </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            while($row = mysqli_fetch_array($result)) {
                
                $total_amount = $total_amount."".$row["patty_cash_amount"]."-";                
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["patty_cash_date"]. "</td>"
                ."<td>" . $row["patty_cash_amount"]. "</td>"
                ."<td>" . $row["patty_cash_description"]. "</td>"
                ."<td> <button class='btn btn-success patty_cash_information_view_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary patty_cash_information_update_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger patty_cash_information_delete_button' id='".$row["patty_cash_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo "</tbody></table> <input type='text' id='patty_cash_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Patty_Cash_Information_PopUpModel($patty_cash_id)
    {
        try 
        {
            $response = array();
            $sql2 = "SELECT * FROM patty_cash_table WHERE patty_cash_id='$patty_cash_id'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { $response = $row2; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Patty_Cash_Information_Delete($patty_cash_id)
    {
        try
        {
            $sql = "Delete FROM patty_cash_table WHERE patty_cash_id=?";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("s", $patty_cash_id);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Patty_Cash_Information_Update($update_patty_cash_id, $update_patty_cash_date, $update_patty_cash_amount, $update_patty_cash_description) 
    {
        try
        {
            $sql = "UPDATE patty_cash_table SET patty_cash_date=?, patty_cash_amount=?, patty_cash_description=? WHERE patty_cash_id='$update_patty_cash_id'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sss", $update_patty_cash_date, $update_patty_cash_amount, $update_patty_cash_description);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
