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




<html>
</head>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" type="text/css" href="css/plan.css">
    <link rel="stylesheet" type="text/css" href="css/shapes.css">    
    <link rel="stylesheet" type="text/css" href="css/cssManage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
   
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css" />
    <script>
        $(document).ready(function () {

            var x = null;
            $("#round").click(function () {
                var clone = $("#round").clone()
                clone.draggable().appendTo(".planner-main");
             
                    
                    
            });
            $("#square").click(function () {
                   var clone= $("#square").clone()
                $("#square").clone().draggable().appendTo(".planner-main");
               
            });

            $("#oval").click(function () {
                   var clone= $("#oval").clone()
                $("#oval").clone().draggable().appendTo(".planner-main");
               
            });


            //Make element draggable
            $("#round").draggable({
                helper:'clone',
                cursor: 'move',
                tolerance: 'fit'
            });

            $("#plan").droppable({

                drop: function (e, ui) {

                    if ($(ui.draggable)[0].id != "") {
                        x = ui.helper.clone();
                        ui.helper.remove();
                        x.draggable({
                            helper: 'original',
                            containment: '#plan',
                            tolerance: 'fit'
                        });
                        x.resizable();
                        x.appendTo('#plan');
                        x.click(function () {
                          
                            form();
                        });
                    }

                }
            });
          

        });</script>


    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Creeaza-ti planul</title>

</head>
<body>
    <div class="cont">
        <img id="img1" src="../img/1595329-dot-icon-png-50-px-logos-png-1600_1600_preview.png">
        <span id="hometitle">Proiecteaza-ti evenimentul</span>

    </div>
   <div>
       	<p id="user" style="position:absolute;top:0px;right:100px">Welcome <?php echo $login_session; ?> </p>
        <button style="background-color: #ffbb99;
    position: absolute;
    padding: 10px 20px;
    font-size: 17px;
    cursor: pointer;
    width: 15%;
    opacity: 12;
    right: 70px;
    top: 40px;"
	action="php/logout.php">
            Log Out
        </button>
    </div>

    <div class="selection-bar">

        <a href="../design/startAfterLog.php">Home</a>
        <a class="active" href="http://localhost/design/createAfterLog.html">Creeaza plan nou</a>
        <a href="salveaza.html">Salveaza</a>

    </div>


    <div class="menu-bar">


        <div id="round" class="item"></div>

        <div id="square" class="item"></div>

        <div id="oval" class="item"></div>


    </div>
	
	<script type="text/javascript">
	
	function formSubm(){
		console.log("hola");
	}
 
</script>

    <div class="planner-main" id="plan" style="position:absolute;top:143px;left:200px;height:560px">

           <div id="box" style=" display:none">
        <form method="post" action="" id="form" onsubmit="return formSubm()">
            <p><input type="text" name="table" placeholder="Table name" id="table"/></p>
            <p><input type="text" name="no" placeholder="Number of persons" id="no"/></p>
			<p><input type="text" name="pers" placeholder="Person Name" id="pers"/></p>
    <button id="button" type="button"onclick="submitD()"  style="
 margin-bottom: 28px;
	width: 120px;
	height: 32px;
	background:#f44336;
	border: none;
	border-radius: 2px;
	color:#fff;
	font-family: sans-serif;
	font-weight: 500;
	text-transform: uppercase;
	transition: 0.2s ease;
	cursor: pointer;">Submit</button>
			
      
      
		<button id="add" type="button" onclick="adauga()" style="
 margin-bottom: 28px;
	width: 120px;
	height: 32px;
	background:#f44336;
	border: none;
	border-radius: 2px;
	color:#fff;
	font-family: sans-serif;
	font-weight: 500;
	text-transform: uppercase;
	transition: 0.2s ease;
	cursor: pointer;">Add Person</button>
    </div>
    </div>
	
	<script>
	function adauga(){
	$('#add').click(function (e) {

    e.preventDefault();

    var table = $("#table").val();
    var pers = $("#pers").val();
	
	
    $.post("php/pers.php", {
      table: table,
      pers: pers
    })
  });
  
}
	</script>


    
    <script>
        function form() {

            $('#box').toggle("slow");
        }
    </script>

	<script>
	function submitD(){
	$('#button').click(function (e) {

    e.preventDefault();

    var table = $("#table").val();
    var no = $("#no").val();
	
	
    $.post("php/invit.php", {
      table: table,
      no: no
    })
  });
  
}
	</script>
	
</body>
</html>
