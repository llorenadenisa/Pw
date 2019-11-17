<?php
	session_start();
	$message="";

if(count($_POST)>0)
{
 
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "users";
 $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 $result=mysqli_query($connection,"SELECT * FROM users WHERE username='".$_POST["username"]."'and password='".$_POST["password"]."'");
 $row=mysqli_fetch_array($result);

 if(is_array($row))
 	 $_SESSION["username"]=$row['username'];
 
 else 
	$message="Invalid Username or Password";
	
	}

header("Location: http://localhost/design/login.php");
 
 
  
?>