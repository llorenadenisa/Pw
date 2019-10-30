<?php
  $username =filter_input(INPUT_POST,'username');
  $email = filter_input(INPUT_POST,'email');
  $password = filter_input(INPUT_POST,'password');
  $password2 = filter_input(INPUT_POST,'password2');
$curr=$_SERVER['HTTP_REFERER'];
/*$errors=array("er");

if(empty($username)){
  array_push($errors, "Camp obligatoriiu") ;
}
if(empty($email)){
  array_push($errors, "Camp obligatoriiu") ;
}
if(empty($password)){
  array_push($errors, "Camp obligatoriiu") ;
}
if($password != $password2){
  array_push($errors, "Cele doua parole nu se potrivesc ");
}

 */
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "users";
 $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 ///nu s-a putut conecta la baza de date
 if(mysqli_connect_error())
 	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 
 else{	
 	//if(count($errors)==0){
    $password=md5($password);
  $password2=md5($password2);
 	$sql="INSERT INTO users (username, email, password, password2)VALUES ('$username', '$email','$password','$password2')";
 	
  mysqli_query($connection,$sql);
	
}


 		
  $connection->close();
 header("Refresh: 4; url=http://localhost/design/start.html");
 echo "Succes";
  
?>