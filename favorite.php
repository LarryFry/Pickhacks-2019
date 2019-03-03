<?php
   include('config.php');
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


    // $con = mysqli_connect("localhost","root","","pickhacks2017");
    // if (!$con)
    // {
    // die('Could not connect: ' . mysql_error());
    // }


    // $sql="INSERT INTO users (username,password,email)
    // VALUES
    // ('Tim','pass','tim@mail.com')";

    // if (!mysql_query($sql,$con))
    // {
    //     die('Error: ' . mysql_error());
    // }
    // echo "1 record added";

    // mysql_close($con);

    // echo "<script type='text/javascript'>alert('$fn');</script>";

    // try {
    //     $conn = new PDO("mysql:host=localhost; dbname=pickhacks2019", "root", '');
    // }
    // catch(PDOException $e) {
    //     die("Database connection could not be established.");
    // }


    // $sql = $conn->prepare("SELECT * FROM users");
    // $sql->execute();
    // if($sql->rowCount() > 0) {
    //     echo "hi";
    //     //$statement = $conn->prepare("INSERT INTO points (student_fn, type, grade, datetime)
    //       //                          VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
    //     //$statement->execute(array($fn, $type, $grade));
    // }
    // else {
    //     echo "<script type='text/javascript'>alert('No such fn');</script>";
    // }
    // $conn = null;

?>
