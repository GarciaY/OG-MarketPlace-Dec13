<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../database.php';
  include_once '../wishlist.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->getConnection();
  $items = new Wishlist($db);
  $records = $items->getWishlist();
  $itemCount = $records->num_rows;
  echo json_encode($itemCount);
  
  // Get row count
 if($itemCount > 0){
$wish_arr = array();
$wish_arr["body"] = array();
$wish_arr["No. of Wishlist: "] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($wish_arr["body"], $row);
}
echo json_encode($wish_arr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>