<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../order.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Order($db);
  $item->ORDERID = isset($_GET['ORDERID']) ? $_GET['ORDERID'] : die();
  $item->getSingleOrder();
  if($item->PROID != null){

// create array
$order_arr = array(
"ORDERID" => $item->ORDERID,
"PROID" => $item->PROID,
"ORDEREDQTY" => $item->ORDEREDQTY,
"ORDEREDPRICE" => $item->ORDEREDPRICE,
"ORDEREDNUM" => $item->ORDEREDNUM,
"USERID" => $item->USERID
);

http_response_code(200);
echo json_encode($order_arr);
}
else{
http_response_code(404);
echo json_encode("Order  not found.");
}
?>