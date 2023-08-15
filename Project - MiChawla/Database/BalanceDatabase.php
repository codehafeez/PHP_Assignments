<?php
 class BalanceDatabase 
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
 function GetBalance()
 {   
 $sql = "SELECT * FROM balance WHERE id=1";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 $output = 0;
 while($row = mysqli_fetch_array($rslt))
 {
 $output=$row['amount'];
 }
 return $output;
 }
 function AddBalance($amount)
 {   
 $total=$this->GetBalance()+$amount;
 $sql = "UPDATE `balance` SET `amount`=? WHERE id=1";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "d",  $total);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }
 function SubtractBalance($amount)
 {   
 $total=$this->GetBalance()-$amount;
 $sql = "UPDATE `balance` SET `amount`=? WHERE id=1";
 $stmt = mysqli_prepare($this->conn, $sql) or die("Unable to prepare statement: " . $link->error);
 mysqli_stmt_bind_param($stmt, "d",  $total);
 mysqli_stmt_execute($stmt)or die("Unable to execute query: " . $stmt->error);
 $rslt = mysqli_stmt_get_result($stmt);
 }

 
 }
