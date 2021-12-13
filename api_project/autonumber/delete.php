<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../autonumber.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new AutoNumber($db);

  // Set ID to UPDATE
  $item->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
if($item->deleteAutoNumber()){
echo json_encode("Auto Number deleted.");
} else{
echo json_encode("Auto Number gone so sad");
}
?>
