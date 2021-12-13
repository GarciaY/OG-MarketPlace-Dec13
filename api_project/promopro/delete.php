<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../promopro.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Promopro($db);

  // Set PROMOID to UPDATE
  $item->PROMOID = isset($_GET['PROMOID']) ? $_GET['PROMOID'] : die();
if($item->deletePromopro()){
echo json_encode("Product Promo deleted.");
} else{
echo json_encode("Product Promo gone so sad yo ");
}
?>
