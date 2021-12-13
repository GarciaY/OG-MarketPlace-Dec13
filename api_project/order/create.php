<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../order.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Order($db);

  $item->PROID = $_GET['PROID'];
  $item->ORDEREDQTY = $_GET['ORDEREDQTY'];
  $item->ORDEREDPRICE = $_GET['ORDEREDPRICE'];
  $item->ORDEREDNUM = $_GET['ORDEREDNUM'];
  $item->USERID = $_GET['USERID'];
  if($item->createOrder()){
  echo 'Order created successfully!!';
  } else{
  echo 'Order could not be created!!';
  }
?>