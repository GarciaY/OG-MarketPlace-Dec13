<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../setting.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Setting($db);

  $item->PLACE = $_GET['PLACE'];
  $item->BRGY = $_GET['BRGY'];
  $item->DELPRICE = $_GET['DELPRICE'];
  if($item->createSetting()){
  echo 'Setting created successfully!!';
  } else{
  echo 'Setting could not be created!!';
  }
?>