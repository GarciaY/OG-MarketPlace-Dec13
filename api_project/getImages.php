<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$data = array();

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT tblorder.PROID,	
                                    tblorder.ORDEREDQTY,
                                    tblorder.ORDEREDPRICE,
                                    tblorder.ORDERSTATS,
                                    tblorder.USERID,
                                    tblproduct.PRODESC,
                                    tblproduct.IMAGES
                                    FROM tblorder 
                                    LEFT JOIN tblproduct
                                    ON tblproduct.PROID = tblorder.PROID 
                                    WHERE tblorder.USERID = '$id' ");

while($row = mysqli_fetch_array($query)){
	$data[] = $row['IMAGES'];
}


	echo json_encode($data);
	echo mysqli_error($con);

?>