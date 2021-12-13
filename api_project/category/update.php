<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../Category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Category($db);

  $item->CATEGID = isset($_GET['CATEGID']) ? $_GET['CATEGID'] : die();
  $item->CATEGORIES = $_GET['CATEGORIES'];
  $item->USERID = $_GET['USERID'];
  if($item->updateCategory()){
  echo json_encode("Success Category data updated.");
  } else{
  echo json_encode("Category could not be updated");
  }
  ?>