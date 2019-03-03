<?php
   include('config.php');
   session_start();
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $info = mysqli_real_escape_string($db,$_POST['info']);
      echo $info;
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "";
      $result = mysqli_query($db,$sql);      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         //$_SESSION['user_id'] = $result->fetch_all()[0][0];

         //echo $myusername;
         
         //header("location: account.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }


?>