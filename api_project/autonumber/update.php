<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../autonumber.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new AutoNumber($db);

  $item->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
  $item->AUTOSTART = $_GET['AUTOSTART'];
  $item->AUTOINC = $_GET['AUTOINC'];
  $item->AUTOEND = $_GET['AUTOEND'];
  $item->AUTOKEY = $_GET['AUTOKEY'];
  $item->AUTONUM = $_GET['AUTONUM'];
  if($item->updateAutoNumber()){
  echo json_encode("Auto Number updated.");
  } else{
  echo json_encode("Auto Number not updated");
  }
  ?>