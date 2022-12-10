<?php
include "../includes/db.php";
// var_dump($conn);
// exit();
if(isset($_POST['submit'])){
  $error=array();

if(empty($_POST['username'])){
  $error['username']="Please Enter Username";
}

if(empty($_POST['email'])){
  $error['email']="Please Enter Email";
}

if(empty($_POST['hash'])){
  $error['hash']="Please Enter Password";
}

if(empty($error)){

  $encrypted=password_hash($_POST['hash'],PASSWORD_BCRYPT);

$stmt=$conn->prepare("INSERT INTO admin VALUES(NULL,:usm,:em,:hsh,NOW(),NOW())");
$data=array(
  ":usm"=>$_POST['username'],
  ":em"=>$_POST['email'],
  "hsh"=>$encrypted
);

$stmt->execute($data);
// echo("location:Login.php?message=Dear ".$_POST['username']." you have succesfully signed up and a confirmation message will be sent to ".$_POST['email']);
// exit();

$message = "You Have succesfully registered You can proceed to your login";
echo "<script type='text/javascript'>alert('$message');document.location='login.php'</script>";
// header("location:login.php");
// exit();

//Create a signup pagenda age  next


}






}






 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <title>Chat App</title>
    <style>
    body{
      background-image: url("img/bv.jpg");
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>JAYCHAT APP</h2>
      <div class="frame">
          <div class="nav">
             <ul class="links">
               <li class="signup-active"><a class="btn">Sign up</a></li>
               <!-- <li class="signup-inactive"><a class="btn">Sign in</a></li> -->
             </ul>
          </div>


            <form class="form-signup" action="" method="post">
              <label for="username">Username</label>
              <?php if(isset($error['username'])){
                echo $error['username'];
              }?>
              <input class="form-styling" type="text" name="username" required placeholder="" value=""> <br>
              <label for="email">Email</label>
              <?php if(isset($error['email'])){
                echo $error['email'];
              }?>
              <input class="form-styling" type="text" name="email" value="" required placeholder=""><br>
              <label for="hash">Password</label>
              <?php if(isset($error['hash'])){
                echo $error['hash'];
              }?>
              <input class="form-styling" type="password" name="hash" value="" required placeholder=""> <br>
              <!-- <input type="checkbox" id="checkbox" name="" value="">
              <label for="checkbox"> <span class="ui"></span>keep me signed in </label> -->
              <div class="">
              <input class="btn-signup" type="submit"  name="submit" value="SIGNUP">
              </div>
            </form>

            <!-- <form class="form-signup" action="" method="post" name="form">
      <label for="fullname">Full name</label>
      <input class="form-styling" type="text" name="fullname" placeholder=""/> <br>
      <label for="email">Email</label>
      <input class="form-styling" type="text" name="email" placeholder=""/> <br>
      <label for="hash">Password</label>
      <input class="form-styling" type="password" name="hash" placeholder=""/> <br>
      <label for="confirm_hash">Confirm Password</label>
      <input class="form-styling" type="password" name="confirm_hash" placeholder=""/> <br>
      <a ng-click="checked = !checked" class="btn-signup">Sign Up</a>
            </form> -->
          </div>
    </div>

    <a id="refresh" value="Refresh" onClick="history.go()">
      <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
           xml:space="preserve">
           <path  d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
                  c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
                  c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
                  c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
                  c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
                  l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z"/>
      </svg>
    </a>


<!-- <script src="scripts/register.js" charset="utf-8"></script> -->
<!-- <script src="scripts/register.js" type="text/javascript"> -->

</script>
  </body>
</html>
