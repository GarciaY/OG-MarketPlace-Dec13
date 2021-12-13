<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../wishlist.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();

  $item = new Wishlist($db);

  $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  $item->CUSID = $_GET['CUSID'];
  $item->PROID = $_GET['PROID'];
  $item->WISHDATE = $_GET['WISHDATE'];
  $item->WISHSTATS = $_GET['WISHSTATS'];
  if($item->updateWishlist()){
  echo json_encode("Wishlist updated.");
  } else{
  echo json_encode("Wishlist not updated");
  }
  ?>