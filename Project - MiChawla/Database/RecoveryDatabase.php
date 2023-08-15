<?php
include_once './BalanceDatabase.php';
class RecoveryDatabase
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
$sql = "SELECT lotterymember.memberid,lotterymember.lotteryid, clients.id AS clientID,clients.name,clients.fathername,lottery.id,lottery.loteryName FROM `lotterymember` INNER JOIN lottery on lottery.id=lotterymember.lotteryid INNER JOIN clients ON lotterymember.memberid=clients.id WHERE lotterymember.memberid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$memberid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output="";
while($row = mysqli_fetch_array($rslt))
{
$output.='<div class="radio"><label>';
$output.='<input type="radio" class="radiovalue" name="optionsRadios" id="'.$row['lotteryid'].'" value="option1">';
$output.=$row['lotteryid'].'-'.$row['loteryName'];
$output.='</label></div>';
}
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function InsertRecovery($lotteryid,$clientid,$amount,$employeeid,$paymenttype,$bankcode,$checknumber,$date)
{
try 
{
$sql = "INSERT INTO `dailyentery`(`lotteryid`, `clientid`, `amount`, `employeeid`, `paymenttype`, `bankcode`, `checknumber`, `date`) VALUES (?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"iidissis",$lotteryid,$clientid,$amount,$employeeid,$paymenttype,$bankcode,$checknumber,$date);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$this->balance->AddBalance($amount);
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function InsertRecoveryByAndroid($lotteryid,$clientid,$amount,$employeeid,$paymenttype,$bankcode,$checknumber,$date)
{
try 
{
$sql = "INSERT INTO `dailyentery`(`lotteryid`, `clientid`, `amount`, `employeeid`, `paymenttype`, `bankcode`, `checknumber`, `date`) VALUES ('$lotteryid','$clientid','$amount','$employeeid','$paymenttype','$bankcode','$checknumber','$date')";
if(mysqli_query($this->conn,$sql)){
echo 'success';
$this->balance->AddBalance($amount);
}
else
{
echo 'failure';
}
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetDateRecovery($date)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"s",$date);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
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
$output.='<td>'.$row['username'].'</td>';
$output.="<td> <button class='btn btn-danger  deletebutton' id='".$row["Dailyenteryid"]."'> <i class='fa fa-trash-o'></i></button> </td>";
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetLotteryDateWiseRecovery($date,$id)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND dailyentery.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
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
$output.='<td>'.$row['username'].'</td>';
$output.="<td> <button class='btn btn-danger  deletebutton' id='".$row["Dailyenteryid"]."'> <i class='fa fa-trash-o'></i></button> </td>";
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:-'.$total.'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetLotteryDateWiseRecovery2($date,$id)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND dailyentery.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
while($row = mysqli_fetch_array($rslt))
{
$output.='<tr>';
$output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
$output.='<td>'.$row['loteryName'].'</td>';
$output.='<td>'.number_format($row['amount'],2).'</td>';
$total+=$row['amount'];
$output.='<td>'.$row['paymenttype'].'</td>';

if($row['bankcode']!=="0" &&$row['checknumber']!==0){
$output.='<td>'."Bank Name <b>".$row['bankcode']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
}else{
$output.='<td>'.''.'</td>';
}
$output.='<td>'.$row['username'].'</td>';
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=6><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetDateEmployeeRecovery($date,$employeeid)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND employee.id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$employeeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
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
$output.='<td>'.$row['username'].'</td>';
$output.="<td> <button class='btn btn-danger  deletebutton' id='".$row["Dailyenteryid"]."'> <i class='fa fa-trash-o'></i></button> </td>";
$output.= '</tr>';
}
$output.= '<tr>';
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetDateEmployeeRecovery2($date,$employeeid)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND employee.id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"si",$date,$employeeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
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
$output.='<td colspan=8><center>'.'<p><b>'.'Total Recovery:- '.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function GetEmployeeLotteryDateWiseRecovery($date,$id,$employeeid)
{
$total=0;   
try 
{
$sql = "SELECT dailyentery.id AS Dailyenteryid, dailyentery.clientid,dailyentery.lotteryid,dailyentery.employeeid,dailyentery.amount,dailyentery.paymenttype,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,employee.id,employee.username,lottery.id,lottery.loteryName,clients.id,clients.name,clients.fathername FROM dailyentery INNER JOIN lottery ON lottery.id=dailyentery.lotteryid INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid WHERE date=? AND lottery.id=? AND employee.id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"sii",$date,$id,$employeeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="dailyenterytablebody">';
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
$output.='<td colspan=6><center>'.'<p><b>'.'Total Recovery:-'.number_format($total,2).'</p></b></center></td>';
$output.= '</tr>';
$output.= '</tbody>';
return $output;
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
}
function DeleteEntry($deleteId)
{   
$this->GetEntryAmount($deleteId);
$sql = "DELETE FROM `dailyentery` WHERE id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "i",$deleteId);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
}
function GetEntryAmount($id)
{   
$sql = "SELECT * FROM `dailyentery` WHERE id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "i",$id);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
while($row = mysqli_fetch_array($rslt))
{
$this->balance->SubtractBalance($row['amount']);
}
}
function LoadMemberRecovery($lottteryid,$clientid,$date)
{   
$sql = "SELECT lotterymember.type,dailyentery.lotteryid,dailyentery.clientid ,dailyentery.employeeid,dailyentery.paymenttype,dailyentery.amount,dailyentery.bankcode,dailyentery.checknumber,dailyentery.date,clients.id,clients.name,clients.fathername,employee.id,employee.username FROM `dailyentery` INNER JOIN clients ON clients.id=dailyentery.clientid INNER JOIN employee ON employee.id=dailyentery.employeeid  INNER JOIN lotterymember ON lotterymember.memberid=clients.id WHERE dailyentery.lotteryid=? AND dailyentery.clientid=? AND dailyentery.date LIKE '%$date';";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "ii",$lottteryid,$clientid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
$output= '<tbody id="Membersreporttablebody">';
$total=0;
$membertype="";
while($row = mysqli_fetch_array($rslt))
{
 $output.='<tr>';
 $membertype=$row['type'];
 $output.='<td>'.$row['date'].'</td>';
 $output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
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
 $output.='<td>'.$row['username'].'</td>';
 $output.= '</tr>';
 } 
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"><b> Walk Profit :- </b></p> </td>';
 $benefit=$this->LoadMemberLotteryBenefit($clientid,$lottteryid,$date);
 $total2=$total+$benefit;
 $monthlyrecovery=$this->LoadMonthlyRecovery($lottteryid);
 $nettotal=$total2-$monthlyrecovery;
 $output.='<td><b>'.number_format($benefit,2).'</b></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"> <b>Total Recovery :- </b></p> </td>';
 $output.='<td>'.'<p><b>'.number_format($total,2).'</b></p></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"> <b>Total :- </b></p> </td>';
 $output.='<td>'.'<p><b>'.number_format($total2,2).'</b></p></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 if($membertype=='Full')
 {
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"> <b>Lottery Recovery :- </b></p> </td>';
 $output.='<td>'.'<p><b>'.$monthlyrecovery.'</b></p></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 }
 else if($membertype=='Half')
 {
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"> <b>Lottery Recovery :- </b></p> </td>';
 $output.='<td>'.'<p><b>'.($monthlyrecovery/2).'</b></p></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 }
 $output.= '<tr>';
 $output.='<td colspan=3><p class="pull-right"> <b>Net Total :- </b></p> </td>';
 $output.='<td>'.'<p><b>'.$nettotal.'</b></p></td>';
 $output.='<td colspan=2></td>';
 $output.= '</tr>';
 $output.= '</tbody>';
 return $output;
 }

 function LoadMemberTotal($clientid)
 {   
 $nettotal=$this->LoadMemberRecoveryTotal($clientid)+$this->LoadMemberProfitTotal($clientid);
 return  number_format($nettotal,2);
 }
 
 function LoadMemberRecoveryTotal($clientid)
 {   
 $sql = "SELECT SUM(dailyentery.amount) FROM `dailyentery` WHERE dailyentery.clientid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$clientid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $total=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $total=$row['SUM(dailyentery.amount)'];
 }
 return $total;
 }
 function LoadMemberProfitTotal($clientid)
 {   
 $sql = "SELECT  SUM(profit) FROM `lotteryprofit` WHERE lotteryprofit.memberid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$clientid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $total=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $total=$row['SUM(profit)'];
 }
 return $total;
 }
 function LoadMemberLotteryBenefit($clientid,$lotteryid,$date)
 {   
 $sql = "SELECT * FROM `lotteryprofit` WHERE memberid=? AND lotteryid=? AND date LIKE '%$date';";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "ii",$clientid,$lotteryid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $total=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $total=$row['profit'];
 }
 return  $total;
 }
 function LoadAllLotteryMemberProfitAndRecovery($lotteryid)
 {
 $sql="SELECT lotterymember.memberid,lotterymember.type,clients.name,clients.fathername,clients.id AS clientid FROM `lotterymember` INNER JOIN clients ON clients.id=lotterymember.memberid WHERE lotterymember.lotteryid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$lotteryid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output='';
 $count=0; 
 while($row = mysqli_fetch_array($rslt))
 {
 $output.='<tr>';
 $output.='<td>'.(++$count).'</td>';
 $output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
 $output.='<td>'.$row['type'].'</td>';
 $Rtotal=$this->LoadMemberRecoveryTotal($row['clientid']);
 $totalprofit=$this->LoadMemberProfitTotal($row['clientid']);
 $nettotal=$totalprofit+$Rtotal;
 $output.='<td>'.number_format($Rtotal,2).'</td>';
 $output.='<td>'.number_format($totalprofit,2).'</td>';
 $output.='<td>'.number_format($nettotal,2).'</td>';
 $output.='</tr>';
 }
 return $output;
 }
 function LoadMonthlyRecovery($lotteryid)
 {   
 $sql = "SELECT * FROM `lottery` WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$lotteryid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $numMonths=0;
 $amount=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $amount=    $row['amount'];
// $timeStart  = strtotime($row['startingDate']);
// $timeEnd    = strtotime($row['endingDate']);
// $numMonths  =  1+(date("Y",$timeEnd)-date("Y",$timeStart))*12;
// $numMonths +=  date("m",$timeEnd)-date("m",$timeStart);
 }
 $monthlyrecover=$amount/$this->GettotalnumberoflotteryMember($lotteryid);
 return $monthlyrecover;
 }
 function GettotalnumberoflotteryMember($lotteryid)
 {
 $totalMember=$this->GetFullLotteryMember($lotteryid)+($this->GetHalfLotteryMember($lotteryid)/2);
 return $totalMember;
 }
function GetFullLotteryMember($lotteryid)
 {
 $sql="SELECT COUNT(lotterymember.memberid) FROM `lotterymember` WHERE lotterymember.lotteryid=? AND lotterymember.type='Full' ";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"i",$lotteryid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $output=$row['COUNT(lotterymember.memberid)'];    
 }    
 return $output;
 }
 function GetHalfLotteryMember($lotteryid)
 {
 $sql="SELECT COUNT(lotterymember.memberid) FROM `lotterymember` WHERE lotterymember.lotteryid=? AND lotterymember.type='Half' ";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"i",$lotteryid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output=0;
 while($row = mysqli_fetch_array($rslt))
 {
 $output=$row['COUNT(lotterymember.memberid)'];    
 }    
 return $output;
 }
 
 }


