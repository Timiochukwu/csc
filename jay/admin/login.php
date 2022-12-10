<?php
session_start();
include "../includes/db.php";
// var_dump($conn);
// exit();
if(isset($_POST['submit'])){
  $error=array();

  if(empty($_POST['username'])){
    $error['username']="Please Enter Username";
  }

  if(empty($_POST['hash'])){
    $error['hash']="Please Enter Password";
  }


  if(empty($error)){
    $statement=$conn->prepare("SELECT * FROM admin WHERE username=:usm ");
    $statement->bindParam(":usm",$_POST['username']);
    $statement->execute();


    $row=$statement->fetch(PDO::FETCH_BOTH);
    // var_dump($row);
    // exit();
    if($statement->rowCount() > 0 && password_verify ($_POST['hash'],$row['hash'])){
      $_SESSION['id']=$row['id'];
      $_SESSION['username']=$row['username'];

      // header("location:dashboard.php?Welcome to Jay Chatapp Platform");
      // exit();
      $success = "Login Success: Welcome Online";
      echo "<script type='text/javascript'>alert('$success');document.location='chatbox.php'</script>";
    }else{
      $Failed = "Incorrect Credentials";
      echo "<script type='text/javascript'>alert('$Failed');document.location='login.php'</script>";
      // header("location:login.php?Either Username or Password Incorrect");
      // exit();
    }



  }
}















 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title> &#x2654; Chat App</title>
    <style>
      body{
        background-image: url("img/bv.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-color:
      }

      h1{
        color: white;
      }

      #container{
        border:3px solid white;
        width: 450px;
        margin:auto;
        height:350px;
        border-radius: 10px;
        margin-top: 90px;
        background-color:#FFFFFF;
        /* background-image: url("../1.jfif"); */
      }

      .form{
        text-align: center;
        /* border:3px solid yellow; */
        width: 400px;
        height:290px;
        margin:auto;
        margin-top:5px;

      }


      p{
        font-size: 30px;
      }

      #ttt {
        border: 2px solid blue;
        background-color:white;
        width: 350px;
        height: 40px;
        border-radius: 10px;
        margin-top: 40px;
      }

      #submit{
        border:2px solid blue;
        width: 350px;
        height: 40px;
        border-radius: 10px;
        margin-top: 30px;
      }

      #submit:hover{
        background-color:#012EA3;
      }

      ::placeholder{
        font-size:20px;
      }

      .header{
        /* border:1px solid green; */
        height: 50px;
      }


    </style>
  </head>
  <body>
    <!-- <h1 align="center">ATHLETE'S PAGE &#x1f3c3;</h1>
    <hr> -->
    <!-- <h3>You Have Succesfully enrolled ,You can Now sign-in as a Member of Osheku Athletics Academy</h3> -->
    <div id="container">
      <div class="header">
        <h2 align="center" style="color:blue;">&#x2654; JAY CHAT APP</h2>
      </div>
    <div class="form">
      <form  action="" method="post">
        <input id="ttt" type="text" name="username" required placeholder="Username">
         <br>
        <input id="ttt" type="password" name="hash" required placeholder="Password">
         <br>
        <input id="submit" type="submit" name="submit" value="Login">
      </form>
    </div>
  </div>

<script type="text/javascript" src="">

</script>


  </body>
</html>
