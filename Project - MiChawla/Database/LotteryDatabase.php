<?php
class LotterDatabase
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
function LoadLoteryTable()
{
$sql = "SELECT * FROM lottery";
$result=  $this->conn->query($sql);
$output= '<tbody  id="LoadLoteryTableBodyId">';
while($row = mysqli_fetch_array($result))
{
$output.= "<tr>";
$output.= "<td>" . $row["id"]. "</td>";
$output.= "<td>" . $row["loteryName"]. "</td>";
$output.= "<td>" . number_format($row["amount"],2). "</td>";
$output.= "<td>" . $row["status"]. "</td>";
$date=date_create($row["startingDate"]);
$output.= "<td>" . date_format($date,"d-M-Y"). "</td>";
$date2=date_create($row["endingDate"]);
$output.= "<td>" .date_format($date2,"d-M-Y") . "</td>";
$output.= "<td> <button class='btn btn-primary ViewLotteryReport' id='".$row["id"].'-'.$row["loteryName"]."'> <i class='fa fa-pencil-square-o'></i> View </button> </td>";
$output.= "<td> <button class='btn btn-primary updateButton' id='".$row["id"]."'> <i class='fa fa-pencil-square-o'></i> Update </button> </td>";
if($row["status"]=="Open")
{       
$output.= "<td> <button class='btn btn-danger  closebtn' id='".$row["id"]."'>  Close </button> </td>";
}
else
{
$output.= "<td> <button class='btn btn-primary  openbtn' id='".$row["id"]."'>  Open </button> </td>";    
}
$output.="</tr>";     
}
$output.= '</tbody>';  
return $output;
}
function LoadLoteryOption()
{
$sql = 'SELECT * FROM lottery WHERE lottery.status="Open"';
$result=  $this->conn->query($sql);
$output= '<option value="">Select Lottery Option</option>';
while($row = mysqli_fetch_array($result))
{
$output.= '<option value="'.$row["id"].'">'.$row["loteryName"].'</option>';
}
return $output;
}
function insertFunction($loteryName, $amount, $startingDate, $endingDate) 
{
try 
{
$stmt = $this->conn->prepare("INSERT INTO lottery (loteryName, amount, startingDate, endingDate)VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$loteryName, $amount, $startingDate, $endingDate);
$stmt->execute();
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}
function modifyFunction($updateId)
{
$sql = "SELECT * FROM lottery WHERE id='+$updateId+'";
$result=  $this->conn->query($sql);
$response = array();
while ($row = mysqli_fetch_assoc($result)) 
{
$response = $row;
}
echo json_encode($response);
}
function updateFunction($id, $loteryName, $amount, $startingDate, $endingDate) 
{
try
{
$sql = "UPDATE lottery SET loteryName=? ,amount=?, startingDate=?, endingDate=?  WHERE id='".$id."'" ;
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
mysqli_stmt_bind_param($stmt,"ssss", $loteryName, $amount, $startingDate, $endingDate);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
}
catch (Exception $e) { echo "Error: " . $e->getMessage(); }
}
function ChangeStatus($id,$message) 
{
try
{
$sql = "UPDATE lottery SET status=? WHERE id=?" ;
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement");
mysqli_stmt_bind_param($stmt,"si", $message,$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
}
catch (Exception $e) { echo "Error: " . $e->getMessage(); }
}

function AndroidLoteryList()
{
$res = array(); 
$sql = 'SELECT * FROM lottery WHERE lottery.status="Open"';
$result=  $this->conn->query($sql);
while($row = mysqli_fetch_array($result))
{
array_push($res, array("id"=>$row['id'],"loteryName"=>$row['loteryName']));
}
echo json_encode($res);
}

}