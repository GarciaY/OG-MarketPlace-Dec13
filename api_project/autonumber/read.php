<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../autonumber.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new AutoNumber($db);
  $records = $items->getAutoNumber();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$autoArr = array();
$autoArr["body"] = array();
$autoArr["No. of Current Auto Number"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($autoArr["body"], $row);
}
echo json_encode($autoArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>