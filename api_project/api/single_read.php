<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../customers.php';
$database = new Database();
$db = $database->getConnection();
$item = new Customer($db);
$item->customerid = isset($_GET['customerid']) ? $_GET['customerid'] : die();
$item->getSingleCustomer();
if($item->firstname != null){

// create array
$cus_arr = array(
"customerid" => $item->customerid,
"firstname" => $item->firstname,
"lastname" => $item->lastname,
"email" => $item->email,
"contactnumber" => $item->contactnumber,
"address" => $item->address,
"password" => $item->password,
"userphoto" => $item->userphoto,
"datejoin" => $item->datejoin
);

http_response_code(200);
echo json_encode($cus_arr);
}
else{
http_response_code(404);
echo json_encode("Customer not found.");
}
?>