<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../setting.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Setting($db);

  $item->SETTINGID = isset($_GET['SETTINGID']) ? $_GET['SETTINGID'] : die();
  $item->PLACE = $_GET['PLACE'];
  $item->BRGY = $_GET['BRGY'];
  $item->DELPRICE = $_GET['DELPRICE'];
  if($item->updateSetting()){
  echo json_encode("Setting updated.");
  } else{
  echo json_encode("Setting could not be updated");
  }
  ?>