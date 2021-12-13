<?php
class Order{
// dbection
private $db;
// Table
private $db_table = "tblorder"; // coconut
// Columns
public $ORDERID;
public $PROID;
public $ORDEREDQTY;
public $ORDEREDPRICE;
public $ORDEREDNUM;
public $USERID;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getOrder(){
$sqlQuery = "SELECT ORDERID, PROID, ORDEREDQTY, ORDEREDPRICE, ORDEREDNUM, USERID FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createOrder(){
$this->ORDEREDQTY=htmlspecialchars(strip_tags($this->ORDEREDQTY));
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->ORDEREDPRICE=htmlspecialchars(strip_tags($this->ORDEREDPRICE));
$this->ORDEREDNUM=htmlspecialchars(strip_tags($this->ORDEREDNUM));
$this->USERID=htmlspecialchars(strip_tags($this->USERID));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET ORDEREDQTY = '".$this->ORDEREDQTY."',
PROID = '".$this->PROID."',
ORDEREDPRICE = '".$this->ORDEREDPRICE."',
ORDEREDNUM = '".$this->ORDEREDNUM."',
USERID = '".$this->USERID."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSingleOrder(){
$sqlQuery = "SELECT ORDERID, PROID, ORDEREDQTY, ORDEREDPRICE, ORDEREDNUM, USERID FROM
". $this->db_table ." WHERE ORDERID = ".$this->ORDERID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->ORDEREDQTY = $dataRow['ORDEREDQTY'];
$this->PROID = $dataRow['PROID'];
$this->ORDEREDPRICE = $dataRow['ORDEREDPRICE'];
$this->ORDEREDNUM = $dataRow['ORDEREDNUM'];
$this->USERID = $dataRow['USERID'];
}

// UPDATE
public function updateOrder(){
$this->ORDEREDQTY=htmlspecialchars(strip_tags($this->ORDEREDQTY));
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->ORDEREDPRICE=htmlspecialchars(strip_tags($this->ORDEREDPRICE));
$this->ORDEREDNUM=htmlspecialchars(strip_tags($this->ORDEREDNUM));
$this->USERID=htmlspecialchars(strip_tags($this->USERID));

$sqlQuery = "UPDATE ". $this->db_table ." SET ORDEREDQTY = '".$this->ORDEREDQTY."',
PROID = '".$this->PROID."',
ORDEREDPRICE = '".$this->ORDEREDPRICE."',
ORDEREDNUM = '".$this->ORDEREDNUM."',
USERID = '".$this->USERID."'
WHERE ORDERID = ".$this->ORDERID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteOrder(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE ORDERID = ".$this->ORDERID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>