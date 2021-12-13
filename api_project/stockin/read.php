<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../stockin.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Stockin($db);
  $records = $items->getStockin();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$stock_Arr = array();
$stock_Arr["body"] = array();
$stock_Arr["No. of Stock: "] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($stock_Arr["body"], $row);
}
echo json_encode($stock_Arr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>