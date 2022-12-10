<?php
session_start();

$response=[];
try{
  $identifier=$_SESSION['id']+$_GET['id'];
$statement = $conn->prepare("SELECT * FROM message WHERE identity=:idt ORDER BY date_created AND time_created");
// $stmt->bindparam(":idt",$identifier);
$data=[':idt'=>$identifier];
$statement->execute($data);
$result=[];
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
  $row['time_created'] = date("h:i A", strtotime($row['time_created']));
	$result[]=$row;
};

$response['success']=true;
$response['data']=$result;
$response['verify']=$_GET['id'];
$response['verify2']=$_SESSION['id'];
}catch(Execption $e){
$response['failed']="Something Went Wrong";
}

$res = json_encode($response);
echo $res;

 ?>
