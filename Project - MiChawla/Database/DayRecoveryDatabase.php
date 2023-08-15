<?php
class DayRecoveryDatabase
{
public $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
private $NetTotal = 0;
// Get Database Connection - Constructure
function __construct()
{
$this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
if($this->conn->connect_error)
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function GetDateRecovery($date,$id)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND lottery.id=? ";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output="";
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
$output.='<td>'.$row['loteryName'].'</td>';
$output.='<td>'.number_format($row['amount'],2).'</td>';
$total+=$row['amount'];
$output.='<td>'.$row['paymenttype'].'</td>';
if($row['bankcode']!=="0" &&$row['checknumber']!==0)
{
$output.='<td>'."Bank Name <b>".$row['bankcode']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
}
else
{
$output.='<td>'.''.'</td>';
}
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=4>'.'<p class="pull-right"><b>'.'Total Recovery:-'.'</b></p></td>';
$output.='<td >'.'<b>'.number_format($total,2).'</b></td>';
$output.= '</tr>';
$this->NetTotal+=$total;
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function LoadDateRecoveryLoteryTable($date)
{
$this->NetTotal=0;
$sql = "SELECT * FROM lottery";
$result=  $this->conn->query($sql);
$output = '<tbody id="datewise">';
while($row = mysqli_fetch_array($result))
{
$output .='<tr>';    
$output .= "<td colspan=5><h3>" .$row["id"].'-'.$row["loteryName"]. "</h3></td>";
$output .='</tr>';
$output .= $this->GetDateRecovery($date,$row["id"]);   
}
$output.= '<tr>';
$output.='<td colspan=4>'.'<p class="pull-right"><b>'.'Net Total:-'.'</b></p></td>';
$output.='<td>'.'<b>'.number_format($this->NetTotal,2).'</b></td>';
$output.= '</tr>';
$output .= '</tbody>';  
return $output;
}
function LoadEmployeeDateRecoveryLoteryTable($date,$employeeid)
{
$this->NetTotal=0;
$sql = "SELECT * FROM lottery";
$result=  $this->conn->query($sql);
$output = '<tbody id="datewise">';
while($row = mysqli_fetch_array($result))
{
$output .='<tr>';    
$output .= "<td colspan=5><h3>" .$row["id"].'-'.$row["loteryName"]. "</h3></td>";
$output .='</tr>';
$output .= $this->GeEmployeetDateRecovery($date,$row["id"],$employeeid);   
}
$output.= '<tr>';
$output.='<td colspan=4>'.'<p class="pull-right"><b>'.'Net Total:-'.'</b></p></td>';
$output.='<td>'.'<b>'.$this->NetTotal.'</b></td>';
$output.= '</tr>';
$output .= '</tbody>';  
return $output;
}
function GeEmployeetDateRecovery($date,$id,$employeeid)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND lottery.id=? AND employee.id=? ";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"sii",$date,$id,$employeeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output="";
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
$output.='<td>'.$row['loteryName'].'</td>';
$output.='<td>'.$row['amount'].'</td>';
$total+=$row['amount'];
$output.='<td>'.$row['paymenttype'].'</td>';
if($row['bankcode']!=="0" &&$row['checknumber']!==0)
{
$output.='<td>'."Bank Name <b>".$row['bankcode']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
}
else
{
$output.='<td>'.''.'</td>';
}
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=4>'.'<p class="pull-right"><b>'.'Total Recovery:-'.'</b></p></td>';
$output.='<td >'.'<b>'.$total.'</b></td>';
$output.= '</tr>';
$this->NetTotal+=$total;
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
public $cashtotal=0;
public $OutFlowtotal=0;
function GetMonthsEntryDates($date)
{
try 
{
$sql = "SELECT DISTINCT(date) FROM dailyentery WHERE date LIKE '%$date' ";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output='';
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.'Inflow'.'</td>';
$output.='<td >'.$row['date'].'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='</tr>';    
$output.=$this->GetDateTotal("Cash",$row['date']);
$output.=$this->GetDateTotal("Bank",$row['date']);
$output.='<tr>';
$output.='<td>'.''.'</td>';
$output.='<td >'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format($this->cashtotal,2).'</td>';
$output.='</tr>';
$output.='<tr>';
$output.='<td>'.'OutFlow'.'</td>';
$output.='<td >'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='</tr>';    
$output.= $this->GetDateOutFlowTotal("Cash",$row['date']);
$output.= $this->GetDateOutFlowTotal("Bank",$row['date']);
$output.='<tr>';
$output.='<td>'.''.'</td>';
$output.='<td >'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format($this->OutFlowtotal,2).'</td>';
$output.='</tr>';
$output.='<tr>';
$output.='<td>'.'Balance'.'</td>';
$output.='<td >'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='</tr>';
$output.='<tr>';
$output.='<td>'.''.'</td>';
$output.='<td >'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format(($this->cashtotal-$this->OutFlowtotal),2).'</td>';
$output.='</tr>';
$this->cashtotal=0;
$this->OutFlowtotal=0;
}
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
return $output;
}
function GetDateOutFlowTotal($type,$date)
{
try 
{
$sql = "SELECT SUM(amount) FROM `walkpaymnet` WHERE walkpaymnet.type=? AND walkpaymnet.date=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"ss",$type,$date);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output='';
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format($row['SUM(amount)'],2).'</td>';
$output.='<td>'.$type.'</td>';
$output.='<td>'.''.'</td>';
$output.= '</tr>';
$this->OutFlowtotal+=$row['SUM(amount)'];
}
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetDateTotal($type,$date)
{
try 
{
$sql = "SELECT SUM(amount) FROM dailyentery WHERE dailyentery.paymenttype=? AND date=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"ss",$type,$date);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output="";
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format($row['SUM(amount)'],2).'</td>';
$output.='<td>'.$type.'</td>';
$output.='<td>'.''.'</td>';
$output.= '</tr>';
$this->cashtotal+=$row['SUM(amount)'];
}
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GeEmployeetDateRecoveryForAndroid($date,$employeeid)
{
  try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND employee.id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$employeeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$res = array(); 
$bankcode="";
$checknumber="";
while($row = mysqli_fetch_array($rslt))
{
if($row['bankcode']!=="0" &&$row['checknumber']!==0)
{
$bankcode=$row['bankcode'];
$checknumber=$row['checknumber'];
}
else
{
$bankcode="";
$checknumber="";
}

array_push($res, array("name"=>$row['name'],"fathername"=>$row['fathername'],"lotteryName"=>$row['loteryName'],"amount"=>$row['amount'],"paymenttype"=>$row['paymenttype'],"bankcode"=>$bankcode,"checknumber"=>$checknumber));
}
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
return json_encode($res);
}
}