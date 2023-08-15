<?php
class TimeTableClass 
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "school_system_db";

    function __construct() {
    $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){ die("Connection failed: " . $this->conn->connect_error); }
    }
    
    function Update_Class1_TimeTable_Tunction($total_rows,
        $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
        $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
        $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
        $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
        $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
        $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,
            
        $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
        $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
        $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
        $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
        $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
        $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,
            
        $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
        $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
        $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
        $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
        $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
        $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,
            
        $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
        $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
        $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
        $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
        $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
        $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,
            
        $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
        $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
        $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
        $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
        $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
        $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,
            
        $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
        $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
        $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
        $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
        $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
        $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,
            
        $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
        $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
        $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
        $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
        $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
        $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
    ){
        try
        {
            $sql = "UPDATE time_table_class_table 
                SET total_rows=?,
                row_1_cell_1=?, row_2_cell_1=?, row_3_cell_1=?, 
                row_6_cell_1=?, row_7_cell_1=?, row_8_cell_1=?,
                row_11_cell_1=?, row_12_cell_1=?, row_13_cell_1=?,
                row_16_cell_1=?, row_17_cell_1=?, row_18_cell_1=?,
                row_21_cell_1=?, row_22_cell_1=?, row_23_cell_1=?,
                row_26_cell_1=?, row_27_cell_1=?, row_28_cell_1=?,

                row_1_cell_2=?, row_2_cell_2=?, row_3_cell_2=?, 
                row_6_cell_2=?, row_7_cell_2=?, row_8_cell_2=?,
                row_11_cell_2=?, row_12_cell_2=?, row_13_cell_2=?,
                row_16_cell_2=?, row_17_cell_2=?, row_18_cell_2=?,
                row_21_cell_2=?, row_22_cell_2=?, row_23_cell_2=?,
                row_26_cell_2=?, row_27_cell_2=?, row_28_cell_2=?,

                row_1_cell_3=?, row_2_cell_3=?, row_3_cell_3=?, 
                row_6_cell_3=?, row_7_cell_3=?, row_8_cell_3=?,
                row_11_cell_3=?, row_12_cell_3=?, row_13_cell_3=?,
                row_16_cell_3=?, row_17_cell_3=?, row_18_cell_3=?,
                row_21_cell_3=?, row_22_cell_3=?, row_23_cell_3=?,
                row_26_cell_3=?, row_27_cell_3=?, row_28_cell_3=?,

                row_1_cell_4=?, row_2_cell_4=?, row_3_cell_4=?, 
                row_6_cell_4=?, row_7_cell_4=?, row_8_cell_4=?,
                row_11_cell_4=?, row_12_cell_4=?, row_13_cell_4=?,
                row_16_cell_4=?, row_17_cell_4=?, row_18_cell_4=?,
                row_21_cell_4=?, row_22_cell_4=?, row_23_cell_4=?,
                row_26_cell_4=?, row_27_cell_4=?, row_28_cell_4=?,

                row_1_cell_5=?, row_2_cell_5=?, row_3_cell_5=?, 
                row_6_cell_5=?, row_7_cell_5=?, row_8_cell_5=?,
                row_11_cell_5=?, row_12_cell_5=?, row_13_cell_5=?,
                row_16_cell_5=?, row_17_cell_5=?, row_18_cell_5=?,
                row_21_cell_5=?, row_22_cell_5=?, row_23_cell_5=?,
                row_26_cell_5=?, row_27_cell_5=?, row_28_cell_5=?,

                row_1_cell_6=?, row_2_cell_6=?, row_3_cell_6=?, 
                row_6_cell_6=?, row_7_cell_6=?, row_8_cell_6=?,
                row_11_cell_6=?, row_12_cell_6=?, row_13_cell_6=?,
                row_16_cell_6=?, row_17_cell_6=?, row_18_cell_6=?,
                row_21_cell_6=?, row_22_cell_6=?, row_23_cell_6=?,
                row_26_cell_6=?, row_27_cell_6=?, row_28_cell_6=?,

                row_1_cell_7=?, row_2_cell_7=?, row_3_cell_7=?, 
                row_6_cell_7=?, row_7_cell_7=?, row_8_cell_7=?,
                row_11_cell_7=?, row_12_cell_7=?, row_13_cell_7=?,
                row_16_cell_7=?, row_17_cell_7=?, row_18_cell_7=?,
                row_21_cell_7=?, row_22_cell_7=?, row_23_cell_7=?,
                row_26_cell_7=?, row_27_cell_7=?, row_28_cell_7=?
                WHERE time_table_class_id='1'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss", $total_rows,
                $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
                $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
                $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
                $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
                $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
                $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,

                $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
                $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
                $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
                $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
                $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
                $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,

                $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
                $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
                $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
                $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
                $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
                $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,

                $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
                $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
                $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
                $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
                $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
                $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,

                $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
                $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
                $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
                $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
                $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
                $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,

                $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
                $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
                $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
                $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
                $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
                $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,

                $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
                $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
                $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
                $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
                $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
                $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
            );
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
            echo 'Successfully Update...';
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }
    
    function Load_TimeTable_Class1_Function()
    {
        try
        {
            echo'<table style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=1";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo '<td style="width:170px">'.$row["row_1_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td style="width:170px">'.$row["row_1_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td style="width:170px">'.$row["row_1_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td style="width:170px">'.$row["row_1_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td style="width:170px">'.$row["row_1_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td style="width:170px">'.$row["row_1_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td style="width:170px">'.$row["row_1_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_2_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_2_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_2_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_2_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_2_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_2_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_2_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_3_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_3_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_3_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_3_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_3_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_3_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_3_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_6_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_6_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_6_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_6_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_6_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_6_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_6_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_7_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_7_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_7_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_7_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_7_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_7_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_7_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_8_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_8_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_8_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_8_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_8_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_8_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_8_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_11_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_11_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_11_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_11_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_11_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_11_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_11_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_12_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_12_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_12_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_12_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_12_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_12_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_12_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_13_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_13_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_13_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_13_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_13_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_13_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_13_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_16_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_16_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_16_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_16_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_16_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_16_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_16_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_17_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_17_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_17_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_17_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_17_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_17_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_17_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_18_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_18_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_18_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_18_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_18_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_18_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_18_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_21_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_21_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_21_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_21_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_21_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_21_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_21_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_22_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_22_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_22_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_22_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_22_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_22_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_22_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_23_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_23_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_23_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_23_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_23_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_23_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_23_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_26_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_26_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_26_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_26_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_26_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_26_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_26_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_27_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_27_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_27_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_27_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_27_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_27_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_27_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_28_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_28_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_28_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_28_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_28_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_28_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_28_cell_7"].'</td>'; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_TimeTable_Class1_PopUpModel_Function()
    {
        try
        {
            echo'<table id="tblSample" style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=1";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px' class='limited' maxlength='15' id='row_1_cell_1' value='".$row["row_1_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px' class='input_id limited' maxlength='15' id='row_1_cell_2' value='".$row["row_1_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px' class='input_id limited' maxlength='15' id='row_1_cell_3' value='".$row["row_1_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px' class='input_id limited' maxlength='15' id='row_1_cell_4' value='".$row["row_1_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px' class='input_id limited' maxlength='15' id='row_1_cell_5' value='".$row["row_1_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_1_cell_6' value='".$row["row_1_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_1_cell_7' value='".$row["row_1_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_1' value='".$row["row_2_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_2' value='".$row["row_2_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_3' value='".$row["row_2_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_4' value='".$row["row_2_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_5' value='".$row["row_2_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_6' value='".$row["row_2_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_2_cell_7' value='".$row["row_2_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_1' value='".$row["row_3_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_2' value='".$row["row_3_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_3' value='".$row["row_3_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_4' value='".$row["row_3_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_5' value='".$row["row_3_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_6' value='".$row["row_3_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_3_cell_7' value='".$row["row_3_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_1' value='".$row["row_6_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_2' value='".$row["row_6_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_3' value='".$row["row_6_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_4' value='".$row["row_6_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_5' value='".$row["row_6_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_6' value='".$row["row_6_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_6_cell_7' value='".$row["row_6_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_1' value='".$row["row_7_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_2' value='".$row["row_7_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_3' value='".$row["row_7_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_4' value='".$row["row_7_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_5' value='".$row["row_7_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_6' value='".$row["row_7_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_7_cell_7' value='".$row["row_7_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_1' value='".$row["row_8_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_2' value='".$row["row_8_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_3' value='".$row["row_8_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_4' value='".$row["row_8_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_5' value='".$row["row_8_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_6' value='".$row["row_8_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_8_cell_7' value='".$row["row_8_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_1' value='".$row["row_11_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_2' value='".$row["row_11_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_3' value='".$row["row_11_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_4' value='".$row["row_11_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_5' value='".$row["row_11_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_6' value='".$row["row_11_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_11_cell_7' value='".$row["row_11_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_1' value='".$row["row_12_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_2' value='".$row["row_12_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_3' value='".$row["row_12_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_4' value='".$row["row_12_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_5' value='".$row["row_12_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_6' value='".$row["row_12_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_12_cell_7' value='".$row["row_12_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_1' value='".$row["row_13_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_2' value='".$row["row_13_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_3' value='".$row["row_13_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_4' value='".$row["row_13_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_5' value='".$row["row_13_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_6' value='".$row["row_13_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_13_cell_7' value='".$row["row_13_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_1' value='".$row["row_16_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_2' value='".$row["row_16_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_3' value='".$row["row_16_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_4' value='".$row["row_16_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_5' value='".$row["row_16_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_6' value='".$row["row_16_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_16_cell_7' value='".$row["row_16_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_1' value='".$row["row_17_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_2' value='".$row["row_17_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_3' value='".$row["row_17_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_4' value='".$row["row_17_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_5' value='".$row["row_17_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_6' value='".$row["row_17_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_17_cell_7' value='".$row["row_17_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_1' value='".$row["row_18_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_2' value='".$row["row_18_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_3' value='".$row["row_18_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_4' value='".$row["row_18_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_5' value='".$row["row_18_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_6' value='".$row["row_18_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_18_cell_7' value='".$row["row_18_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_1' value='".$row["row_21_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_2' value='".$row["row_21_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_3' value='".$row["row_21_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_4' value='".$row["row_21_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_5' value='".$row["row_21_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_6' value='".$row["row_21_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_21_cell_7' value='".$row["row_21_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_1' value='".$row["row_22_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_2' value='".$row["row_22_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_3' value='".$row["row_22_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_4' value='".$row["row_22_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_5' value='".$row["row_22_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_6' value='".$row["row_22_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_22_cell_7' value='".$row["row_22_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_1' value='".$row["row_23_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_2' value='".$row["row_23_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_3' value='".$row["row_23_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_4' value='".$row["row_23_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_5' value='".$row["row_23_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_6' value='".$row["row_23_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_23_cell_7' value='".$row["row_23_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_1' value='".$row["row_26_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_2' value='".$row["row_26_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_3' value='".$row["row_26_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_4' value='".$row["row_26_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_5' value='".$row["row_26_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_6' value='".$row["row_26_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_26_cell_7' value='".$row["row_26_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_1' value='".$row["row_27_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_2' value='".$row["row_27_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_3' value='".$row["row_27_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_4' value='".$row["row_27_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_5' value='".$row["row_27_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_6' value='".$row["row_27_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_27_cell_7' value='".$row["row_27_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_1' value='".$row["row_28_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_2' value='".$row["row_28_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_3' value='".$row["row_28_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_4' value='".$row["row_28_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_5' value='".$row["row_28_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_6' value='".$row["row_28_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='input_id limited' maxlength='15' id='row_28_cell_7' value='".$row["row_28_cell_7"]."'></td>"; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    // ==============================================================================================
    // =========================================== Class2 ===========================================
    // ==============================================================================================
    
    function Load_TimeTable_Class2_Function()
    {
        try
        {
            echo'<table style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=2";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo '<td style="width:170px">'.$row["row_1_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td style="width:170px">'.$row["row_1_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td style="width:170px">'.$row["row_1_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td style="width:170px">'.$row["row_1_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td style="width:170px">'.$row["row_1_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td style="width:170px">'.$row["row_1_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td style="width:170px">'.$row["row_1_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_2_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_2_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_2_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_2_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_2_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_2_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_2_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_3_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_3_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_3_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_3_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_3_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_3_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_3_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_6_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_6_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_6_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_6_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_6_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_6_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_6_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_7_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_7_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_7_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_7_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_7_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_7_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_7_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_8_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_8_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_8_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_8_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_8_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_8_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_8_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_11_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_11_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_11_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_11_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_11_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_11_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_11_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_12_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_12_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_12_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_12_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_12_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_12_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_12_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_13_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_13_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_13_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_13_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_13_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_13_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_13_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_16_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_16_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_16_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_16_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_16_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_16_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_16_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_17_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_17_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_17_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_17_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_17_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_17_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_17_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_18_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_18_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_18_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_18_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_18_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_18_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_18_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_21_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_21_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_21_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_21_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_21_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_21_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_21_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_22_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_22_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_22_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_22_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_22_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_22_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_22_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_23_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_23_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_23_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_23_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_23_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_23_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_23_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_26_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_26_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_26_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_26_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_26_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_26_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_26_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_27_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_27_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_27_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_27_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_27_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_27_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_27_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_28_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_28_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_28_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_28_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_28_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_28_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_28_cell_7"].'</td>'; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_TimeTable_Class2_PopUpModel_Function()
    {
        try
        {
            echo'<table id="class2_tblSample" style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=2";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_1' value='".$row["row_1_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_2' value='".$row["row_1_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_3' value='".$row["row_1_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_4' value='".$row["row_1_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_5' value='".$row["row_1_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_6' value='".$row["row_1_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_1_cell_7' value='".$row["row_1_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_1' value='".$row["row_2_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_2' value='".$row["row_2_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_3' value='".$row["row_2_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_4' value='".$row["row_2_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_5' value='".$row["row_2_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_6' value='".$row["row_2_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_2_cell_7' value='".$row["row_2_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_1' value='".$row["row_3_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_2' value='".$row["row_3_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_3' value='".$row["row_3_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_4' value='".$row["row_3_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_5' value='".$row["row_3_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_6' value='".$row["row_3_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_3_cell_7' value='".$row["row_3_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_1' value='".$row["row_6_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_2' value='".$row["row_6_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_3' value='".$row["row_6_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_4' value='".$row["row_6_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_5' value='".$row["row_6_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_6' value='".$row["row_6_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_6_cell_7' value='".$row["row_6_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_1' value='".$row["row_7_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_2' value='".$row["row_7_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_3' value='".$row["row_7_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_4' value='".$row["row_7_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_5' value='".$row["row_7_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_6' value='".$row["row_7_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_7_cell_7' value='".$row["row_7_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_1' value='".$row["row_8_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_2' value='".$row["row_8_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_3' value='".$row["row_8_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_4' value='".$row["row_8_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_5' value='".$row["row_8_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_6' value='".$row["row_8_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_8_cell_7' value='".$row["row_8_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_1' value='".$row["row_11_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_2' value='".$row["row_11_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_3' value='".$row["row_11_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_4' value='".$row["row_11_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_5' value='".$row["row_11_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_6' value='".$row["row_11_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_11_cell_7' value='".$row["row_11_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_1' value='".$row["row_12_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_2' value='".$row["row_12_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_3' value='".$row["row_12_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_4' value='".$row["row_12_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_5' value='".$row["row_12_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_6' value='".$row["row_12_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_12_cell_7' value='".$row["row_12_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_1' value='".$row["row_13_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_2' value='".$row["row_13_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_3' value='".$row["row_13_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_4' value='".$row["row_13_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_5' value='".$row["row_13_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_6' value='".$row["row_13_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_13_cell_7' value='".$row["row_13_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_1' value='".$row["row_16_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_2' value='".$row["row_16_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_3' value='".$row["row_16_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_4' value='".$row["row_16_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_5' value='".$row["row_16_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_6' value='".$row["row_16_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_16_cell_7' value='".$row["row_16_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_1' value='".$row["row_17_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_2' value='".$row["row_17_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_3' value='".$row["row_17_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_4' value='".$row["row_17_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_5' value='".$row["row_17_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_6' value='".$row["row_17_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_17_cell_7' value='".$row["row_17_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_1' value='".$row["row_18_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_2' value='".$row["row_18_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_3' value='".$row["row_18_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_4' value='".$row["row_18_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_5' value='".$row["row_18_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_6' value='".$row["row_18_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_18_cell_7' value='".$row["row_18_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_1' value='".$row["row_21_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_2' value='".$row["row_21_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_3' value='".$row["row_21_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_4' value='".$row["row_21_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_5' value='".$row["row_21_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_6' value='".$row["row_21_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_21_cell_7' value='".$row["row_21_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_1' value='".$row["row_22_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_2' value='".$row["row_22_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_3' value='".$row["row_22_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_4' value='".$row["row_22_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_5' value='".$row["row_22_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_6' value='".$row["row_22_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_22_cell_7' value='".$row["row_22_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_1' value='".$row["row_23_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_2' value='".$row["row_23_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_3' value='".$row["row_23_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_4' value='".$row["row_23_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_5' value='".$row["row_23_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_6' value='".$row["row_23_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_23_cell_7' value='".$row["row_23_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_1' value='".$row["row_26_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_2' value='".$row["row_26_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_3' value='".$row["row_26_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_4' value='".$row["row_26_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_5' value='".$row["row_26_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_6' value='".$row["row_26_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_26_cell_7' value='".$row["row_26_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_1' value='".$row["row_27_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_2' value='".$row["row_27_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_3' value='".$row["row_27_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_4' value='".$row["row_27_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_5' value='".$row["row_27_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_6' value='".$row["row_27_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_27_cell_7' value='".$row["row_27_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_1' value='".$row["row_28_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_2' value='".$row["row_28_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_3' value='".$row["row_28_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_4' value='".$row["row_28_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_5' value='".$row["row_28_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_6' value='".$row["row_28_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class2_row_28_cell_7' value='".$row["row_28_cell_7"]."'></td>"; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Class2_TimeTable_Tunction($total_rows,
        $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
        $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
        $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
        $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
        $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
        $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,
            
        $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
        $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
        $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
        $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
        $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
        $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,
            
        $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
        $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
        $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
        $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
        $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
        $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,
            
        $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
        $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
        $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
        $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
        $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
        $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,
            
        $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
        $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
        $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
        $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
        $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
        $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,
            
        $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
        $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
        $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
        $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
        $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
        $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,
            
        $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
        $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
        $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
        $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
        $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
        $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
    ){
        try
        {
            $sql = "UPDATE time_table_class_table 
                SET total_rows=?,
                row_1_cell_1=?, row_2_cell_1=?, row_3_cell_1=?, 
                row_6_cell_1=?, row_7_cell_1=?, row_8_cell_1=?,
                row_11_cell_1=?, row_12_cell_1=?, row_13_cell_1=?,
                row_16_cell_1=?, row_17_cell_1=?, row_18_cell_1=?,
                row_21_cell_1=?, row_22_cell_1=?, row_23_cell_1=?,
                row_26_cell_1=?, row_27_cell_1=?, row_28_cell_1=?,

                row_1_cell_2=?, row_2_cell_2=?, row_3_cell_2=?, 
                row_6_cell_2=?, row_7_cell_2=?, row_8_cell_2=?,
                row_11_cell_2=?, row_12_cell_2=?, row_13_cell_2=?,
                row_16_cell_2=?, row_17_cell_2=?, row_18_cell_2=?,
                row_21_cell_2=?, row_22_cell_2=?, row_23_cell_2=?,
                row_26_cell_2=?, row_27_cell_2=?, row_28_cell_2=?,

                row_1_cell_3=?, row_2_cell_3=?, row_3_cell_3=?, 
                row_6_cell_3=?, row_7_cell_3=?, row_8_cell_3=?,
                row_11_cell_3=?, row_12_cell_3=?, row_13_cell_3=?,
                row_16_cell_3=?, row_17_cell_3=?, row_18_cell_3=?,
                row_21_cell_3=?, row_22_cell_3=?, row_23_cell_3=?,
                row_26_cell_3=?, row_27_cell_3=?, row_28_cell_3=?,

                row_1_cell_4=?, row_2_cell_4=?, row_3_cell_4=?, 
                row_6_cell_4=?, row_7_cell_4=?, row_8_cell_4=?,
                row_11_cell_4=?, row_12_cell_4=?, row_13_cell_4=?,
                row_16_cell_4=?, row_17_cell_4=?, row_18_cell_4=?,
                row_21_cell_4=?, row_22_cell_4=?, row_23_cell_4=?,
                row_26_cell_4=?, row_27_cell_4=?, row_28_cell_4=?,

                row_1_cell_5=?, row_2_cell_5=?, row_3_cell_5=?, 
                row_6_cell_5=?, row_7_cell_5=?, row_8_cell_5=?,
                row_11_cell_5=?, row_12_cell_5=?, row_13_cell_5=?,
                row_16_cell_5=?, row_17_cell_5=?, row_18_cell_5=?,
                row_21_cell_5=?, row_22_cell_5=?, row_23_cell_5=?,
                row_26_cell_5=?, row_27_cell_5=?, row_28_cell_5=?,

                row_1_cell_6=?, row_2_cell_6=?, row_3_cell_6=?, 
                row_6_cell_6=?, row_7_cell_6=?, row_8_cell_6=?,
                row_11_cell_6=?, row_12_cell_6=?, row_13_cell_6=?,
                row_16_cell_6=?, row_17_cell_6=?, row_18_cell_6=?,
                row_21_cell_6=?, row_22_cell_6=?, row_23_cell_6=?,
                row_26_cell_6=?, row_27_cell_6=?, row_28_cell_6=?,

                row_1_cell_7=?, row_2_cell_7=?, row_3_cell_7=?, 
                row_6_cell_7=?, row_7_cell_7=?, row_8_cell_7=?,
                row_11_cell_7=?, row_12_cell_7=?, row_13_cell_7=?,
                row_16_cell_7=?, row_17_cell_7=?, row_18_cell_7=?,
                row_21_cell_7=?, row_22_cell_7=?, row_23_cell_7=?,
                row_26_cell_7=?, row_27_cell_7=?, row_28_cell_7=?
                WHERE time_table_class_id='2'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss", $total_rows,
                $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
                $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
                $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
                $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
                $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
                $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,

                $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
                $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
                $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
                $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
                $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
                $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,

                $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
                $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
                $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
                $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
                $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
                $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,

                $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
                $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
                $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
                $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
                $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
                $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,

                $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
                $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
                $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
                $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
                $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
                $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,

                $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
                $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
                $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
                $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
                $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
                $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,

                $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
                $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
                $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
                $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
                $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
                $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
            );
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
            echo 'Successfully Update...';
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }
    
    // ==============================================================================================
    // =========================================== Class3 ===========================================
    // ==============================================================================================
    
    function Load_TimeTable_Class3_Function()
    {
        try
        {
            echo'<table style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=3";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo '<td style="width:170px">'.$row["row_1_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td style="width:170px">'.$row["row_1_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td style="width:170px">'.$row["row_1_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td style="width:170px">'.$row["row_1_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td style="width:170px">'.$row["row_1_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td style="width:170px">'.$row["row_1_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td style="width:170px">'.$row["row_1_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_2_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_2_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_2_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_2_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_2_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_2_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_2_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_3_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_3_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_3_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_3_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_3_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_3_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_3_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_6_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_6_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_6_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_6_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_6_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_6_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_6_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_7_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_7_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_7_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_7_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_7_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_7_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_7_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_8_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_8_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_8_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_8_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_8_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_8_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_8_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_11_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_11_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_11_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_11_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_11_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_11_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_11_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_12_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_12_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_12_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_12_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_12_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_12_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_12_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_13_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_13_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_13_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_13_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_13_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_13_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_13_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_16_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_16_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_16_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_16_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_16_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_16_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_16_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_17_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_17_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_17_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_17_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_17_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_17_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_17_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_18_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_18_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_18_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_18_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_18_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_18_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_18_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_21_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_21_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_21_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_21_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_21_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_21_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_21_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_22_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_22_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_22_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_22_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_22_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_22_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_22_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_23_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_23_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_23_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_23_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_23_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_23_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_23_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_26_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_26_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_26_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_26_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_26_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_26_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_26_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_27_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_27_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_27_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_27_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_27_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_27_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_27_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_28_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_28_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_28_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_28_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_28_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_28_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_28_cell_7"].'</td>'; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_TimeTable_Class3_PopUpModel_Function()
    {
        try
        {
            echo'<table id="class3_tblSample" style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=3";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_1' value='".$row["row_1_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_2' value='".$row["row_1_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_3' value='".$row["row_1_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_4' value='".$row["row_1_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_5' value='".$row["row_1_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_6' value='".$row["row_1_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_1_cell_7' value='".$row["row_1_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_1' value='".$row["row_2_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_2' value='".$row["row_2_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_3' value='".$row["row_2_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_4' value='".$row["row_2_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_5' value='".$row["row_2_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_6' value='".$row["row_2_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_2_cell_7' value='".$row["row_2_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_1' value='".$row["row_3_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_2' value='".$row["row_3_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_3' value='".$row["row_3_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_4' value='".$row["row_3_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_5' value='".$row["row_3_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_6' value='".$row["row_3_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_3_cell_7' value='".$row["row_3_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_1' value='".$row["row_6_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_2' value='".$row["row_6_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_3' value='".$row["row_6_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_4' value='".$row["row_6_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_5' value='".$row["row_6_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_6' value='".$row["row_6_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_6_cell_7' value='".$row["row_6_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_1' value='".$row["row_7_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_2' value='".$row["row_7_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_3' value='".$row["row_7_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_4' value='".$row["row_7_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_5' value='".$row["row_7_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_6' value='".$row["row_7_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_7_cell_7' value='".$row["row_7_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_1' value='".$row["row_8_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_2' value='".$row["row_8_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_3' value='".$row["row_8_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_4' value='".$row["row_8_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_5' value='".$row["row_8_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_6' value='".$row["row_8_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_8_cell_7' value='".$row["row_8_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_1' value='".$row["row_11_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_2' value='".$row["row_11_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_3' value='".$row["row_11_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_4' value='".$row["row_11_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_5' value='".$row["row_11_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_6' value='".$row["row_11_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_11_cell_7' value='".$row["row_11_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_1' value='".$row["row_12_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_2' value='".$row["row_12_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_3' value='".$row["row_12_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_4' value='".$row["row_12_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_5' value='".$row["row_12_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_6' value='".$row["row_12_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_12_cell_7' value='".$row["row_12_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_1' value='".$row["row_13_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_2' value='".$row["row_13_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_3' value='".$row["row_13_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_4' value='".$row["row_13_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_5' value='".$row["row_13_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_6' value='".$row["row_13_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_13_cell_7' value='".$row["row_13_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_1' value='".$row["row_16_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_2' value='".$row["row_16_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_3' value='".$row["row_16_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_4' value='".$row["row_16_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_5' value='".$row["row_16_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_6' value='".$row["row_16_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_16_cell_7' value='".$row["row_16_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_1' value='".$row["row_17_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_2' value='".$row["row_17_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_3' value='".$row["row_17_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_4' value='".$row["row_17_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_5' value='".$row["row_17_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_6' value='".$row["row_17_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_17_cell_7' value='".$row["row_17_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_1' value='".$row["row_18_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_2' value='".$row["row_18_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_3' value='".$row["row_18_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_4' value='".$row["row_18_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_5' value='".$row["row_18_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_6' value='".$row["row_18_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_18_cell_7' value='".$row["row_18_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_1' value='".$row["row_21_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_2' value='".$row["row_21_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_3' value='".$row["row_21_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_4' value='".$row["row_21_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_5' value='".$row["row_21_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_6' value='".$row["row_21_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_21_cell_7' value='".$row["row_21_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_1' value='".$row["row_22_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_2' value='".$row["row_22_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_3' value='".$row["row_22_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_4' value='".$row["row_22_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_5' value='".$row["row_22_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_6' value='".$row["row_22_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_22_cell_7' value='".$row["row_22_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_1' value='".$row["row_23_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_2' value='".$row["row_23_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_3' value='".$row["row_23_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_4' value='".$row["row_23_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_5' value='".$row["row_23_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_6' value='".$row["row_23_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_23_cell_7' value='".$row["row_23_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_1' value='".$row["row_26_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_2' value='".$row["row_26_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_3' value='".$row["row_26_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_4' value='".$row["row_26_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_5' value='".$row["row_26_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_6' value='".$row["row_26_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_26_cell_7' value='".$row["row_26_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_1' value='".$row["row_27_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_2' value='".$row["row_27_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_3' value='".$row["row_27_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_4' value='".$row["row_27_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_5' value='".$row["row_27_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_6' value='".$row["row_27_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_27_cell_7' value='".$row["row_27_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_1' value='".$row["row_28_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_2' value='".$row["row_28_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_3' value='".$row["row_28_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_4' value='".$row["row_28_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_5' value='".$row["row_28_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_6' value='".$row["row_28_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class3_row_28_cell_7' value='".$row["row_28_cell_7"]."'></td>"; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Class3_TimeTable_Tunction($total_rows,
        $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
        $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
        $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
        $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
        $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
        $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,
            
        $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
        $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
        $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
        $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
        $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
        $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,
            
        $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
        $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
        $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
        $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
        $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
        $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,
            
        $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
        $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
        $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
        $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
        $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
        $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,
            
        $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
        $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
        $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
        $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
        $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
        $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,
            
        $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
        $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
        $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
        $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
        $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
        $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,
            
        $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
        $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
        $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
        $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
        $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
        $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
    ){
        try
        {
            $sql = "UPDATE time_table_class_table 
                SET total_rows=?,
                row_1_cell_1=?, row_2_cell_1=?, row_3_cell_1=?, 
                row_6_cell_1=?, row_7_cell_1=?, row_8_cell_1=?,
                row_11_cell_1=?, row_12_cell_1=?, row_13_cell_1=?,
                row_16_cell_1=?, row_17_cell_1=?, row_18_cell_1=?,
                row_21_cell_1=?, row_22_cell_1=?, row_23_cell_1=?,
                row_26_cell_1=?, row_27_cell_1=?, row_28_cell_1=?,

                row_1_cell_2=?, row_2_cell_2=?, row_3_cell_2=?, 
                row_6_cell_2=?, row_7_cell_2=?, row_8_cell_2=?,
                row_11_cell_2=?, row_12_cell_2=?, row_13_cell_2=?,
                row_16_cell_2=?, row_17_cell_2=?, row_18_cell_2=?,
                row_21_cell_2=?, row_22_cell_2=?, row_23_cell_2=?,
                row_26_cell_2=?, row_27_cell_2=?, row_28_cell_2=?,

                row_1_cell_3=?, row_2_cell_3=?, row_3_cell_3=?, 
                row_6_cell_3=?, row_7_cell_3=?, row_8_cell_3=?,
                row_11_cell_3=?, row_12_cell_3=?, row_13_cell_3=?,
                row_16_cell_3=?, row_17_cell_3=?, row_18_cell_3=?,
                row_21_cell_3=?, row_22_cell_3=?, row_23_cell_3=?,
                row_26_cell_3=?, row_27_cell_3=?, row_28_cell_3=?,

                row_1_cell_4=?, row_2_cell_4=?, row_3_cell_4=?, 
                row_6_cell_4=?, row_7_cell_4=?, row_8_cell_4=?,
                row_11_cell_4=?, row_12_cell_4=?, row_13_cell_4=?,
                row_16_cell_4=?, row_17_cell_4=?, row_18_cell_4=?,
                row_21_cell_4=?, row_22_cell_4=?, row_23_cell_4=?,
                row_26_cell_4=?, row_27_cell_4=?, row_28_cell_4=?,

                row_1_cell_5=?, row_2_cell_5=?, row_3_cell_5=?, 
                row_6_cell_5=?, row_7_cell_5=?, row_8_cell_5=?,
                row_11_cell_5=?, row_12_cell_5=?, row_13_cell_5=?,
                row_16_cell_5=?, row_17_cell_5=?, row_18_cell_5=?,
                row_21_cell_5=?, row_22_cell_5=?, row_23_cell_5=?,
                row_26_cell_5=?, row_27_cell_5=?, row_28_cell_5=?,

                row_1_cell_6=?, row_2_cell_6=?, row_3_cell_6=?, 
                row_6_cell_6=?, row_7_cell_6=?, row_8_cell_6=?,
                row_11_cell_6=?, row_12_cell_6=?, row_13_cell_6=?,
                row_16_cell_6=?, row_17_cell_6=?, row_18_cell_6=?,
                row_21_cell_6=?, row_22_cell_6=?, row_23_cell_6=?,
                row_26_cell_6=?, row_27_cell_6=?, row_28_cell_6=?,

                row_1_cell_7=?, row_2_cell_7=?, row_3_cell_7=?, 
                row_6_cell_7=?, row_7_cell_7=?, row_8_cell_7=?,
                row_11_cell_7=?, row_12_cell_7=?, row_13_cell_7=?,
                row_16_cell_7=?, row_17_cell_7=?, row_18_cell_7=?,
                row_21_cell_7=?, row_22_cell_7=?, row_23_cell_7=?,
                row_26_cell_7=?, row_27_cell_7=?, row_28_cell_7=?
                WHERE time_table_class_id='3'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss", $total_rows,
                $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
                $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
                $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
                $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
                $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
                $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,

                $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
                $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
                $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
                $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
                $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
                $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,

                $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
                $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
                $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
                $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
                $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
                $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,

                $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
                $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
                $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
                $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
                $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
                $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,

                $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
                $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
                $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
                $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
                $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
                $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,

                $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
                $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
                $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
                $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
                $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
                $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,

                $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
                $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
                $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
                $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
                $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
                $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
            );
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
            echo 'Successfully Update...';
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }
    
    // ==============================================================================================
    // =========================================== Class4 ===========================================
    // ==============================================================================================
    
    function Load_TimeTable_Class4_Function()
    {
        try
        {
            echo'<table style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=4";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo '<td style="width:170px">'.$row["row_1_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td style="width:170px">'.$row["row_1_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td style="width:170px">'.$row["row_1_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td style="width:170px">'.$row["row_1_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td style="width:170px">'.$row["row_1_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td style="width:170px">'.$row["row_1_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td style="width:170px">'.$row["row_1_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_2_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_2_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_2_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_2_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_2_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_2_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_2_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_3_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_3_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_3_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_3_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_3_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_3_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_3_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_6_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_6_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_6_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_6_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_6_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_6_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_6_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_7_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_7_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_7_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_7_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_7_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_7_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_7_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_8_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_8_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_8_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_8_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_8_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_8_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_8_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_11_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_11_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_11_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_11_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_11_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_11_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_11_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_12_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_12_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_12_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_12_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_12_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_12_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_12_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_13_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_13_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_13_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_13_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_13_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_13_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_13_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_16_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_16_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_16_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_16_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_16_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_16_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_16_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_17_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_17_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_17_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_17_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_17_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_17_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_17_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_18_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_18_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_18_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_18_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_18_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_18_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_18_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_21_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_21_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_21_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_21_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_21_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_21_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_21_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_22_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_22_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_22_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_22_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_22_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_22_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_22_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_23_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_23_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_23_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_23_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_23_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_23_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_23_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_26_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_26_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_26_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_26_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_26_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_26_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_26_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_27_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_27_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_27_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_27_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_27_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_27_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_27_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_28_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_28_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_28_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_28_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_28_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_28_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_28_cell_7"].'</td>'; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_TimeTable_Class4_PopUpModel_Function()
    {
        try
        {
            echo'<table id="class4_tblSample" style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=4";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_1' value='".$row["row_1_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_2' value='".$row["row_1_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_3' value='".$row["row_1_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_4' value='".$row["row_1_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_5' value='".$row["row_1_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_6' value='".$row["row_1_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_1_cell_7' value='".$row["row_1_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_1' value='".$row["row_2_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_2' value='".$row["row_2_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_3' value='".$row["row_2_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_4' value='".$row["row_2_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_5' value='".$row["row_2_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_6' value='".$row["row_2_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_2_cell_7' value='".$row["row_2_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_1' value='".$row["row_3_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_2' value='".$row["row_3_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_3' value='".$row["row_3_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_4' value='".$row["row_3_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_5' value='".$row["row_3_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_6' value='".$row["row_3_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_3_cell_7' value='".$row["row_3_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_1' value='".$row["row_6_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_2' value='".$row["row_6_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_3' value='".$row["row_6_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_4' value='".$row["row_6_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_5' value='".$row["row_6_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_6' value='".$row["row_6_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_6_cell_7' value='".$row["row_6_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_1' value='".$row["row_7_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_2' value='".$row["row_7_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_3' value='".$row["row_7_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_4' value='".$row["row_7_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_5' value='".$row["row_7_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_6' value='".$row["row_7_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_7_cell_7' value='".$row["row_7_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_1' value='".$row["row_8_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_2' value='".$row["row_8_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_3' value='".$row["row_8_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_4' value='".$row["row_8_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_5' value='".$row["row_8_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_6' value='".$row["row_8_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_8_cell_7' value='".$row["row_8_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_1' value='".$row["row_11_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_2' value='".$row["row_11_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_3' value='".$row["row_11_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_4' value='".$row["row_11_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_5' value='".$row["row_11_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_6' value='".$row["row_11_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_11_cell_7' value='".$row["row_11_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_1' value='".$row["row_12_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_2' value='".$row["row_12_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_3' value='".$row["row_12_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_4' value='".$row["row_12_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_5' value='".$row["row_12_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_6' value='".$row["row_12_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_12_cell_7' value='".$row["row_12_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_1' value='".$row["row_13_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_2' value='".$row["row_13_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_3' value='".$row["row_13_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_4' value='".$row["row_13_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_5' value='".$row["row_13_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_6' value='".$row["row_13_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_13_cell_7' value='".$row["row_13_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_1' value='".$row["row_16_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_2' value='".$row["row_16_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_3' value='".$row["row_16_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_4' value='".$row["row_16_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_5' value='".$row["row_16_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_6' value='".$row["row_16_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_16_cell_7' value='".$row["row_16_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_1' value='".$row["row_17_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_2' value='".$row["row_17_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_3' value='".$row["row_17_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_4' value='".$row["row_17_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_5' value='".$row["row_17_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_6' value='".$row["row_17_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_17_cell_7' value='".$row["row_17_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_1' value='".$row["row_18_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_2' value='".$row["row_18_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_3' value='".$row["row_18_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_4' value='".$row["row_18_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_5' value='".$row["row_18_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_6' value='".$row["row_18_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_18_cell_7' value='".$row["row_18_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_1' value='".$row["row_21_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_2' value='".$row["row_21_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_3' value='".$row["row_21_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_4' value='".$row["row_21_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_5' value='".$row["row_21_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_6' value='".$row["row_21_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_21_cell_7' value='".$row["row_21_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_1' value='".$row["row_22_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_2' value='".$row["row_22_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_3' value='".$row["row_22_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_4' value='".$row["row_22_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_5' value='".$row["row_22_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_6' value='".$row["row_22_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_22_cell_7' value='".$row["row_22_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_1' value='".$row["row_23_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_2' value='".$row["row_23_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_3' value='".$row["row_23_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_4' value='".$row["row_23_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_5' value='".$row["row_23_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_6' value='".$row["row_23_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_23_cell_7' value='".$row["row_23_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_1' value='".$row["row_26_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_2' value='".$row["row_26_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_3' value='".$row["row_26_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_4' value='".$row["row_26_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_5' value='".$row["row_26_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_6' value='".$row["row_26_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_26_cell_7' value='".$row["row_26_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_1' value='".$row["row_27_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_2' value='".$row["row_27_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_3' value='".$row["row_27_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_4' value='".$row["row_27_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_5' value='".$row["row_27_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_6' value='".$row["row_27_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_27_cell_7' value='".$row["row_27_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_1' value='".$row["row_28_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_2' value='".$row["row_28_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_3' value='".$row["row_28_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_4' value='".$row["row_28_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_5' value='".$row["row_28_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_6' value='".$row["row_28_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class4_row_28_cell_7' value='".$row["row_28_cell_7"]."'></td>"; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Class4_TimeTable_Tunction($total_rows,
        $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
        $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
        $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
        $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
        $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
        $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,
            
        $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
        $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
        $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
        $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
        $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
        $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,
            
        $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
        $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
        $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
        $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
        $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
        $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,
            
        $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
        $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
        $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
        $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
        $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
        $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,
            
        $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
        $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
        $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
        $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
        $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
        $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,
            
        $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
        $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
        $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
        $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
        $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
        $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,
            
        $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
        $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
        $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
        $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
        $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
        $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
    ){
        try
        {
            $sql = "UPDATE time_table_class_table 
                SET total_rows=?,
                row_1_cell_1=?, row_2_cell_1=?, row_3_cell_1=?, 
                row_6_cell_1=?, row_7_cell_1=?, row_8_cell_1=?,
                row_11_cell_1=?, row_12_cell_1=?, row_13_cell_1=?,
                row_16_cell_1=?, row_17_cell_1=?, row_18_cell_1=?,
                row_21_cell_1=?, row_22_cell_1=?, row_23_cell_1=?,
                row_26_cell_1=?, row_27_cell_1=?, row_28_cell_1=?,

                row_1_cell_2=?, row_2_cell_2=?, row_3_cell_2=?, 
                row_6_cell_2=?, row_7_cell_2=?, row_8_cell_2=?,
                row_11_cell_2=?, row_12_cell_2=?, row_13_cell_2=?,
                row_16_cell_2=?, row_17_cell_2=?, row_18_cell_2=?,
                row_21_cell_2=?, row_22_cell_2=?, row_23_cell_2=?,
                row_26_cell_2=?, row_27_cell_2=?, row_28_cell_2=?,

                row_1_cell_3=?, row_2_cell_3=?, row_3_cell_3=?, 
                row_6_cell_3=?, row_7_cell_3=?, row_8_cell_3=?,
                row_11_cell_3=?, row_12_cell_3=?, row_13_cell_3=?,
                row_16_cell_3=?, row_17_cell_3=?, row_18_cell_3=?,
                row_21_cell_3=?, row_22_cell_3=?, row_23_cell_3=?,
                row_26_cell_3=?, row_27_cell_3=?, row_28_cell_3=?,

                row_1_cell_4=?, row_2_cell_4=?, row_3_cell_4=?, 
                row_6_cell_4=?, row_7_cell_4=?, row_8_cell_4=?,
                row_11_cell_4=?, row_12_cell_4=?, row_13_cell_4=?,
                row_16_cell_4=?, row_17_cell_4=?, row_18_cell_4=?,
                row_21_cell_4=?, row_22_cell_4=?, row_23_cell_4=?,
                row_26_cell_4=?, row_27_cell_4=?, row_28_cell_4=?,

                row_1_cell_5=?, row_2_cell_5=?, row_3_cell_5=?, 
                row_6_cell_5=?, row_7_cell_5=?, row_8_cell_5=?,
                row_11_cell_5=?, row_12_cell_5=?, row_13_cell_5=?,
                row_16_cell_5=?, row_17_cell_5=?, row_18_cell_5=?,
                row_21_cell_5=?, row_22_cell_5=?, row_23_cell_5=?,
                row_26_cell_5=?, row_27_cell_5=?, row_28_cell_5=?,

                row_1_cell_6=?, row_2_cell_6=?, row_3_cell_6=?, 
                row_6_cell_6=?, row_7_cell_6=?, row_8_cell_6=?,
                row_11_cell_6=?, row_12_cell_6=?, row_13_cell_6=?,
                row_16_cell_6=?, row_17_cell_6=?, row_18_cell_6=?,
                row_21_cell_6=?, row_22_cell_6=?, row_23_cell_6=?,
                row_26_cell_6=?, row_27_cell_6=?, row_28_cell_6=?,

                row_1_cell_7=?, row_2_cell_7=?, row_3_cell_7=?, 
                row_6_cell_7=?, row_7_cell_7=?, row_8_cell_7=?,
                row_11_cell_7=?, row_12_cell_7=?, row_13_cell_7=?,
                row_16_cell_7=?, row_17_cell_7=?, row_18_cell_7=?,
                row_21_cell_7=?, row_22_cell_7=?, row_23_cell_7=?,
                row_26_cell_7=?, row_27_cell_7=?, row_28_cell_7=?
                WHERE time_table_class_id='4'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss", $total_rows,
                $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
                $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
                $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
                $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
                $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
                $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,

                $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
                $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
                $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
                $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
                $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
                $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,

                $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
                $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
                $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
                $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
                $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
                $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,

                $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
                $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
                $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
                $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
                $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
                $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,

                $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
                $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
                $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
                $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
                $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
                $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,

                $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
                $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
                $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
                $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
                $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
                $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,

                $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
                $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
                $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
                $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
                $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
                $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
            );
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
            echo 'Successfully Update...';
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }
    
    // ==============================================================================================
    // =========================================== Class5 ===========================================
    // ==============================================================================================
    
    function Load_TimeTable_Class5_Function()
    {
        try
        {
            echo'<table style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=5";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo '<td style="width:170px">'.$row["row_1_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td style="width:170px">'.$row["row_1_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td style="width:170px">'.$row["row_1_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td style="width:170px">'.$row["row_1_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td style="width:170px">'.$row["row_1_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td style="width:170px">'.$row["row_1_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td style="width:170px">'.$row["row_1_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_2_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_2_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_2_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_2_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_2_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_2_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_2_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_3_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_3_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_3_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_3_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_3_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_3_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_3_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_6_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_6_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_6_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_6_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_6_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_6_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_6_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_7_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_7_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_7_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_7_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_7_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_7_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_7_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_8_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_8_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_8_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_8_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_8_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_8_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_8_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_11_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_11_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_11_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_11_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_11_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_11_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_11_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_12_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_12_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_12_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_12_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_12_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_12_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_12_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_13_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_13_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_13_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_13_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_13_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_13_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_13_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_16_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_16_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_16_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_16_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_16_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_16_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_16_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_17_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_17_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_17_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_17_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_17_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_17_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_17_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_18_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_18_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_18_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_18_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_18_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_18_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_18_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_21_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_21_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_21_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_21_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_21_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_21_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_21_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_22_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_22_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_22_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_22_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_22_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_22_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_22_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_23_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_23_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_23_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_23_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_23_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_23_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_23_cell_7"].'</td>'; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_26_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_26_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_26_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_26_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_26_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_26_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_26_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_27_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_27_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_27_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_27_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_27_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_27_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_27_cell_7"].'</td>'; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo '<td>'.$row["row_28_cell_1"].'</td>'; } 
                if($row["total_rows"] > 1){ echo '<td>'.$row["row_28_cell_2"].'</td>'; } 
                if($row["total_rows"] > 2){ echo '<td>'.$row["row_28_cell_3"].'</td>'; } 
                if($row["total_rows"] > 3){ echo '<td>'.$row["row_28_cell_4"].'</td>'; } 
                if($row["total_rows"] > 4){ echo '<td>'.$row["row_28_cell_5"].'</td>'; } 
                if($row["total_rows"] > 5){ echo '<td>'.$row["row_28_cell_6"].'</td>'; } 
                if($row["total_rows"] > 6){ echo '<td>'.$row["row_28_cell_7"].'</td>'; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Load_TimeTable_Class5_PopUpModel_Function()
    {
        try
        {
            echo'<table id="class5_tblSample" style="text-align:center; width:100%; font-size:18px;" border="1">
            <TR style="background-color:#1ab7ea"><td style="width:120px" ROWSPAN="4"> Monday </td></TR>
            <TR style="background-color:#afd9ee">
            <td style="width:170px">Timing</td>';

            $sql = "SELECT * FROM time_table_class_table WHERE time_table_class_id=5";
            $result=  $this->conn->query($sql);
            if ($row = mysqli_fetch_assoc($result)) { 
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_1' value='".$row["row_1_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_2' value='".$row["row_1_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_3' value='".$row["row_1_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_4' value='".$row["row_1_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_5' value='".$row["row_1_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_6' value='".$row["row_1_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_1_cell_7' value='".$row["row_1_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_1' value='".$row["row_2_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_2' value='".$row["row_2_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_3' value='".$row["row_2_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_4' value='".$row["row_2_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_5' value='".$row["row_2_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_6' value='".$row["row_2_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_2_cell_7' value='".$row["row_2_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_1' value='".$row["row_3_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_2' value='".$row["row_3_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_3' value='".$row["row_3_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_4' value='".$row["row_3_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_5' value='".$row["row_3_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_6' value='".$row["row_3_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_3_cell_7' value='".$row["row_3_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#E09E96"><td ROWSPAN="4"> Tuesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_1' value='".$row["row_6_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_2' value='".$row["row_6_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_3' value='".$row["row_6_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_4' value='".$row["row_6_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_5' value='".$row["row_6_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_6' value='".$row["row_6_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_6_cell_7' value='".$row["row_6_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_1' value='".$row["row_7_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_2' value='".$row["row_7_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_3' value='".$row["row_7_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_4' value='".$row["row_7_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_5' value='".$row["row_7_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_6' value='".$row["row_7_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_7_cell_7' value='".$row["row_7_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_1' value='".$row["row_8_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_2' value='".$row["row_8_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_3' value='".$row["row_8_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_4' value='".$row["row_8_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_5' value='".$row["row_8_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_6' value='".$row["row_8_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_8_cell_7' value='".$row["row_8_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBEA5"><td ROWSPAN="4"> Wednesday </td></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_1' value='".$row["row_11_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_2' value='".$row["row_11_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_3' value='".$row["row_11_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_4' value='".$row["row_11_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_5' value='".$row["row_11_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_6' value='".$row["row_11_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_11_cell_7' value='".$row["row_11_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_1' value='".$row["row_12_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_2' value='".$row["row_12_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_3' value='".$row["row_12_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_4' value='".$row["row_12_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_5' value='".$row["row_12_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_6' value='".$row["row_12_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_12_cell_7' value='".$row["row_12_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_1' value='".$row["row_13_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_2' value='".$row["row_13_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_3' value='".$row["row_13_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_4' value='".$row["row_13_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_5' value='".$row["row_13_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_6' value='".$row["row_13_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_13_cell_7' value='".$row["row_13_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#CEBBCD"><TD ROWSPAN="4"> Thursday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_1' value='".$row["row_16_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_2' value='".$row["row_16_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_3' value='".$row["row_16_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_4' value='".$row["row_16_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_5' value='".$row["row_16_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_6' value='".$row["row_16_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_16_cell_7' value='".$row["row_16_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_1' value='".$row["row_17_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_2' value='".$row["row_17_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_3' value='".$row["row_17_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_4' value='".$row["row_17_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_5' value='".$row["row_17_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_6' value='".$row["row_17_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_17_cell_7' value='".$row["row_17_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_1' value='".$row["row_18_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_2' value='".$row["row_18_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_3' value='".$row["row_18_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_4' value='".$row["row_18_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_5' value='".$row["row_18_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_6' value='".$row["row_18_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_18_cell_7' value='".$row["row_18_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#8BBC67"><TD ROWSPAN="4"> Friday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_1' value='".$row["row_21_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_2' value='".$row["row_21_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_3' value='".$row["row_21_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_4' value='".$row["row_21_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_5' value='".$row["row_21_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_6' value='".$row["row_21_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_21_cell_7' value='".$row["row_21_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_1' value='".$row["row_22_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_2' value='".$row["row_22_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_3' value='".$row["row_22_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_4' value='".$row["row_22_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_5' value='".$row["row_22_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_6' value='".$row["row_22_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_22_cell_7' value='".$row["row_22_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_1' value='".$row["row_23_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_2' value='".$row["row_23_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_3' value='".$row["row_23_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_4' value='".$row["row_23_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_5' value='".$row["row_23_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_6' value='".$row["row_23_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_23_cell_7' value='".$row["row_23_cell_7"]."'></td>"; } 
                echo'</TR>
                <TR style="height:20px;"></TR> <!-- Empty Row -->
                <TR style="background-color:#F59942"><TD ROWSPAN="4"> Saturday </TD></TR>
                <TR style="background-color:#afd9ee"><td>Timing</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_1' value='".$row["row_26_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_2' value='".$row["row_26_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_3' value='".$row["row_26_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_4' value='".$row["row_26_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_5' value='".$row["row_26_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_6' value='".$row["row_26_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_26_cell_7' value='".$row["row_26_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#DAE2EA"><td>Subject</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_1' value='".$row["row_27_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_2' value='".$row["row_27_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_3' value='".$row["row_27_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_4' value='".$row["row_27_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_5' value='".$row["row_27_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_6' value='".$row["row_27_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_27_cell_7' value='".$row["row_27_cell_7"]."'></td>"; } 
                echo'</TR><TR style="background-color:#FEE188"><td>Teacher</td>';
                if($row["total_rows"] > 0){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_1' value='".$row["row_28_cell_1"]."'></td>"; } 
                if($row["total_rows"] > 1){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_2' value='".$row["row_28_cell_2"]."'></td>"; } 
                if($row["total_rows"] > 2){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_3' value='".$row["row_28_cell_3"]."'></td>"; } 
                if($row["total_rows"] > 3){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_4' value='".$row["row_28_cell_4"]."'></td>"; } 
                if($row["total_rows"] > 4){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_5' value='".$row["row_28_cell_5"]."'></td>"; } 
                if($row["total_rows"] > 5){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_6' value='".$row["row_28_cell_6"]."'></td>"; } 
                if($row["total_rows"] > 6){ echo "<td> <input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='class5_row_28_cell_7' value='".$row["row_28_cell_7"]."'></td>"; } 
                echo'</TR>
                </table>';
            }
        } catch (Exception $e) { echo "Error: " . $e->getMessage(); }
    }
    
    function Update_Class5_TimeTable_Tunction($total_rows,
        $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
        $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
        $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
        $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
        $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
        $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,
            
        $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
        $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
        $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
        $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
        $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
        $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,
            
        $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
        $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
        $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
        $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
        $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
        $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,
            
        $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
        $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
        $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
        $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
        $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
        $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,
            
        $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
        $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
        $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
        $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
        $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
        $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,
            
        $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
        $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
        $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
        $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
        $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
        $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,
            
        $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
        $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
        $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
        $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
        $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
        $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
    ){
        try
        {
            $sql = "UPDATE time_table_class_table 
                SET total_rows=?,
                row_1_cell_1=?, row_2_cell_1=?, row_3_cell_1=?, 
                row_6_cell_1=?, row_7_cell_1=?, row_8_cell_1=?,
                row_11_cell_1=?, row_12_cell_1=?, row_13_cell_1=?,
                row_16_cell_1=?, row_17_cell_1=?, row_18_cell_1=?,
                row_21_cell_1=?, row_22_cell_1=?, row_23_cell_1=?,
                row_26_cell_1=?, row_27_cell_1=?, row_28_cell_1=?,

                row_1_cell_2=?, row_2_cell_2=?, row_3_cell_2=?, 
                row_6_cell_2=?, row_7_cell_2=?, row_8_cell_2=?,
                row_11_cell_2=?, row_12_cell_2=?, row_13_cell_2=?,
                row_16_cell_2=?, row_17_cell_2=?, row_18_cell_2=?,
                row_21_cell_2=?, row_22_cell_2=?, row_23_cell_2=?,
                row_26_cell_2=?, row_27_cell_2=?, row_28_cell_2=?,

                row_1_cell_3=?, row_2_cell_3=?, row_3_cell_3=?, 
                row_6_cell_3=?, row_7_cell_3=?, row_8_cell_3=?,
                row_11_cell_3=?, row_12_cell_3=?, row_13_cell_3=?,
                row_16_cell_3=?, row_17_cell_3=?, row_18_cell_3=?,
                row_21_cell_3=?, row_22_cell_3=?, row_23_cell_3=?,
                row_26_cell_3=?, row_27_cell_3=?, row_28_cell_3=?,

                row_1_cell_4=?, row_2_cell_4=?, row_3_cell_4=?, 
                row_6_cell_4=?, row_7_cell_4=?, row_8_cell_4=?,
                row_11_cell_4=?, row_12_cell_4=?, row_13_cell_4=?,
                row_16_cell_4=?, row_17_cell_4=?, row_18_cell_4=?,
                row_21_cell_4=?, row_22_cell_4=?, row_23_cell_4=?,
                row_26_cell_4=?, row_27_cell_4=?, row_28_cell_4=?,

                row_1_cell_5=?, row_2_cell_5=?, row_3_cell_5=?, 
                row_6_cell_5=?, row_7_cell_5=?, row_8_cell_5=?,
                row_11_cell_5=?, row_12_cell_5=?, row_13_cell_5=?,
                row_16_cell_5=?, row_17_cell_5=?, row_18_cell_5=?,
                row_21_cell_5=?, row_22_cell_5=?, row_23_cell_5=?,
                row_26_cell_5=?, row_27_cell_5=?, row_28_cell_5=?,

                row_1_cell_6=?, row_2_cell_6=?, row_3_cell_6=?, 
                row_6_cell_6=?, row_7_cell_6=?, row_8_cell_6=?,
                row_11_cell_6=?, row_12_cell_6=?, row_13_cell_6=?,
                row_16_cell_6=?, row_17_cell_6=?, row_18_cell_6=?,
                row_21_cell_6=?, row_22_cell_6=?, row_23_cell_6=?,
                row_26_cell_6=?, row_27_cell_6=?, row_28_cell_6=?,

                row_1_cell_7=?, row_2_cell_7=?, row_3_cell_7=?, 
                row_6_cell_7=?, row_7_cell_7=?, row_8_cell_7=?,
                row_11_cell_7=?, row_12_cell_7=?, row_13_cell_7=?,
                row_16_cell_7=?, row_17_cell_7=?, row_18_cell_7=?,
                row_21_cell_7=?, row_22_cell_7=?, row_23_cell_7=?,
                row_26_cell_7=?, row_27_cell_7=?, row_28_cell_7=?
                WHERE time_table_class_id='5'";
            $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
            mysqli_stmt_bind_param($stmt,"sssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss"
                    . "ssssssssssssssssss", $total_rows,
                $row_1_cell_1, $row_2_cell_1, $row_3_cell_1, 
                $row_6_cell_1, $row_7_cell_1, $row_8_cell_1,
                $row_11_cell_1, $row_12_cell_1, $row_13_cell_1,
                $row_16_cell_1, $row_17_cell_1, $row_18_cell_1,
                $row_21_cell_1, $row_22_cell_1, $row_23_cell_1,
                $row_26_cell_1, $row_27_cell_1, $row_28_cell_1,

                $row_1_cell_2, $row_2_cell_2, $row_3_cell_2, 
                $row_6_cell_2, $row_7_cell_2, $row_8_cell_2,
                $row_11_cell_2, $row_12_cell_2, $row_13_cell_2,
                $row_16_cell_2, $row_17_cell_2, $row_18_cell_2,
                $row_21_cell_2, $row_22_cell_2, $row_23_cell_2,
                $row_26_cell_2, $row_27_cell_2, $row_28_cell_2,

                $row_1_cell_3, $row_2_cell_3, $row_3_cell_3, 
                $row_6_cell_3, $row_7_cell_3, $row_8_cell_3,
                $row_11_cell_3, $row_12_cell_3, $row_13_cell_3,
                $row_16_cell_3, $row_17_cell_3, $row_18_cell_3,
                $row_21_cell_3, $row_22_cell_3, $row_23_cell_3,
                $row_26_cell_3, $row_27_cell_3, $row_28_cell_3,

                $row_1_cell_4, $row_2_cell_4, $row_3_cell_4, 
                $row_6_cell_4, $row_7_cell_4, $row_8_cell_4,
                $row_11_cell_4, $row_12_cell_4, $row_13_cell_4,
                $row_16_cell_4, $row_17_cell_4, $row_18_cell_4,
                $row_21_cell_4, $row_22_cell_4, $row_23_cell_4,
                $row_26_cell_4, $row_27_cell_4, $row_28_cell_4,

                $row_1_cell_5, $row_2_cell_5, $row_3_cell_5, 
                $row_6_cell_5, $row_7_cell_5, $row_8_cell_5,
                $row_11_cell_5, $row_12_cell_5, $row_13_cell_5,
                $row_16_cell_5, $row_17_cell_5, $row_18_cell_5,
                $row_21_cell_5, $row_22_cell_5, $row_23_cell_5,
                $row_26_cell_5, $row_27_cell_5, $row_28_cell_5,

                $row_1_cell_6, $row_2_cell_6, $row_3_cell_6, 
                $row_6_cell_6, $row_7_cell_6, $row_8_cell_6,
                $row_11_cell_6, $row_12_cell_6, $row_13_cell_6,
                $row_16_cell_6, $row_17_cell_6, $row_18_cell_6,
                $row_21_cell_6, $row_22_cell_6, $row_23_cell_6,
                $row_26_cell_6, $row_27_cell_6, $row_28_cell_6,

                $row_1_cell_7, $row_2_cell_7, $row_3_cell_7, 
                $row_6_cell_7, $row_7_cell_7, $row_8_cell_7,
                $row_11_cell_7, $row_12_cell_7, $row_13_cell_7,
                $row_16_cell_7, $row_17_cell_7, $row_18_cell_7,
                $row_21_cell_7, $row_22_cell_7, $row_23_cell_7,
                $row_26_cell_7, $row_27_cell_7, $row_28_cell_7
            );
            mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
            echo 'Successfully Update...';
        }
        catch (Exception $e) { echo "Error: ".$e->getMessage(); }
    }
}
