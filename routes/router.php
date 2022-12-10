<?php
$uri=explode("/",$_SERVER['REQUEST_URI']);
die(var_dump($uri));

if(count($uri) > 2){



}else{
  if(!empty($_GET)){
    // $_GET=$string;
    $string=explode("?",$uri[1])[1];
  }else{
    $string="";
  }

switch ($uri[1]) {
  case '':
  include APP_PATH."/login.php";
  break;

  case 'login':
  include APP_PATH."/login.php";
  break;

  case 'login?'.$string:
  include APP_PATH."/login.php";
  break;

  case 'signup':
  include APP_PATH."/signup.php";
  break;

  case 'signup?'.$string:
  include APP_PATH."/signup.php";
  break;

  case 'dashboard':
  include APP_PATH."/dashboard.php";
  break;

  case 'dashboard?'.$string:
  include APP_PATH."/dashboard.php";
  break;

  case 'user?'.$string:
  include APP_PATH."/user.php";
  break;

  case 'user':
  include APP_PATH."/user.php";
  break;

  case 'getmessage?'.$string:
  include APP_PATH."/getmessage.php";
  break;


  case 'message?'.$string:
  include APP_PATH."/message.php";
  break;

    case 'message':
    include APP_PATH."/message.php";
    break;

  default:
  include APP_PATH."/login.php";
  break;
}
}

 ?>
