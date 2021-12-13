<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../promopro.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Promopro($db);
  $item->PROMOID = isset($_GET['PROMOID']) ? $_GET['PROMOID'] : die();
  $item->getSinglePromopro();
  if($item->PROID != null){

// create array
$promo_arr = array(
"PROMOID" => $item->PROMOID,
"PROID" => $item->PROID,
"PRODISCOUNT" => $item->PRODISCOUNT,
"PRODISPRICE" => $item->PRODISPRICE,
"PROBANNER" => $item->PROBANNER,
"PRONEW" => $item->PRONEW
);

http_response_code(200);
echo json_encode($promo_arr);
}
else{
http_response_code(404);
echo json_encode("Promo not found.");
}
?>