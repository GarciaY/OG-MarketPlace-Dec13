<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../employee.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Employee($db);
  $records = $items->getEmployee();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$employeeArr = array();
$employeeArr["body"] = array();
$employeeArr["No. of Current Employees"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($employeeArr["body"], $row);
}
echo json_encode($employeeArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>