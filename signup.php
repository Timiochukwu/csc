<?php

session_start();
define("APP_PATH", (dirname((__FILE__))));

include APP_PATH."/model/model.php";
include APP_PATH."/controller/controller.php";

if(isset($_POST['submit'])){
  $error=[];
  if(empty($_POST['name'])){
    $error['name']="hello";
  }
  if(empty($_POST['email'])){
    $error['email']="hello";
  }
  if(empty($_POST['hash'])){
    $error['hash']="hello";
  }
  if(empty($_POST['cosh'])){
    // $error['cosh']="hello";
  }elseif($_POST['cosh']!==$_POST['hash']) {
    $error['cosh']="Password Mismatch";
  }
  if(empty($error)){

    $check=validator($conn);
    if($check->rowcount() < 1){
      // die("i got here");
      storedata($conn);
        header("location:login.php");
        exit();
  }else{
    header("location:signup.php?id=This is account already exists");
  }
}
}
 ?>
<!doctype html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Quick Chat App">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />
		<!-- Title -->
		<title>Quick Chat App</title>


      <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body class="authentication">

		<!-- *************
			************ Login container start *************
		************* -->
		<div class="login-container">

			<!-- Row start -->
			<div class="row no-gutters h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>Chat</span>
							<span>All</span>
							<span>Day Long.</span>
						</div>
						<div class="about-desc">
              This is was built and design in Nigeria
						</div>
						<a href="index.html" class="know-more">Know More <img src="img/right-arrow.svg"></a>

					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form action="" method="POST">
							<div class="login-screen">
								<div class="login-body">
									<a href="#" class="login-logo">
										<img src="img/logo.svg" alt="Quick Chat">
									</a>
                  <?php
                    if(isset($_GET['id'])){
                       echo "<div class='alert alert-danger alert-dismissible show role='alert'>
       											<strong>Notice! </strong>".$_GET['id']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
       										</div>";
                    }
                    if(isset($error['cosh'])){
                          echo "<div class='alert alert-danger alert-dismissible show role='alert'>
                                <strong>Notice! </strong>".$error['cosh']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                              </div>";
                    }elseif(isset($error)){
                    echo "<div class='alert alert-danger alert-dismissible show role='alert'>
                          <strong>Notice! </strong> please input a value<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                        </div>";
              }
                   ?>
									<h6>Welcome to Quick Chat App,<br>Create your account.</h6>
									<div class="field-wrapper">
										<input type="text" name="name"  autofocus>
										<div class="field-placeholder">Username</div>
									</div>
									<div class="field-wrapper">
										<input type="email" name="email"  autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper">
										<input type="password" name="hash" >
										<div class="field-placeholder">Password</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" name="cosh">
										<div class="field-placeholder">Confirm Password</div>
									</div>
									<div class="actions">
										<button type="submit" name="submit" class="btn btn-primary ml-auto">Sign Up</button>
									</div>
								</div>
								<div class="login-footer">
									<span class="additional-link">Have an account? <a href="login.php" class="btn btn-secondary">Login</a></span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->

		</div>
		<!-- *************
			************ Login container end *************
		************* -->

	</body>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4./js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
</html>
