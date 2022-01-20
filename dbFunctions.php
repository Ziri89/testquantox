<?php  
require_once 'dbConnect.php';  
session_start();  
    class dbFunction {  
            
        function __construct() {  
              
            $db = new dbConnect();;  
               
        }  
        function __destruct() {  
              
        }  
        public function UserRegister($name, $email, $password){  
                $password = md5($password);  
                $qr = mysql_query("INSERT INTO users(name, email, password) values('".$name."','".$email."','".$password."')") or die(mysql_error());  
                return $qr;  
               
        }  
        public function Login($email, $password){  
            $result = mysql_query("SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'");  
            $user_data = mysql_fetch_array($result);   
            $no_rows = mysql_num_rows($result);  
              
            if ($no_rows == 1)   
            {  
           
                $_SESSION['login'] = true;  
                $_SESSION['id'] = $user_data['id'];  
                $_SESSION['name'] = $user_data['name'];  
                $_SESSION['email'] = $user_data['email'];  
                return TRUE;  
            }  
            else  
            {  
                return FALSE;  
            }  
        }  
        public function isUserExist($email){  
            $query = mysql_query("SELECT * FROM users WHERE email = '".$email."'");  
            echo $row = mysql_num_rows($query);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }  
    }  
?> 