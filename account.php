<?php
   include('session.php');
   $error = "";

      // username and password sent from form
      //echo $_SESSION['user_id'];
      $sql = "SELECT recipeName,url,img FROM recipes JOIN users ON recipes.userID = users.id WHERE userID = '$_SESSION[user_id]'";
      $result = mysqli_query($db,$sql);
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($result->num_rows >0) {
         //header("location: login.php");
         //echo $result->fetch_all()[0][0];
      }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Just Recipes</title>
    <meta charset="UTF-8">

    <!-- Title Bar Image-->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


    <!--Stylesheet-->
    <link rel="stylesheet" href="CSS/index.css">
	  <!-- carousel library 0-->
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	  <link rel="stylesheet" type="text/css" href="CSS/slick/slick/slick.css"/>

  </head>

  <body>

  	<div id="blackwrapper">
  	  <header>
          <h1 id="Title"><a href="index.php">Just Recipes</a></h1>
          <h2 id="Signout" ><a href = "logout.php">Sign Out</a></h2>
  	  </header>



	  </div>
  </div>

      </div><!--maindiv -->
  	</div><!-- blackwrapper -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="SCRIPTS/slick.js" type="text/javascript" charset="utf-8"></script>
    <!--  Custom Logic Script-->
    <script src="SCRIPTS/main.js"></script>
  </body>
</html>
