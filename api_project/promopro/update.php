<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../promopro.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Promopro($db);

  $item->PROMOID = isset($_GET['PROMOID']) ? $_GET['PROMOID'] : die();
  $item->PROID = $_GET['PROID'];
  $item->PRODISCOUNT = $_GET['PRODISCOUNT'];
  $item->PRODISPRICE = $_GET['PRODISPRICE'];
  $item->PROBANNER = $_GET['PROBANNER'];
  $item->PRONEW = $_GET['PRONEW'];
  if($item->updatePromopro()){
  echo json_encode("Promo updated.");
  } else{
  echo json_encode("Promo not updated");
  }
  ?>