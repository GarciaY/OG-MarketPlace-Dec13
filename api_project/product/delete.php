<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../product.php';
$database = new Database();
$db = $database->getConnection();
$item = new Product($db);

$item->PROID = isset($_GET['PROID']) ? $_GET['PROID'] : die();

if($item->deleteProduct()){
echo json_encode("Product deleted.");
} else{
echo json_encode("Product could not be deleted");
}
?>