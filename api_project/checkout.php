<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$id = $_GET['id'];

$stmt = mysqli_query($con, "SELECT * FROM tblorder WHERE USERID = '$id'");


while($row = mysqli_fetch_array($stmt)){

$ORDERID	=$row['ORDERID'];	
$PROID	=$row['PROID'];	
$ORDEREDQTY	=$row['ORDEREDQTY'];	
$ORDEREDPRICE	=$row['ORDEREDPRICE'];	
$ORDERSTATS	= 'ToBeRecieve';	
$USERID	=$row['USERID'];	


    $query = mysqli_query($con ,"UPDATE tblorder SET
                                        PROID = '$PROID',
                                        ORDEREDQTY	 = '$ORDEREDQTY',
                                        ORDEREDPRICE = '$ORDEREDPRICE',
                                        ORDERSTATS = '$ORDERSTATS',
                                        USERID = '$USERID'
                                        WHERE ORDERID= '$ORDERID'");

}


    $query = "INSERT INTO tblsummary (ORDEREDDATE,CUSTOMERID,ORDEREDNUM,DELFEE,PAYMENT,PAYMENTMETHOD, ORDEREDSTATS, ORDEREDREMARKS, CLAIMEDDATE, HVIEW, USERID) 
    VALUES('','$USERID','$ORDERID','','$ORDEREDPRICE','', '$ORDERSTATS', '', '', '', '')"; 


if($query){
    http_response_code(201);
    $message['status'] = "SUCCESS";
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

    print json_encode($message);
    mysqli_close($con);

?>








