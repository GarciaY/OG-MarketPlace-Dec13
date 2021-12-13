<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../stockin.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Stockin($db);

  $item->STOCKDATE = $_GET['STOCKDATE'];
  $item->PROID = $_GET['PROID'];
  $item->STOCKQTY = $_GET['STOCKQTY'];
  $item->STOCKPRICE = $_GET['STOCKPRICE'];
  $item->USERID = $_GET['USERID'];
  if($item->createStockin()){
  echo 'Stock created successfully!!';
  } else{
  echo 'Stock could not be created!!';
  }
?>