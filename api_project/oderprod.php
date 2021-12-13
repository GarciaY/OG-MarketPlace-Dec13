<?php
include 'config.php';


$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$PROID = $data['proid'];
$PROID = $data['proid'];
$ORDEREDQTY = $data['quantity'];
$ORDEREDPRICE  = $data['price'];
$ORDERSTATS = 'Pending';
$USERID = $data['id'];

$query = "INSERT INTO tblorder (PROID,ORDEREDQTY,ORDEREDPRICE,ORDERSTATS,USERID) 
				VALUES('$PROID','$ORDEREDQTY','$ORDEREDPRICE','$ORDERSTATS','$USERID') ";

		if(mysqli_query($con, $query)){
			http_response_code(201);
			$message['status'] = "SUCCESS";

		}else{
			http_response_code(422);
			$message['status'] = "ERROR";
		}

print json_encode($message);
mysqli_close($con);
