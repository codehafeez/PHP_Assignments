<?php
include_once './BalanceDatabase.php';
class OutFlowDatabase
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
public $balance;
function __construct()
{
$this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
$this->balance= new BalanceDatabase();
if ($this->conn->connect_error) 
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function SelectMember($memberid)
{
try 
{
$sql = "SELECT lotterymember.memberid,lotterymember.lotteryid, clients.id AS clientID,clients.name,clients.fathername,lottery.id,lottery.loteryName FROM `lotterymember` INNER JOIN lottery on lottery.id=lotterymember.lotteryid INNER JOIN clients ON lotterymember.memberid=clients.id WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$memberid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output="";
while($row = mysqli_fetch_array($rslt))
{
$output.='<div class="radio"><label>';
$output.='<input type="radio" class="clientid" name="optionsRadios" id="'.$row['clientID'].'" value="option1">';
$output.=$row['name'].' S/O '.$row['fathername'];
$output.='</label></div>';
}
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
return $output;
}
function InsertOutFlow($lotteryid,$walkid,$memberid,$amount,$date,$type,$bankname,$checknumber)
{
try 
{
$sql = "INSERT INTO `walkpaymnet`(`lotteryid`, `walkid`, `memberid`, `amount`, `date`, `type`, `bankname`, `checknumber`) VALUES (?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"iiidsssi",$lotteryid,$walkid,$memberid,$amount,$date,$type,$bankname,$checknumber);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$this->balance->SubtractBalance($amount);
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}

function GetOutFlow($date)
{
$total=0;   
try 
{
$sql = 'SELECT walkpaymnet.id AS walkpaymentid,walkpaymnet.lotteryid,walkpaymnet.walkid,walkpaymnet.memberid,walkpaymnet.amount,walkpaymnet.type,walkpaymnet.date,walkpaymnet.bankname,walkpaymnet.checknumber,lottery.loteryName,clients.name,clients.fathername FROM walkpaymnet INNER JOIN lottery ON lottery.id=walkpaymnet.lotteryid INNER JOIN clients ON clients.id=walkpaymnet.memberid WHERE walkpaymnet.date LIKE "%'.$date.'"';
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '';
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.$row['date'].'</td>';
$output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
$output.='<td>'.$row['loteryName'].'</td>';
$total+=$row['amount'];
$output.='<td>'.number_format($row['amount'],2).'</td>';
$output.='<td>'.$this->GetWakeNumberByWalkid($row['lotteryid'],$row['walkid']).'</td>';
$output.='<td>'.$row['type'].'</td>';
if($row['bankname']!=="0" &&$row['checknumber']!==0)
{
$output.='<td>'."Bank Name <b>".$row['bankname']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
}
else
{
$output.='<td>'.''.'</td>';
}
$output.='<td> <button class="btn btn-danger  deletebutton" id="'.$row["walkpaymentid"].'"> <i class="fa fa-trash-o"></i></button> </td>';
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$nettotal=$this->balance->GetBalance();
$output.='*'.number_format($nettotal,2);
return $output;
}

catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetOutFlow2($date,$lotteryid)
{
$total=0;   
try 
{
$sql = 'SELECT walkpaymnet.id AS walkpaymentid,walkpaymnet.lotteryid,walkpaymnet.walkid,walkpaymnet.memberid,walkpaymnet.amount,walkpaymnet.type,walkpaymnet.date,walkpaymnet.bankname,walkpaymnet.checknumber,lottery.loteryName,clients.name,clients.fathername FROM walkpaymnet INNER JOIN lottery ON lottery.id=walkpaymnet.lotteryid INNER JOIN clients ON clients.id=walkpaymnet.memberid WHERE walkpaymnet.lotteryid=? AND walkpaymnet.date LIKE "%'.$date.'"';
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '';
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.$row['date'].'</td>';
$output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
$output.='<td>'.$row['loteryName'].'</td>';
$total+=$row['amount'];
$output.='<td>'.number_format($row['amount'],2).'</td>';
$output.='<td>'.$this->GetWakeNumberByWalkid($row['lotteryid'],$row['walkid']).'</td>';
$output.='<td>'.$row['type'].'</td>';
if($row['bankname']!=="0" &&$row['checknumber']!==0)
{
$output.='<td>'."Bank Name <b>".$row['bankname']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
}
else
{
$output.='<td>'.''.'</td>';
}
$output.='<td> <button class="btn btn-danger  deletebutton" id="'.$row["walkpaymentid"].'"> <i class="fa fa-trash-o"></i></button> </td>';
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$nettotal=$this->balance->GetBalance();
$output.='*'.number_format($nettotal,2);
return $output;
}

catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetLotteryWakeNumber($LotteryID)
{
try 
{
$sql = "SELECT lotterywake.id FROM `lotterywake` WHERE lotterywake.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$LotteryID);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output= '';
$count=0;
while($row = mysqli_fetch_array($rslt))
{
$output.='<div class="radio"><label>';
$output.='<input type="radio" class="walkid" name="walkid" id="'.$row['id'].'">';
++$count;
$output.="Walk Number:".$count;
$output.='</label></div>';
}
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetWakeNumberByWalkid($LotteryID,$walkid)
{
try 
{
$sql = "SELECT lotterywake.id FROM `lotterywake` WHERE lotterywake.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$LotteryID);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output= '';
$count=0;
while($row = mysqli_fetch_array($rslt))
{
if($row['id']==$walkid)
{
++$count;
break;    
} 
else
{   
++$count;
}
}
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
return $count;
}
function DeleteEntry($deleteId)
{   
$this->GetEntryAmount($deleteId);
$sql = "DELETE FROM `walkpaymnet` WHERE id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "i",$deleteId);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
echo $rslt;
}
function GetEntryAmount($id)
{   
$sql = "SELECT * FROM `walkpaymnet` WHERE id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
while($row = mysqli_fetch_array($rslt))
{
$this->balance->AddBalance($row['amount']);
}
}
}

