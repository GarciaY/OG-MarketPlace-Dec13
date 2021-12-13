<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../setting.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Setting($db);
  $records = $items->getSetting();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
  if($itemCount > 0){
  $settingArr = array();
  $settingArr["body"] = array();
  $settingArr["No. of Setting: "] = $itemCount;
  while ($row = $records->fetch_assoc())
  {
  array_push($settingArr["body"], $row);
  }
  echo json_encode($settingArr);
  }
  else{
  http_response_code(404);
  echo json_encode(
  array("message" => "Setting not found.")
  );
  }
?>