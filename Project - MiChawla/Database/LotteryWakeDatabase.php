<?php
include_once './WalkMemberDatabase.php';
class LotteryWakeDatabase
{
public  $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "michawla";
public  $Walkmember;
// Get Database Connection - Constructure
function __construct()
{
$this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
$this->Walkmember= new LotteryWakeMemberDatabase();
if($this->conn->connect_error)
{
die("Connection failed: " . $this->conn->connect_error);    
}
}
function InsertWakeFunction($lotteryid, $wakeamount, $admincommsion,$wakedate) 
{
try 
{
$sql = "INSERT INTO `lotterywake`(`lotteryid`, `wakeamount`, `admincommsion`, `wakedate`) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"idds",$lotteryid, $wakeamount, $admincommsion,$wakedate);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$wakeid = mysqli_insert_id($this->conn);
$profit=$wakeamount-$admincommsion;
echo $this->GetLotteryMemberInsertProfit($lotteryid,$profit,$wakedate,$wakeid);
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}
function InsertWalkeMember($walkid, $memberid, $perce) 
{
try 
{
$this->Walkmember->InsertWakeMemberFunction($walkid, $memberid, $perce);
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}
function GetLotteryMemberInsertProfit($lotteryid,$amount,$wakedate,$wakeid)
{
$profit= $amount/$this->GettotalnumberoflotteryMember($lotteryid);  
$sql="SELECT * FROM `lotterymember` WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
while($row = mysqli_fetch_array($rslt))
{
if($row['type']=="Half")
{  
$halfprofit=$profit/2;
$this->InsertMemberProfitFunction($lotteryid,$row['memberid'],$halfprofit,$wakedate,$wakeid);
}
else
{
$this->InsertMemberProfitFunction($lotteryid,$row['memberid'],$profit,$wakedate,$wakeid);
}
}
}
function InsertMemberProfitFunction($lotteryid,$memberid,$amount,$wakedate,$wakeid)
{
try 
{
$stmt = $this->conn->prepare("INSERT INTO `lotteryprofit`(`memberid`, `lotteryid`, `profit`, `date`, `wakeid`) VALUES (?,?,?,?,?)");
$stmt->bind_param("iidsi",$memberid,$lotteryid,$amount,$wakedate,$wakeid);
$stmt->execute();
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}

function GetWakeByLottery($lotteryid)
{
$wakenumber=0;    
$sql="SELECT lotterywake.id AS lotterywakeid,lottery.amount,lotterywake.wakeamount,lotterywake.admincommsion,lotterywake.wakedate FROM lotterywake INNER JOIN lottery ON lottery.id=lotterywake.lotteryid WHERE lotterywake.lotteryid=?";     
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
$output='<tbody id="waketablebody">';
while($row = mysqli_fetch_array($rslt))
{
$output.= '<tr>';    
$output.='<td>'.$row['wakedate'].'</td>';
$wakenumber++;
$output.='<td>'.$wakenumber.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.''.'</td>';
$output.='<td>'.number_format($row['amount'],3).'</td>';
$output.='<td>'.number_format($row['wakeamount'],3).'</td>';
$output.='<td>'.number_format($row['admincommsion'],3).'</td>';
$output.='<td>'.number_format((($row['wakeamount']-$row['admincommsion'])/$this->GettotalnumberoflotteryMember($lotteryid)),2).'</td>';
$netmount2=$row['amount']-$row['wakeamount'];
$output.='<td>'.number_format($netmount2,2).'</td>';
$output.= '<td>'.'<button type="button" class="btn btn-success approve editwake"  id="'.$row['lotterywakeid'].'"><span class="fa fa-edit"></span></button>'.'<button type="button" class="btn btn-danger disapprove deletewake" id="'.$row['lotterywakeid'].'"><span class="fa fa-trash-o"></span></button>'.'</td>'; 
$output.= '<td>' .'<button type="button" class="btn btn-success approve sendnotification"  id="'.$row['lotterywakeid'].'">Send</button>'.'</td>';
$output.= '</tr>';
$output.= '<tr>';
$output.=$this->Walkmember->GetWalkMember($row['lotterywakeid'], $netmount2);
$output.= '<td colspan=10></td>';
$output.= '<td colspan=10>' .'<button type="button" class="btn btn-success approve openmembermodal"  id="'.$row['lotterywakeid'].'">Add Wake Member</button>'.'</td>';
$output.= '</tr>';
}
$output.= '</tbody>';
return $output;
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
 function GetWakeInfo($id)
 {   
 $sql = "SELECT * FROM lotterywake WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",  $id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = array();
 while($row = mysqli_fetch_array($rslt))
 {
 $output['wakeamount'] =$row['wakeamount'];
 $output['admincommsion']=$row['admincommsion'];
 $date=date_create($row['wakedate']);
 $output['wakedate']=date_format($date,"mm/dd/yyyy");
 }
 return json_encode($output);
 }
 function updateWakeMember($memberid, $perce, $id)
 {   
 $this->Walkmember->UpdateWalkMember($memberid, $perce, $id) ;
 }
 function GetWakeMemberInfo($id)
 {   
 echo $this->Walkmember->GetWakeMemberInfo($id);
 }
 function UpdateLotteryWake($wakeamount,$admincommsion,$wakedate,$id,$lotteryid)
 {   
 $sql = "UPDATE `lotterywake` SET `wakeamount`=? ,`admincommsion`=?,`wakedate`=? WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "iisi",  $wakeamount,$admincommsion,$wakedate,$id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $profit=$wakeamount-$admincommsion;
 $this->GetLotteryMemberUpdateProfit($lotteryid,$profit,$wakedate,$id);
 }
 function GetLotteryMemberUpdateProfit($lotteryid,$amount,$wakedate,$wakeid)
 {
 $profit= $amount/$this->GettotalnumberoflotteryMember($lotteryid);  
$sql="SELECT * FROM `lotterymember` WHERE lotterymember.lotteryid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
$rslt = mysqli_stmt_get_result($stmt);
while($row = mysqli_fetch_array($rslt))
{
if($row['type']=="Half")
{  
$halfprofit=$profit/2;
$this->UpdateMemberWakeProfit($halfprofit,$wakedate,$row['memberid'],$lotteryid,$wakeid);
}
else
{
$this->UpdateMemberWakeProfit($profit,$wakedate,$row['memberid'],$lotteryid,$wakeid);
}
}
}
function UpdateMemberWakeProfit($profit,$date,$memberid,$lotteryid,$wakeid)
{   
$sql = "UPDATE `lotteryprofit` SET `profit`=? ,`date`=? WHERE memberid=? AND lotteryid=? AND wakeid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "dsiii",  $profit,$date,$memberid,$lotteryid,$wakeid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
}
function DeleteEntry($deleteId)
{   
$sql = "DELETE FROM `lotterywake` WHERE id=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "i",$deleteId);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
$this->DeleteWakeProfitEntry($deleteId);
$this->Walkmember->DeleteWholeMembersWalk($deleteId);
}
function DeleteWalkMemberEntry($deleteId)
{   
$this->Walkmember->DeleteEntry($deleteId);    
}
function DeleteWakeProfitEntry($deleteId)
{   
$sql = "DELETE FROM `lotteryprofit` WHERE wakeid=?";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt, "i",$deleteId);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
$rslt = mysqli_stmt_get_result($stmt);
}
public $nettotal=0;
public $giventotal=0;
function GetWakeTranscation($lotteryid)
{
$wakenumber=0;    
$sql="SELECT lotterywake.id AS lotterywakeid,lottery.amount,lotterywake.wakeamount,lotterywake.admincommsion,lotterywake.wakedate FROM lotterywake  INNER JOIN lottery ON lottery.id=lotterywake.lotteryid WHERE lotterywake.lotteryid=?";     
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"i",$lotteryid);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output='';
 while($row = mysqli_fetch_array($rslt))
 {
 $output.= '<tr>';    
 $output.='<td>'.$row['wakedate'].'</td>';
 $wakenumber++;
 $output.='<td >'.$wakenumber.'</td>';
 $this->nettotal=$row['amount']-($row['wakeamount']+$row['admincommsion']);
 $output.='<td>'.''.'</td>';
 $output.='<td>'.''.'</td>';
 $output.='<td>'.number_format($this->nettotal,3).'</td>';
 $output.='<td colspan=4>'.''.'</td>';
 $output.= '</tr>';
 $output.=$this->Walkmember->GetWalkMember2($row['lotterywakeid'],$this->nettotal);
 $output.= '<tr>';
 $output.= '</tr>';
 
$this->nettotal=0;
 $this->giventotal=0;
 }
 $output.= '';
 return $output;
 }

 function GetWalkPayment($walkid)
 {
 $total=0;   
 try 
 {
 $sql = 'SELECT walkpaymnet.id AS walkpaymentid,walkpaymnet.lotteryid,walkpaymnet.walkid,walkpaymnet.memberid,walkpaymnet.amount,walkpaymnet.type,walkpaymnet.date,walkpaymnet.bankname,walkpaymnet.checknumber,lottery.loteryName,clients.name,clients.fathername FROM walkpaymnet INNER JOIN lottery ON lottery.id=walkpaymnet.lotteryid INNER JOIN clients ON clients.id=walkpaymnet.memberid WHERE walkpaymnet.walkid=?';
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$walkid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error); 
 $rslt = mysqli_stmt_get_result($stmt);
 $output= '';
if($rslt->num_rows>0)
 {
 while($row = mysqli_fetch_array($rslt))
 {
 $output.='<tr>';
 $output.='<td colspan=2>'.''.'</td>';
 $output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
 $output.='<td>'.''.'</td>';
 $this->giventotal+=$row['amount'];
 $output.='<td>'.number_format($row['amount'],2).'</td>';
 $output.='<td>'.$row['type'].'</td>';
 if($row['bankname']!=="0" &&$row['checknumber']!==0)
 {
 $output.='<td>'."Bank Name <b>".$row['bankname']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
 }
 else
 {
 $output.='<td>'.''.'</td>';
 }
 $output.='</tr>';
 }}
 else
 {
// $output.='<tr>';
// $output.='<td colspan=5>'.''.'</td>';
// $output.='<td>'. number_format(0,2).'</td>';
// $output.='<td colspan=2>'.''.'</td>';
// $output.='</tr>';
 }
 return $output;
 }
 catch(PDOException $e)
 {
 echo "Error: " . $e->getMessage();
 }
 }
 }


