

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>Quantox Test</title> 
<style type="text/css"> 
<!-- 
 
 #navbar ul { 
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: center; 
	background-color: #000; 
	} 
 
#navbar ul li {  
	display: inline; 
	} 
 
#navbar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #fff; 
	background-color: #000; 
	} 
 
#navbar ul li a:hover { 
	color: #000; 
	background-color: #fff; 
	} 
 
--> 
</style> 
</head> 
<body> 
<div id="navbar"> 
  <ul> 
	<li><a href="home.php">Home</a></li> 
	<li><a href="login.php">Login</a></li> 
	<li><a href="registration.php">Register</a></li>  
  </ul> 
</div> 
<?php
    require('dbConnect.php');
    session_start();

    if (isset($_POST['name'])) {
        $name = stripslashes($_REQUEST['name']);    
        $name = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM `users` WHERE name='$name'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name'] = $name;
            
            header("Location: welcome.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?>
</body>
</html>