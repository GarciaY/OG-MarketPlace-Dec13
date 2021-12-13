<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../stockin.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Stockin($db);

  // Set STOCKINID to UPDATE
  $item->STOCKINID = isset($_GET['STOCKINID']) ? $_GET['STOCKINID'] : die();
if($item->deleteStockin()){
echo json_encode("Stock deleted.");
} else{
echo json_encode("Stock gone so sad");
}
?>
