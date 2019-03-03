<?php
   include('config.php');
   session_start();
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($result) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $result->fetch_all()[0][0];

         echo $myusername;

         header("location: account.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!--THIS IS A MEME -->
    <!-- Title Bar Image-->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="CSS/index.css">

    <!-- Scrollmagic -->
    <script src="3rd_Party_Libraries/ScrollMagic/ScrollMagic.min.js"></script>

	  <!-- carousel library 0-->
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	  <link rel="stylesheet" type="text/css" href="CSS/slick/slick/slick.css"/>



  </head>

  <body>
  	<div id="blackwrapper_php">
  	  <header>
  		    <h1 id="Title">Just Recipes</h1>
          <a id="Signup_php" href = "newUser.php">Signup</a>
  	  </header>

      <div align = "center">
         <div style = "width:300px;" align = "left">
          <div style = "background-color:#333333; color:#FFFFFF;"></div>
          <div style = "margin:30px">
             <form action = "" method = "post" autocomplete = "off">
                <label class="login_instr">UserName  : </label><input class="loginBox_php"btype = "text" name = "username" class = "box"/><br /><br />
                <label class="login_instr">Password  : </label><input class="loginBox_php" type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = "Submit"/><br />
             </form>
             <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          </div>
         </div>
      </div>
  </div>
  </body>
</html>
