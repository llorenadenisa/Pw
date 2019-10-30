<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "users";
 $conn=mysqli_connect("$dbhost","$dbuser","$dbpass");
 mysqli_select_db($conn,'$dbname');


 if(mysqli_connect_error())
 	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 

 	if(isset($_POST['login-button'])){
 		
 		$username=$_POST['username'];

 		$password=md5($_POST['password']);
 		$sql="SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
 		$result=mysql_query($sql);
 		$rowc=mysql_num_rows($result);
 		if ($rows == 1) {
		echo "Succes";
		} 
	else 
	echo "Username or Password is invalid";

}
$conn->close();

 


 	?>