<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../Category.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Category($db);

  // Set ID to UPDATE
  $item->CATEGID = isset($_GET['CATEGID']) ? $_GET['CATEGID'] : die();
if($item->deleteCategory()){
echo json_encode("Category deleted.");
} else{
echo json_encode("Category gone so sad");
}
?>
