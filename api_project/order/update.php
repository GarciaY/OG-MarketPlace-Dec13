<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../order.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Order($db);

  $item->ORDERID = isset($_GET['ORDERID']) ? $_GET['ORDERID'] : die();
  $item->PROID = $_GET['PROID'];
  $item->ORDEREDQTY = $_GET['ORDEREDQTY'];
  $item->ORDEREDPRICE = $_GET['ORDEREDPRICE'];
  $item->ORDEREDNUM = $_GET['ORDEREDNUM'];
  $item->USERID = $_GET['USERID'];
  if($item->updateOrder()){
  echo json_encode("Order updated.");
  } else{
  echo json_encode("Order not updated");
  }
  ?>