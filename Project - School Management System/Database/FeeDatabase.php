<?php
session_start();
class FeeClass 
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
    
    function Show_Student_Fees_Information_KeyEvent_StudentId($student_id)
    {
        try
        {
            $response = array();
            $sql2 = "SELECT * FROM student_table WHERE student_id='$student_id'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { $response = $row2; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Save_Fees_Student_Data_Function($fee_student_issue_date, $fee_student_id, $fee_student_fee_type, $fee_student_amount, $fee_student_last_date, $fee_student_submit_date, $fee_student_note) 
    {
        try {
            $sql2 = "SELECT * FROM student_fess_table WHERE student_id_fk='$fee_student_id' AND student_fess_start_date='$fee_student_issue_date'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { echo 'Sorry!, One date only one free can etner...'; }
            else
            { 
                $sql = "INSERT INTO student_fess_table (student_fess_type, student_fess_amount, student_fess_start_date, student_fess_end_date, student_fess_submit_date, student_fess_description, student_id_fk) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
                $stmt->bind_param("sssssss", $fee_student_fee_type, $fee_student_amount, $fee_student_issue_date, $fee_student_last_date, $fee_student_submit_date, $fee_student_note, $fee_student_id);
                mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
                echo 'Successfully Save';
            }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_Students_Fees_Information_DataTable()
    {
        try 
        {
            $sql = "SELECT * FROM student_fess_table ORDER BY student_fess_start_date";
            $result=  $this->conn->query($sql);
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Student ID </th>
                <th> Fees Type </th>
                <th> Amount </th>
                <th> Start Date </th>
                <th> Last Date </th>
                <th> Submit Date </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            while($row = mysqli_fetch_array($result)) {
                
                $total_amount = $total_amount."".$row["student_fess_amount"]."-";                                
                $my_fees_type = substr($row["student_fess_type"],0, strlen($row["student_fess_type"])-1);
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["student_id_fk"]. "</td>"
                ."<td>" . $my_fees_type. "</td>"
                ."<td>" . $row["student_fess_amount"]. "</td>"
                ."<td>" . $row["student_fess_start_date"]. "</td>"
                ."<td>" . $row["student_fess_end_date"]. "</td>"
                ."<td>" . $row["student_fess_submit_date"]. "</td>"
                ."<td>" . $row["student_fess_description"]. "</td>"
                ."<td> <button class='btn btn-success student_fees_information_view_button' id='".$row["student_fess_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary student_fees_information_update_button' id='".$row["student_fess_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger student_fees_information_delete_button' id='".$row["student_fess_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            echo "</tbody></table> <input type='text' id='student_fees_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Student_Fees_Search_Information($search_value)
    {
        try 
        {
            echo '<table class="table table-striped">
                <th> S.No# </th>
                <th> Student ID </th>
                <th> Fees Type </th>
                <th> Amount </th>
                <th> Start Date </th>
                <th> Last Date </th>
                <th> Submit Date </th>
                <th> Description </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            <tbody>';
            $row_count = 1;
            $total_amount = "";
            $sql = "SELECT * FROM student_fess_table WHERE student_id_fk ='$search_value' ORDER BY student_fess_start_date";            
            $result = $this->conn->query($sql);
            while($row = mysqli_fetch_array($result))
            {                
                $total_amount = $total_amount."".$row["student_fess_amount"]."-";                                
                $my_fees_type = substr($row["student_fess_type"],0, strlen($row["student_fess_type"])-1);
                echo "<tr>"
                ."<td>" .$row_count. "</td>"
                ."<td>" . $row["student_id_fk"]. "</td>"
                ."<td>" . $my_fees_type. "</td>"
                ."<td>" . $row["student_fess_amount"]. "</td>"
                ."<td>" . $row["student_fess_start_date"]. "</td>"
                ."<td>" . $row["student_fess_end_date"]. "</td>"
                ."<td>" . $row["student_fess_submit_date"]. "</td>"
                ."<td>" . $row["student_fess_description"]. "</td>"
                ."<td> <button class='btn btn-success student_fees_information_view_button' id='".$row["student_fess_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                ."<td> <button class='btn btn-primary student_fees_information_update_button' id='".$row["student_fess_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                ."<td> <button class='btn btn-danger student_fees_information_delete_button' id='".$row["student_fess_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                . "</tr>";
                $row_count++;
            }
            if($row_count < 2)
            {
                $sql2 = "SELECT * FROM student_fess_table
                WHERE student_fess_id ='$search_value'
                OR student_fess_type LIKE'%$search_value%'
                OR student_fess_amount LIKE'%$search_value%'
                OR student_fess_start_date LIKE'%$search_value%'
                OR student_fess_description LIKE'%$search_value%'
                ORDER BY student_fess_start_date";
                $result2 = $this->conn->query($sql2);
                while($row2 = mysqli_fetch_array($result2)) 
                {
                    $total_amount = $total_amount."".$row2["student_fess_amount"]."-";                                
                    $my_fees_type = substr($row2["student_fess_type"],0, strlen($row2["student_fess_type"])-1);
                    echo "<tr>"
                    ."<td>" .$row_count. "</td>"
                    ."<td>" . $row2["student_id_fk"]. "</td>"
                    ."<td>" .$my_fees_type. "</td>"
                    ."<td>" . $row2["student_fess_amount"]. "</td>"
                    ."<td>" . $row2["student_fess_start_date"]. "</td>"
                    ."<td>" . $row2["student_fess_end_date"]. "</td>"
                    ."<td>" . $row2["student_fess_submit_date"]. "</td>"
                    ."<td>" . $row2["student_fess_description"]. "</td>"
                    ."<td> <button class='btn btn-success student_fees_information_view_button' id='".$row2["student_fess_id"]."'> <i class='fa fa-eye'></i> </button> </td>"
                    ."<td> <button class='btn btn-primary student_fees_information_update_button' id='".$row2["student_fess_id"]."'> <i class='fa fa-pencil-square-o'></i> </button> </td>"
                    ."<td> <button class='btn btn-danger student_fees_information_delete_button' id='".$row2["student_fess_id"]."'> <i class='fa fa-trash-o'></i> </button> </td>"
                    . "</tr>";
                    $row_count++;
                }
            }
            echo "</tbody></table> <input type='text' id='student_fees_total_amount' readonly='true' style='font-weight:bold; text-align:center; font-size:16px;' value='$total_amount'>";
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Student_Fees_Information_PopUpModel($student_fees_id)
    {
        try 
        {
            $response = array();
            $sql2 = "SELECT * FROM student_fess_table, student_table WHERE student_fess_id='$student_fees_id' AND student_id = student_id_fk";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) { $response = $row2; }
            echo json_encode($response);    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Single_Student_Fees_Information_Delete($student_fees_id)
    {
        try
        {
            $sql = "Delete FROM student_fess_table WHERE student_fess_id=?";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            $stmt->bind_param("s", $student_fees_id);
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Fees_Student_Data_Function($student_id, $my_fees_id, $fee_student_fee_type, $fee_student_amount, $fee_student_issue_date, $fee_student_last_date, $fee_student_submit_date, $fee_student_note) 
    {
        try
        {
            $sql2 = "SELECT count(student_id_fk) value_count FROM student_fess_table WHERE student_id_fk='$student_id' AND student_fess_start_date='$fee_student_issue_date'";
            $result2 = $this->conn->query($sql2);
            if($row2 = mysqli_fetch_assoc($result2)) 
            {
                if($row2["value_count"] > 1) { echo 'Sorry!, One date only one free can etner...'; }
                else 
                {
                    $sql = "UPDATE student_fess_table SET student_fess_type=?, student_fess_amount=?, student_fess_start_date=?, student_fess_end_date=?, student_fess_submit_date=?, student_fess_description=? WHERE student_fess_id='$my_fees_id'";
                    $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
                    mysqli_stmt_bind_param($stmt,"ssssss", $fee_student_fee_type, $fee_student_amount, $fee_student_issue_date, $fee_student_last_date, $fee_student_submit_date, $fee_student_note);
                    mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
                    echo 'Update Successfully';
                }
            }
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
