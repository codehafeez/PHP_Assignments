<?php
class LotteryWakeMemberDatabase
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
function InsertWakeMemberFunction($walkid, $memberid, $perce) 
{
try 
{
$sql = "INSERT INTO `wakemember`(`walkid`, `memberid`, `perce`) VALUES (?,?,?)";
$stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
mysqli_stmt_bind_param($stmt,"iid",$walkid, $memberid, $perce);
mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
}
catch(Exception $e) { echo "Error: " . $e->getMessage(); }
}
 function GetWalkMember($walkid,$walkamount)
 {
 $sql="SELECT wakemember.id AS wakememberid,wakemember.memberid,wakemember.perce,clients.name,clients.fathername FROM wakemember INNER JOIN clients ON clients.id=wakemember.memberid  WHERE wakemember.walkid=?";     
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"i",$walkid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output='';
 while($row = mysqli_fetch_array($rslt))
 {
 $output.= '<tr>';    
 $output.='<td>'.''.'</td>';
 $output.='<td>'.''.'</td>';
 $output.='<td>'.$row['name'].' S/O '.$row['fathername'].'</td>';
 $output.='<td>'.$row['perce'].' %'.'</td>';
 $totalmemberamount=$walkamount*($row['perce']/100);
 $output.='<td colspan=4>'.''.'</td>';
 $output.='<td>'.number_format($totalmemberamount,2).'</td>';
 $output.= '<td>'.'<button type="button" class="btn btn-success approve editwakememeber"  id="'.$row['wakememberid'].'"><span class="fa fa-edit"></span></button>'.'<button type="button" class="btn btn-danger disapprove deletewakemember" id="'.$row['wakememberid'].'"><span class="fa fa-trash-o"></span></button>'.'</td>'; 
 $output.='<td>'.''.'</td>';
 $output.= '</tr>';
 }
 return $output;
 }
 public $walkamount=0;
 function GetWalkMember2($walkid,$walkamount)
 {
 $this->walkamount=0;
 $sql="SELECT wakemember.id AS wakememberid,wakemember.memberid,wakemember.perce,wakemember.walkid,clients.name,clients.fathername FROM wakemember INNER JOIN clients ON clients.id=wakemember.memberid  WHERE wakemember.walkid=?";     
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"i",$walkid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output='';
 while($row = mysqli_fetch_array($rslt))
 {
    
 $totalmemberamount=$walkamount*($row['perce']/100);
 $output.=$this->GetWakeMemberPayment($row['walkid'],$row['memberid'],$row['name'],$row['fathername'],$row['perce'],$totalmemberamount);

 }
 $output.= '<tr>'; 
 $output.='<td colspan=7>'.''.'</td>';
 $output.='<td>'.number_format($this->walkamount,2).'</td>';
 $output.= '</tr>';
 return $output;
 }
  function GetWakeMemberPayment($id,$memberid,$name,$fathername,$perce,$totalamount)
  {   
  $sql = "SELECT * FROM walkpaymnet WHERE walkid=? AND memberid=?";
  $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
  mysqli_stmt_bind_param($stmt, "ii",  $id,$memberid); 
  mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
  $rslt = mysqli_stmt_get_result($stmt);
  $output="";
  if($rslt->num_rows>0){
  while($row = mysqli_fetch_array($rslt))
  {
  $output.= '<tr>';    
  $output.='<td>'.$row['date'].'</td>';
  $output.='<td>'.''.'</td>';
  $output.='<td>'.$name.' S/O '.$fathername.'</td>';
  $output.='<td>'.$perce.'%'.'</td>';
  $output.='<td>'.number_format($totalamount,2).'</td>';
  $output.='<td>'.number_format($row['amount'],2).'</td>';
  $output.='<td>'.$row['type'].'</td>';
  $this->walkamount+=($totalamount-$row['amount']);
  $output.='<td>'.number_format(($totalamount-$row['amount']),2).'</td>';
  if($row['bankname']!=="0" &&$row['checknumber']!==0)
  {
  $output.='<td>'."Bank Name <b>".$row['bankname']."</b> <br> Checque Number <b>".$row['checknumber'].'</b></td>';
  }
  else
  {
  $output.='<td>'.''.'</td>';
  $output.= '</tr>';
  }
   
  }
  
  }
  else
  {
   $output.= '<tr>';    
  $output.='<td>'.''.'</td>';
  $output.='<td>'.''.'</td>';
  $output.='<td>'.$name.' S/O '.$fathername.'</td>';
  $output.='<td>'.$perce.'%'.'</td>';
  $this->walkamount+=$totalamount;
  $output.='<td>'.number_format($totalamount,2).'</td>';
  $output.='<td>'.number_format(0,2).'</td>';
  $output.='<td>'.''.'</td>';
  $output.='<td>'.number_format(($totalamount-0),2).'</td>';
  $output.= '</tr>';
  }
  return $output;
  }
 function GetWakeInfo($id)
 {   
 $sql = "SELECT * FROM wakemember WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",  $id); 
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = array();
 while($row = mysqli_fetch_array($rslt))
 {
 $output['memberid'] =$row['memberid'];
 $output['id']=$row['id'];
 $output['perce']=$row['perce'];
 }
 return json_encode($output);
 }
 function UpdateWalkMember($memberid,$perce,$id)
 {   
 $sql = "UPDATE `wakemember` SET `memberid`=? ,`perce`=? WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "idi",  $memberid,$perce,$id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function DeleteEntry($deleteId)
 {   
 $sql = "DELETE FROM `wakemember` WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$deleteId);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function DeleteWholeMembersWalk($deleteId)
 {   
 $sql = "DELETE FROM `wakemember` WHERE walkid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",$deleteId);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function GetWakeMemberInfo($id)
 {   
 $sql = "SELECT * FROM wakemember WHERE id=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "i",  $id);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = array();
 while($row = mysqli_fetch_array($rslt))
 {
 $output['memberid'] =$row['memberid'];
 $output['perce']=$row['perce'];
 $output['id']=$row['id'];
 }
 return json_encode($output);
 }
 function GetWalkMemberOption($walkid)
 {
 $sql="SELECT wakemember.id AS wakememberid,wakemember.memberid,wakemember.perce,clients.name,clients.fathername FROM wakemember INNER JOIN clients ON clients.id=wakemember.memberid  WHERE wakemember.walkid=?";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt,"i",$walkid);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);   
 $rslt = mysqli_stmt_get_result($stmt);
 $output='';
 while($row = mysqli_fetch_array($rslt))
 {
 $output.='<div class="radio"><label>';
 $output.='<input type="radio" class="clientid" name="optionsRadios" id="'.$row['memberid'].'">';
 $output.=$row['name'].' S/O '.$row['fathername'];
 $output.='</label></div>';
 }
 return $output;
 }
 }


