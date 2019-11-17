<?php
	session_start();

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "users";
 $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($connection,"select username from users where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:http://localhost/design/login.php");
      die();
   }
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/newL.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Planificari evenimente</title>
</head>

<body id="prin">
    <div class="cont">
        <img id="img1" src="../img/1595329-dot-icon-png-50-px-logos-png-1600_1600_preview.png">
        <span id="hometitle">Proiecteaza-ti evenimentul</span>

    </div>


    <div class="selection-bar">

        <a class="active" href="../design/start.html">Home</a>
        <a href="http://localhost/design/createAfterLog.php">Creeaza plan nou</a>
        <a href="salveaza.html">Salveaza</a>

    </div>
    <div>
       	<p id="user" style="position:absolute;top:0px;right:100px">Welcome <?php echo $login_session; ?> </p>
        <button style=" background-color: #ffbb99;
    position: absolute;
    padding: 10px 20px;
    font-size: 17px;
    cursor: pointer;
    width: 15%;
    opacity: 0.9;
    right: 70px;
    top: 40px;"action="logout.php">
            Log Out
        </button>
    </div>


</body>
</html>