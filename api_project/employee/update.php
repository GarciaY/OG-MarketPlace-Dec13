<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../employee.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Employee($db);

  $item->USERID = isset($_GET['USERID']) ? $_GET['USERID'] : die();
  $item->U_NAME = $_GET['U_NAME'];
  $item->U_USERNAME = $_GET['U_USERNAME'];
  $item->U_PASS = $_GET['U_PASS'];
  $item->U_ROLE = $_GET['U_ROLE'];
  $item->USERIMAGE = $_GET['USERIMAGE'];
  if($item->updateEmployee()){
  echo json_encode("Profile updated.");
  } else{
  echo json_encode("Profile not updated");
  }
  ?>