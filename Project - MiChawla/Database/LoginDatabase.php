<?php
session_start();
class LoginDatabase 
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
function __construct()
{
$this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
if($this->conn->connect_error)
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function LogIn($userId, $password) 
{
$sql = "SELECT * FROM employee WHERE id = '$userId' AND password = '$password' AND status='Open'";
$result=  $this->conn->query($sql);
if($row = mysqli_fetch_array($result))
{ 
echo $row["userType"]; 
if (!isset($_SESSION['userType'])) 
{ $_SESSION['userType'] = $row["userType"]; $_SESSION['username'] = $row["username"];
$_SESSION['userid'] = $row["id"];
}    
}    
}
function Androidlogin($userId, $password)
{
$res = array(); 
$sql = "SELECT * FROM employee WHERE id = '$userId' AND password = '$password'";
$result=  $this->conn->query($sql);
if($row = mysqli_fetch_array($result)){ array_push($res, array("username"=>$row['username'],"status"=>$row['status'])); }
else { array_push($res, array("username"=>$row="LoginOff")); }
echo json_encode($res);
}
}
