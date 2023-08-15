<?php
class EmployeeDatabase
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
// Get Database Connection - Constructure
function __construct()
{
$this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
if($this->conn->connect_error)
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function LoadEmployeeTable()
{
$sql = "SELECT * FROM employee";
$result=  $this->conn->query($sql);
$output="";
while($row = mysqli_fetch_array($result))
{
$output.= "<tr>";
$output.= "<td>" . $row["id"]. "</td>";
$output.= "<td>" . $row["username"]. "</td>";
$output.= "<td>" . $row["userType"]. "</td>";
$output.= "<td>" . $row["password"]. "</td>";
$output.= "<td>" . $row["status"]. "</td>"   ;             
$output.= "<td> <button class='btn btn-primary updateButton' id='".$row["id"]."'> <i class='fa fa-pencil-square-o'></i> Update </button> </td>";
if($row["status"]=="Open")
{
$output.= "<td> <button class='btn btn-danger StatusButton' id='".$row["id"]."+"."Close"."'>  Close </button> </td>";
}
else
{
$output.= "<td> <button class='btn btn-primary StatusButton' id='".$row["id"]."+"."Open"."'>  Open </button> </td>";
}
$output.= "</tr>";     
}
return $output;
}
function LoadEmployeeOption()
{
$sql = 'SELECT * FROM employee WHERE employee.status="Open"';
$result=  $this->conn->query($sql);
$output= '<option value="">Select Employee </option>';
while($row = mysqli_fetch_array($result))
{
$output.= '<option value="'.$row["id"].'">'.$row["username"].'</option>';
}
return $output;
}
function insertFunction($username, $userType, $password,$status) 
{
try 
{
$stmt = $this->conn->prepare("INSERT INTO employee (username, userType, password,status) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$username, $userType, $password,$status);
$stmt->execute();
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}
function modifyFunction($updateId)
{
$sql = "SELECT * FROM employee WHERE id='+$updateId+'";
$result=  $this->conn->query($sql);
$response = array();
while ($row = mysqli_fetch_assoc($result)) {
$response = $row;
}
echo json_encode($response);
}
function updateFunction($id, $username, $userType, $password) 
{
try
{
$sql = "UPDATE `employee` SET username=?, userType=? ,password=? WHERE id='".$id."'" ;
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
mysqli_stmt_bind_param($stmt,"sss",$username,$userType,$password);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
}
catch (Exception $e) { echo "Error: " . $e->getMessage(); }       
}
function UpdateStatusFunction($id,$status) 
{
try
{
$sql = "UPDATE `employee` SET status=? WHERE id='".$id."'" ;
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
mysqli_stmt_bind_param($stmt,"s",$status);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
}
catch (Exception $e) { echo "Error: " . $e->getMessage(); }
}
}

        