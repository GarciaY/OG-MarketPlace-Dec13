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

$item->firstname = $_GET['firstname'];
$item->lastname = $_GET['lastname'];
$item->email = $_GET['email'];
$item->contactnumber = $_GET['contactnumber'];
$item->address = $_GET['address'];
$item->password = $_GET['password'];
$item->userphoto= $_GET['userphoto'];
$item->datejoin = date("Y-m-d H:i:s");
if($item->createCustomer()){
echo 'Customer created successfully.';
} else{
echo 'Customer could not be created.';
}
?>