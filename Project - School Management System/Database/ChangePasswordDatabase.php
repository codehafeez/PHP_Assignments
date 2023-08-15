<?php
session_start();
class ChangePasswordClass 
{
    public $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "school_system_db";

    function __construct() {
    $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){ die("Connection failed: " . $this->conn->connect_error); }
    }
    
    function Update_Password_Function($email, $old_password, $new_password)
    {
        try 
        {
            $sql = "SELECT * FROM login_table WHERE user_email='$email' AND user_password='$old_password'";
            $result=  $this->conn->query($sql);
            if($row = mysqli_fetch_array($result)) 
            { 
                $sql2 = "UPDATE login_table SET user_password=? WHERE user_email='$email'";
                $stmt2 = mysqli_prepare($this->conn, $sql2) or die("Unable to prepare statement");
                mysqli_stmt_bind_param($stmt2,"s", $new_password);
                mysqli_stmt_execute($stmt2)or die("Unable to execute query: " . $stmt2->error);
                echo 'Successfully Update Password'; 
            }
            else { echo 'Incorrect Old Password'; }            
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
