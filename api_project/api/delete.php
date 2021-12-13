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

if($item->deleteCustomer()){
echo json_encode("Customer deleted.");
} else{
echo json_encode("Customer could not be deleted");
}
?>