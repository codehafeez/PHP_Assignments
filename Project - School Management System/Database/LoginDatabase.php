<?php
session_start();
class LoginDatabase 
{
    public $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "school_system_db";

    function __construct() {
    $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
        die("Connection failed: " . $this->conn->connect_error); }
    }
    
    function LogIn($email, $password)
    {
        try
        {
            $sql = "SELECT * FROM login_table WHERE user_email='$email' AND user_password='$password'";
            $result=  $this->conn->query($sql);
            if($row = mysqli_fetch_array($result)) 
            { 
                echo "YesLoginTrue";
                if (!isset($_SESSION['loginTrue'])) { 
                    $_SESSION['loginTrue'] = "YesLogin"; 
                    $_SESSION['WorkingEmail'] = $email;                     
                }
            }    
        } catch(Exception $e) { echo "Error: " . $e->getMessage(); }
    }
}
