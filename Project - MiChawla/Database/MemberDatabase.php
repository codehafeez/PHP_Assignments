<?php
class MemberDatabase
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
function __construct()
{
$this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
if ($this->conn->connect_error) 
{
die("Connection failed: " . $this->conn->connect_error);    
}
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
function GetLotteryMember($memberid)
{
try 
{
$sql = "SELECT lotterymember.id, lotterymember.memberid AS memberid,lotterymember.lotteryid,clients.id,clients.name,clients.fathername,lottery.id,lottery.loteryName FROM `lotterymember`INNER JOIN clients ON clients.id=lotterymember.memberid INNER JOIN lottery ON lottery.id=lotterymember.memberid WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$memberid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="Memberstablebody">';
while($row = mysqli_fetch_array($rslt))
{
$output.='<td>'.$row['memberid'].'</td>';
$output.='<td>'.$row['name'].'</td>';
$output.='<td>'.$row['fathername'].'</td>';
$output.= '<td>'.'<button type="button" class="btn btn-success approve editclient"  id="'.$row['id'].'"><span class="fa fa-edit"></span></button>'.'</td>';
$output.='<td>'.'<button type="button" class="btn btn-danger disapprove deletedriversdata" id="'.$row['id'].'"><span class="fa fa-trash-o"></span></button>'.'</td>'; 
$output.= '</tr>';
}
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetLotteryMemberForRecovery($memberid)
{
try 
{
$sql = "SELECT lotterymember.id, lotterymember.memberid AS memberid,lotterymember.lotteryid,clients.id,clients.name,clients.fathername FROM `lotterymember`INNER JOIN clients ON clients.id=lotterymember.memberid  WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$memberid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output= '';
while($row = mysqli_fetch_array($rslt))
{
$output.='<div class="radio"><label>';
$output.='<input type="radio" class="memberid" name="optionsRadios" id="'.$row['memberid'].'">';
$output.=$row['name'].' S/O '.$row['fathername'];
$output.='</label></div>';
}
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetLotteryMemberOption($lotteryid)
{
$sql="SELECT lotterymember.memberid,clients.name,clients.fathername FROM lotterymember INNER JOIN clients ON clients.id=lotterymember.memberid WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output= '<option value="">Select The Member</option>';
while($row = mysqli_fetch_array($rslt))
{
$output.='<option value="'.$row['memberid'].'">'.$row['name'].' S/O '.$row['fathername'].'</option>';    
}
return $output;
}

function AndroidGetCustomerByLottery($lotteryID)
{
$sql="SELECT lotterymember.memberid,lotterymember.type,lotterymember.lotteryid ,clients.id,clients.name,clients.fathername,clients.contactnumber FROM `lotterymember` INNER JOIN clients ON clients.id=lotterymember.memberid WHERE lotterymember.lotteryid=?";   
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryID);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
$res = array(); 
while($row = mysqli_fetch_array($rslt))
{
array_push($res, array("id"=>$row['id'],"name"=>$row['name'],"fathername"=>$row['fathername'],"contactnumber"=>$row['contactnumber']));
}
return json_encode($res);
}


}
