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
$item->getSingleProduct();
if($item->PRODESC != null){

// create array
$prod_arr = array(
"PROID" => $item->PROID,
"PRODESC" => $item->PRODESC,
"INGREDIENTS" => $item->INGREDIENTS,
"PROQTY" => $item->PROQTY,
"ORIGINALPRICE" => $item->ORIGINALPRICE,
"PROPRICE" => $item->PROPRICE,
"CATEGID" => $item->CATEGID,
"IMAGES" => $item->IMAGES,
"PROSTATS" => $item->PROSTATS,
"OWNERNAME" => $item->OWNERNAME,
"OWNERPHONE" => $item->OWNERPHONE
);

http_response_code(200);
echo json_encode($prod_arr);
}
else{
http_response_code(404);
echo json_encode("Product not found.");
}
?>