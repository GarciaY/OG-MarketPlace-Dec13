<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

include_once '../database.php';
include_once '../category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  // Instantiate blog category object
  $item = new Category($db);

  // sinabi ko 'allen' wow may birthday cake sana ol

  $item->CATEGID = isset($_GET['CATEGID']) ? $_GET['CATEGID'] : die();
  $item->getSingleCategory();
  if($item->CATEGORIES != null){
  $cat_arr = array(
 "CATEGID" => $item->CATEGID,
  "CATEGORIES" => $item->CATEGORIES,
  "USERID" => $item->USERID
  );

http_response_code(200);
echo json_encode($cat_arr);
}
else{
http_response_code(404);
echo json_encode("wALA E not found.");
}
?>