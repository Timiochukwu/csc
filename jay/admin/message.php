<?php
// session_start();
// include "../includes/admin_auth.php";
include '../includes/db.php';

try{
// if(isset($_POST['submit'])){
//   $error = array();
//
//    if(empty($error)){
//      // $stmt=$conn->prepare("SELECT * FROM messages WHERE message=:msg ");
     $stmt=$conn->prepare("SELECT * FROM messages");
     // $stmt->bindParam(":msg",$_POST['message']);
     $stmt->execute();
   // }
$message=[];
while( $result=$stmt->fetch(PDO::FETCH_BOTH)){
  $message[]=$result;
};
$response['success']=true;
$response['data']=$message;

}catch(Exception $e){
  $response['failed']="something is wrong";
}

$res = json_encode($response);
echo $res;
 ?>
