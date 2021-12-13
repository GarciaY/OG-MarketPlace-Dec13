<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../order.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Order($db);
  $records = $items->getOrder();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$orderArr = array();
$orderArr["body"] = array();
$orderArr["No. of Current Order"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($orderArr["body"], $row);
}
echo json_encode($orderArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>