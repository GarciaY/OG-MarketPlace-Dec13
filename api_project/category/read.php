<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../Category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Category($db);
  $records = $items->getCategory();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
  if($itemCount > 0){
  $categoryArr = array();
  $categoryArr["body"] = array();
  $categoryArr["No. of Categories"] = $itemCount;
  while ($row = $records->fetch_assoc())
  {
  array_push($categoryArr["body"], $row);
  }
  echo json_encode($categoryArr);
  }
  else{
  http_response_code(404);
  echo json_encode(
  array("message" => "yo wassap no record haha sad tite.")
  );
  }
?>