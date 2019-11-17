<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "users";
 $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $password=md5($_POST['password']);
     

    $sql="SELECT username FROM users WHERE username='$username' and password='$password'";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   
    $count = mysqli_num_rows($result);


if($count==1){
    $_SESSION['login_user']=$username;

    header("location: startAfterLog.php");
    
}
else{
    $error="Username or Password wrong";
}
}


?>

<html>
<head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body style="background-image: url('../img/grad.jpg')">

    <div id="login-box">
        <div class="mid">
            <h1>Log in</h1>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required />

                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="login-button" value="Log in" />
                <p>Not a member?<a href="singup.html">Click here</a></p>
            </form>

        </div>
    </div>
</body>
</html>
