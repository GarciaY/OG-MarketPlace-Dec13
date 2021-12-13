<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../employee.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Employee($db);

  $item->U_NAME = $_GET['U_NAME'];
  $item->U_USERNAME = $_GET['U_USERNAME'];
  $item->U_PASS = $_GET['U_PASS'];
  $item->U_ROLE = $_GET['U_ROLE'];
  $item->USERIMAGE = $_GET['USERIMAGE'];
  if($item->createEmployee()){
  echo 'Employee created successfully!!';
  } else{
  echo 'Employee could not be created!!';
  }
?>