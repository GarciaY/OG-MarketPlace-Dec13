<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../wishlist.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Wishlist($db);

  $item->CUSID = $_GET['CUSID'];
  $item->PROID = $_GET['PROID'];
  $item->WISHDATE = $_GET['WISHDATE'];
  $item->WISHSTATS = $_GET['WISHSTATS'];
  if($item->createWishlist()){
  echo 'Wishlist successfully!!';
  } else{
  echo 'Wishlist could not be created!!';
  }
?>