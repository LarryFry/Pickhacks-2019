<?php
   include('config.php');
   if(!$db){echo "hi";};
   session_start();
   $error = "";
   echo "first";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      echo "two";
      $info = mysqli_real_escape_string($db,$_POST['info']);
      echo $info;
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users";
      $result = mysqli_query($db,$sql);      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result->num_rows>0) {
          echo $result[0][0];
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