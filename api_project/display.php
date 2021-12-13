<?php

include "config.php";

$data = array();
$query = mysqli_query($con, "SELECT * FROM tblproduct ");


while($row = mysqli_fetch_object($query)){
	$data[] = $row;
}


	echo json_encode($data);
	echo mysqli_error($con);

?>