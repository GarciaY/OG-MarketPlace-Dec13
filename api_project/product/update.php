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
// titi
$item->PROID = isset($_GET['PROID']) ? $_GET['PROID'] : die();
$item->PRODESC = $_GET['PRODESC'];
$item->INGREDIENTS = $_GET['INGREDIENTS'];
$item->PROQTY = $_GET['PROQTY'];
$item->ORIGINALPRICE = $_GET['ORIGINALPRICE'];
$item->PROPRICE = $_GET['PROPRICE'];
$item->CATEGID = $_GET['CATEGID'];
$item->IMAGES = $_GET['IMAGES'];
$item->PROSTATS = $_GET['PROSTATS'];
$item->OWNERNAME = $_GET['OWNERNAME'];
$item->OWNERPHONE = $_GET['OWNERPHONE'];
if($item->updateProduct()){
echo json_encode("Product data updated.");
} else{
echo json_encode("Product Data could not be updated");
}
?>