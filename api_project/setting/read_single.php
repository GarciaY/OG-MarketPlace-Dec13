<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

include_once '../database.php';
include_once '../setting.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  // Instantiate blog category object
  $item = new Setting($db);

  // sinabi ko 'allen' wow may birthday cake sana ol

  $item->SETTINGID = isset($_GET['SETTINGID']) ? $_GET['SETTINGID'] : die();
  $item->getSingleSetting();
  if($item->PLACE != null){
  $set_arr = array(
 "SETTINGID" => $item->SETTINGID,
  "PLACE" => $item->PLACE,
  "BRGY" => $item->BRGY,
  "DELPRICE" => $item->DELPRICE
  );

http_response_code(200);
echo json_encode($set_arr);
}
else{
http_response_code(404);
echo json_encode("Setting not found.");
}
?>