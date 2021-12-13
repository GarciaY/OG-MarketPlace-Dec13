<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../wishlist.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Wishlist($db);
  $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  $item->getSingleWishlist();
  if($item->CUSID != null){

// create array
$wish_arr = array(
"id" => $item->id,
"CUSID" => $item->CUSID,
"PROID" => $item->PROID,
"WISHDATE" => $item->WISHDATE,
"WISHSTATS" => $item->WISHSTATS
);

http_response_code(200);
echo json_encode($wish_arr);
}
else{
http_response_code(404);
echo json_encode("Wishlist not found.");
}
?>