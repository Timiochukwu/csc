<?php
session_start();

include "/model.php";
include "/controller.php"


if(isset($_POST['submit'])){
  $error=[];
  if(empty($_POST['email'])){
    $error['email']="hello";
  }
  if(empty($_POST['hash'])){
    $error['hash']="hello";
  }
  if(empty($error)){
    $check=validator($conn);
    if($check->rowcount() > 0){
			$array2=valida($conn);
			$_SESSION['id']=$array2[0]['id'];
      $_SESSION['name']=$array2[0]['username'];
			header("location:dashboard.php");

  }else{
    header("location:login.php?id=Incorect Email or Password");
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
							<span>Day Long</span>
						</div>
						<div class="about-desc">
						</div>
						<a href="index.html" class="know-more">Know More <img src="img/right-arrow.svg"></a>

					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form action="" method="post">
							<div class="login-screen">
								<div class="login-body">
									<a href="index.html" class="login-logo">
										<img src="img/logo.svg" alt="Quick Chat">
									</a>
                  <?php
                    if(isset($_GET['id'])){
                       echo "<div class='alert alert-danger alert-dismissible show role='alert'>
       											<strong>Notice! </strong>".$_GET['id']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
       										</div>";
                    }elseif(isset($error)){
                    echo "<div class='alert alert-danger alert-dismissible show role='alert'>
                          <strong>Notice! </strong> please input a value<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                        </div>";
              }
                   ?>
									<h6>Welcome back,<br>Please login to your account.</h6>
									<div class="field-wrapper">
										<input type="email" name="email" autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" name="hash">
										<div class="field-placeholder" >Password</div>
									</div>
									<div class="actions">
										<a href="forgot-password.html">Forgot password?</a>
										<button type="submit" name="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
								<div class="login-footer">
									<span class="additional-link">No Account? <a href="signup.php" class="btn btn-secondary">Sign Up</a></span>
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
</html>
