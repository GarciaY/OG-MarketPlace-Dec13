<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../stockin.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Stockin($db);
  $item->STOCKINID = isset($_GET['STOCKINID']) ? $_GET['STOCKINID'] : die();
  $item->getSingleStockin();
  if($item->STOCKDATE != null){

// create array
$stock_arr = array(
"STOCKINID" => $item->STOCKINID,
"STOCKDATE" => $item->STOCKDATE,
"PROID" => $item->PROID,
"STOCKQTY" => $item->STOCKQTY,
"STOCKPRICE" => $item->STOCKPRICE,
"USERID" => $item->USERID
);

http_response_code(200);
echo json_encode($stock_arr);
}
else{
http_response_code(404);
echo json_encode("Stock not found.");
}
?>