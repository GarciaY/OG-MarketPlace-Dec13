<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../stockin.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Stockin($db);

  $item->STOCKINID = isset($_GET['STOCKINID']) ? $_GET['STOCKINID'] : die();
  $item->STOCKDATE = $_GET['STOCKDATE'];
  $item->PROID = $_GET['PROID'];
  $item->STOCKQTY = $_GET['STOCKQTY'];
  $item->STOCKPRICE = $_GET['STOCKPRICE'];
  $item->STOCKPRICE = $_GET['STOCKPRICE'];
  if($item->updateStockin()){
  echo json_encode("Stock updated.");
  } else{
  echo json_encode("Stock not updated");
  }
  ?>