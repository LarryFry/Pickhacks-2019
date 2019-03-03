<?php
   include('config.php');
   session_start();
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);


      $sql = "INSERT INTO users(`username`, `password`, `email`) VALUES ('$myusername','$mypassword','$myemail')";
      $result = mysqli_query($db,$sql);



      // If result matched $myusername and $mypassword, table row must be 1 row

      if($result) {
         header("location: login.php");
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
        <h1 id="Title"><a href="index.php">Just Recipes</a></h1>
        <a id="Signup_php" href = "newUser.php">Signup</a>
  	  </header>

      <div align = "center">
        <div style = "width:30%;" align = "left">
          <div style = "background-color:#333333; color:#FFFFFF;"></div>
            <div style = "margin:30px">
               <form action = "" method = "post" autocomplete = "off">
                 <label class="login_instr">UserName  : </label><input class="loginBox_php"btype = "text" name = "username" class = "box"/><br /><br />
                 <label class="login_instr">Password  : </label><input class="loginBox_php" type = "password" name = "password" class = "box" /><br/><br />
                  <label class="login_instr">Email  : </label><input class="loginBox_php" type = "email" name = "email" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
                </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
         </div>
      </div>
  </div>
  </body>
</html>
