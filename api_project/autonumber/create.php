<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../autonumber.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new AutoNumber($db);

  $item->AUTOSTART = $_GET['AUTOSTART'];
  $item->AUTOINC = $_GET['AUTOINC'];
  $item->AUTOEND = $_GET['AUTOEND'];
  $item->AUTOKEY = $_GET['AUTOKEY'];
  $item->AUTONUM = $_GET['AUTONUM'];
  if($item->createAutoNumber()){
  echo 'Auto Number created successfully!!';
  } else{
  echo 'Auto Number could not be created!!';
  }
?>