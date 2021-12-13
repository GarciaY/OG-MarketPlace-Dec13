<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../promopro.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Promopro($db);
  $records = $items->getPromopro();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$promoArr = array();
$promoArr["body"] = array();
$promoArr["No. of Current Promos: "] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($promoArr["body"], $row);
}
echo json_encode($promoArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>