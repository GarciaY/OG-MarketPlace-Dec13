<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../autonumber.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new AutoNumber($db);
  $item->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
  $item->getSingleAutoNumber();
  if($item->AUTOSTART != null){

// create array
$order_arr = array(
"ID" => $item->ID,
"AUTOSTART" => $item->AUTOSTART,
"AUTOINC" => $item->AUTOINC,
"AUTOEND" => $item->AUTOEND,
"AUTOKEY" => $item->AUTOKEY,
"AUTONUM" => $item->AUTONUM
);

http_response_code(200);
echo json_encode($order_arr);
}
else{
http_response_code(404);
echo json_encode("Order  not found.");
}
?>