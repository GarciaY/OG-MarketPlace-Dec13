<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$customerid = $data['customerid'];
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$email = $data['email'];
$contactnumber = $data['contactnumber'];
$address = $data['address'];	
$password = $data['password'];	
$userphoto = $data['userphoto'];	
$datejoin = date('y-d-m');

$query = mysqli_query($con ,"UPDATE tblcustomer SET
                            firstname = '$firstname',
							lastname = '$lastname',
						    email = '$email', 
                            contactnumber = '$contactnumber',
						    address = '$address',
                            password = '$password',
                            userphoto = '$userphoto',
                            datejoin = '$datejoin'
							WHERE customerid = $customerid ");

		http_response_code(201);
		$message['status'] = "SUCCESS";
	
    print json_encode($message);
    mysqli_close($con);

?>








