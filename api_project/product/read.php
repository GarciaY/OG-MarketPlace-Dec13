<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../product.php';
$database = new Database();

$db = $database->getConnection();
$items = new Product($db);
$records = $items->getProduct();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$productArr = array();
$productArr["body"] = array();
$productArr["Product Count: "] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($productArr["body"], $row);
}
echo json_encode($productArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>