<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$data = array();

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM tblproduct WHERE PROID = $id LIMIT 1");


while($row = mysqli_fetch_array($query)){
	$data[] = $row;
}


	echo json_encode($data);
	echo mysqli_error($con);

?>