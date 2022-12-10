<?php
session_start();

$json=file_get_contents("php://input");

$data = json_decode($json,true);

$response = [];
try{
$identifier=$_SESSION['id']+$_GET['id'];
$stmt=$conn->prepare("INSERT INTO message VALUES(NULL,:mg,:dt,:tm,:idt,NOW(),NOW() )");
$stmt->bindparam(":mg",$data);
$stmt->bindparam(":dt",$_SESSION['id']);
$stmt->bindparam(":tm",$_GET['id']);
$stmt->bindparam(":idt",$identifier);
$stmt->execute();
  $response['success'] = true;
}catch(Exception $e){
  $response['failed']=$e;
}

$res = json_encode($response);
echo $res;
 ?>
