<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$customerid = $data['id'];
$fname = $data['fname'];

$stmt = mysqli_query($con, "SELECT * FROM tblcustomer WHERE customerid = '$customerid' LIMIT 1");

while($row = mysqli_fetch_object($stmt)){


    $customerid = $customerid;
    $firstname = $row->firstname;
    $lastname = $row->lastname;
    $email = $row->email;
    $contactnumber = $row->contactnumber;
    $address = $row->address;	
    $password = $row->password;	
    $userphoto = $fname;	
    $datejoin = $row->datejoin;

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
    print json_encode($row);
    mysqli_close($con);
}
	

?>








