
<?php
  $numeM =filter_input(INPUT_POST,'table');
  $pers = filter_input(INPUT_POST,'pers');

$curr=$_SERVER['HTTP_REFERER'];

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "invitati";
 $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 ///nu s-a putut conecta la baza de date
 if(mysqli_connect_error())
 	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 
 else{	
 	//if(count($errors)==0){
    
 	$sql="INSERT INTO invitati(numeMasa, invitat) VALUES ('$numeM', '$pers' )";
 	
	
 $results=mysqli_query($connection,$sql);
	

	
	}
 		
  $connection->close();

  
?>