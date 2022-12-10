<?php
$response=[];
try{
$statement=$conn->prepare("SELECT * FROM user WHERE id=:id");
$statement->bindparam(":id",$_GET['id']);
$statement->execute();

$result=array();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
	$result[]=$row;
};

$response['success']=true;
$response['data']=$result[0];
}catch(Execption $e){
$response['failed']="Something Went Wrong";
}
$res= json_encode($response);
echo $res;
 ?>
