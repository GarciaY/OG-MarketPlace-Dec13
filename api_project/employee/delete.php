<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../database.php';
  include_once '../employee.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Employee($db);

  // Set ID to UPDATE
  $item->USERID = isset($_GET['USERID']) ? $_GET['USERID'] : die();
if($item->deleteEmployee()){
echo json_encode("Employee deleted.");
} else{
echo json_encode("Employee gone so sad");
}
?>
