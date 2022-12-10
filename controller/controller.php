<?php

function storedata($dbconn){
$hash=password_hash($_POST['hash'],PASSWORD_BCRYPT);
$statement=$dbconn->prepare("INSERT INTO user (username,email,hash,active,date_created,time_created) VALUES(:nm,:em,:hsh,:ac,NOW(),NOW())");
$active="No";
$data=[
  ":nm"=>$_POST['name'],
  ":em"=>$_POST['email'],
  ":hsh"=>$hash,
  ":ac"=>$active
];
$statement->execute($data);
}
function validator($dbconn){
  $statement=$dbconn->prepare("SELECT * FROM user WHERE username=:nm OR email=:em");
  if(isset($_POST['name'])){
  $data=array(
    ":nm"=>$_POST['name'],
    ":em"=>$_POST['email'],
  );
}else{
$data=array(
  ":em"=>$_POST['email'],
  ":nm"=>""
);
}
  $statement->execute($data);
  return $statement;
}
function valida($dbconn){
  $statement=validator($dbconn);
    $array=[];
  while($row=$statement->fetch(PDO::FETCH_BOTH)){
    $array[]=$row;
  }
  return $array;
}

function user($dbconn){
  $statement=$dbconn->prepare("SELECT * FROM user");
  $statement->execute();
  $user=[];
    while($row=$statement->fetch(PDO::FETCH_BOTH)){
  $user[]=$row;
  }
  return $user;
}
 ?>
