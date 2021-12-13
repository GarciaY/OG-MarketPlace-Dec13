<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  include_once '../database.php';
  include_once '../promopro.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Promopro($db);

  $item->PROID = $_GET['PROID'];
  $item->PRODISCOUNT = $_GET['PRODISCOUNT'];
  $item->PRODISPRICE = $_GET['PRODISPRICE'];
  $item->PROBANNER = $_GET['PROBANNER'];
  $item->PRONEW = $_GET['PRONEW'];
  if($item->createPromopro()){
  echo 'Product promo created successfully!!';
  } else{
  echo 'Product Promo could not be created!!';
  }
?>