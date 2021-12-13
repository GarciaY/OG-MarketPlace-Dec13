<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../order.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Order($db);

  // Set ID to UPDATE
  $item->ORDERID = isset($_GET['ORDERID']) ? $_GET['ORDERID'] : die();
if($item->deleteOrder()){
echo json_encode("Order deleted.");
} else{
echo json_encode("Order gone so sad");
}
?>
