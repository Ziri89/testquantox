<?php  
/*require_once 'dbConnect.php';  
session_start();  
    class dbFunction {  
            
        function __construct() {  
              
            $db = new dbConnect();;  
               
        }  
        function __destruct() {  
              
        }  
        
        public function UserRegister($name, $email, $password){  
                $password = md5($password);  
        global $conn;

                $qr = mysqli_query("INSERT INTO users(name, email, password) values('".$name."','".$email."','".$password."')", $conn);  
                return $qr;  
               
        }  
        public function Login($email, $password){  
        global $conn;

            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'");  
            $user_data = mysqli_fetch_array($result);   
            $no_rows = mysqli_num_rows($result);  
              
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
        global $conn;

        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
            if(mysqli_num_rows($query) > 0){
               echo "email already exists";
            }  
        }  
    }

?>

