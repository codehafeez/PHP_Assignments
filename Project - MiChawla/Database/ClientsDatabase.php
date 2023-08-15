<?php
class ClientsDatabase
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
private $lottery;
function __construct()
{
$this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
if ($this->conn->connect_error) 
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function AddClients($name,$fathername,$contactnumber,$lotteryid,$type){
try 
{
$sql = "INSERT INTO `clients`(`name`,`fathername`,`contactnumber`) VALUES (?,?,?)";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"sss",$name,$fathername,$contactnumber);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$memberid = mysqli_insert_id($this->conn);
$this->AddMember($memberid,$lotteryid,$type);
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function SearchClients($name)
{
try 
{
$sql = 'SELECT * FROM clients WHERE name LIKE "%'.$name.'%"';
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output='<ul class="list-group">';
while($row = mysqli_fetch_array($rslt))
{
$output.='<li class="list-group-item getname" id="'.$row['id'].'-'.$row['name'].' S/O '.$row['fathername'].'">'.$row['name'].' S/O '.$row['fathername'].'</li>';   
}
$output.='</ul>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetCustomerByLottery($lotteryID)
{
$sql="SELECT lotterymember.memberid,lotterymember.type,lotterymember.lotteryid ,clients.id,clients.name,clients.fathername,clients.contactnumber FROM `lotterymember` INNER JOIN clients ON clients.id=lotterymember.memberid WHERE lotterymember.lotteryid=?";   
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryID);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
$count=0;
$output= '<tbody id="clientstablebody">';
while($row = mysqli_fetch_array($rslt))
{
$output.= '<tr id="'.$row['id'].'">'; 
$count++;
$output.= '<td>'.$count.'</td>';
$output.= '<td>'.$row['name'].'</td>';
$output.= '<td>'.$row['fathername'].'</td>';
$output.= '<td>'.$row['contactnumber'].'</td>';
$output.= '<td>'.$row['type'].'</td>';
$output.= '<td>'.'<button type="button" class="btn btn-success approve editclient"  id="'.$row['id'].'"><span class="fa fa-edit"></span></button>'.'</td>';
$output.= "<td> <button class='btn btn-danger  deleteButton' id='".$row["id"]."'> <i class='fa fa-trash-o'></i>  </button> </td>";
$output.= '</tr>';
}
$output.= '</tbody>';
return $output;
}
 function GetCustomer()
 {
 $query = "SELECT * FROM `clients`";
 $stmt = mysqli_prepare($this->conn, $query) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output= '<tbody id="clientstablebody">';
 while($row = mysqli_fetch_array($rslt))
 {
 $output.='<tr id="'.$row['id'].'">'; 
 $output.='<td>'.$row['id'].'</td>';
 $output.='<td>'.$row['name'].'</td>';
 $output.='<td>'.$row['fathername'].'</td>';
 $output.='<td>'.$row['contactnumber'].'</td>';
 $output.= '<td>'.'<button type="button" class="btn btn-success approve editclient"  id="'.$row['id'].'"><span class="fa fa-edit"></span></button>'.'</td>';
 $output.="<td> <button class='btn btn-danger  deleteButton' id='".$row["id"]."'> <i class='fa fa-trash-o'></i>  </button> </td>";
 $output.= '</tr>';
 }
 $output.= '</tbody>';
 return $output;
 }
 function GetClientInfo($id)
 {   
 $sql = "SELECT * FROM clients WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",  $id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = array();
 while($row = mysqli_fetch_array($rslt))
 {
 $output['id'] =$row['id'];
 $output['name']=$row['name'];
 $output['fathername']=$row['fathername'];
 $output['contactnumber']=$row['contactnumber'];
 $output['type']=$this->GetClientLotteryType($id);
 }
 return json_encode($output);
 }
 function GetClientLotteryType($id)
 {   
 $sql = "SELECT * FROM lotterymember WHERE memberid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",  $id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = "";
 while($row = mysqli_fetch_array($rslt))
 {
 $output=$row['type'];
 }
 return $output;
 }
 
 function UpdateClientInfo($name,$fathername,$contactnumber,$type,$id)
 {   
 $sql = "UPDATE `clients` SET `name`=?, `fathername`=? ,`contactnumber`=? WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "sssi",  $name,$fathername,$contactnumber,$id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $this->UpdateLotteryClientType($type,$id);
 }
 function UpdateLotteryClientType($type,$id)
 {   
 $sql = "UPDATE `lotterymember` SET `type`=? WHERE memberid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "si",$type,$id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function DeleteClient($deleteId)
 {   
 $this->DeleteLotteryMember($deleteId);
 $sql = "DELETE FROM `clients` WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$deleteId);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function DeleteLotteryMember($deleteId)
 {   
 $sql = "DELETE FROM `lotterymember` WHERE memberid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$deleteId);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 } 
 function AddMember($memberid,$lotteryid,$type)
 {
 try 
 {
 $sql = "INSERT INTO `lotterymember`(`memberid`,`lotteryid`,`type`) VALUES (?,?,?)";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"iis",$memberid,$lotteryid,$type);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 }
 catch(PDOException $e)
 {
 echo "Error: " . $e->getMessage();
 }
 }
 }
