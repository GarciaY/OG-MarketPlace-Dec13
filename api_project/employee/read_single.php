<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../employee.php';
  $database = new Database();
  $db = $database->getConnection();
  $item = new Employee($db);
  $item->USERID = isset($_GET['USERID']) ? $_GET['USERID'] : die();
  $item->getSingleEmployee();
  if($item->U_USERNAME != null){

// create array
$employee_arr = array(
"USERID" => $item->USERID,
"U_USERNAME" => $item->U_USERNAME,
"U_NAME" => $item->U_NAME,
"U_PASS" => $item->U_PASS,
"U_ROLE" => $item->U_ROLE,
"USERIMAGE" => $item->USERIMAGE
);

http_response_code(200);
echo json_encode($employee_arr);
}
else{
http_response_code(404);
echo json_encode("User Account  not found.");
}
?>