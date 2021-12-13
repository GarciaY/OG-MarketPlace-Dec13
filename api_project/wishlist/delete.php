<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../wishlist.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Wishlist($db);

  // Set STOCKINID to UPDATE
  $item->id = isset($_GET['id']) ? $_GET['id'] : die();
if($item->deleteWishlist()){
echo json_encode("Wishlist deleted.");
} else{
echo json_encode("Wishlist gone so sad");
}
?>
