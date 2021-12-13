<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$id = $_GET['id'];

$stmt = mysqli_query($con, "SELECT * FROM tblorder WHERE USERID = '$id' AND ORDERSTATS = 'confirm'");

while($row = mysqli_fetch_array($stmt)){
	$data[] = $row;
}

    http_response_code(201);
    $message['status'] = "SUCCESS";
		
	
    print json_encode($data);
    mysqli_close($con);

?>








