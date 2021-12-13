<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

// $customerid = $data['customerid']; 
$firstname = $data['firstname'];
$lastname = $data['lastname'];
// $fullname = $firstname + $lastname;
$email = $data['email'];
$contactnumber = $data['contactNumber'];
$address = $data['address']; 
$password = $data['password'];
$userphoto = '';
$datejoin = date('y-d-m h:i:s');

//password encryption
$hash = password_hash($password,PASSWORD_DEFAULT);

		$query = "INSERT INTO tblcustomer (firstname,lastname,email,contactnumber,address,password,userphoto,datejoin) 
							 VALUES('$firstname','$lastname','$email','$contactnumber','$address','$hash','$userphoto','$datejoin') ";

		if(mysqli_query($con, $query)){
			http_response_code(201);
			$message['status'] = "SUCCESS";

		}else{
			http_response_code(422);
			$message['status'] = "ERROR";
		}
	print json_encode($message);
	mysqli_close($con);