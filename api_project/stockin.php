<?php
class Stockin{
// dbection
private $db;
// Table
private $db_table = "tblstockin"; // coconut
// Columns
public $STOCKINID;
public $STOCKDATE;
public $PROID;
public $STOCKQTY;
public $STOCKPRICE;
public $USERID;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getStockin(){
$sqlQuery = "SELECT STOCKINID, STOCKDATE, PROID, STOCKQTY, STOCKPRICE, USERID FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createStockin(){
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->STOCKDATE=htmlspecialchars(strip_tags($this->STOCKDATE));
$this->STOCKQTY=htmlspecialchars(strip_tags($this->STOCKQTY));
$this->STOCKPRICE=htmlspecialchars(strip_tags($this->STOCKPRICE));
$this->USERID=htmlspecialchars(strip_tags($this->USERID));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET PROID = '".$this->PROID."',
STOCKDATE = '".$this->STOCKDATE."',
STOCKQTY = '".$this->STOCKQTY."',
STOCKPRICE = '".$this->STOCKPRICE."',
USERID = '".$this->USERID."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSingleStockin(){
$sqlQuery = "SELECT STOCKINID, STOCKDATE, PROID, STOCKQTY, STOCKPRICE, USERID FROM
". $this->db_table ." WHERE STOCKINID = ".$this->STOCKINID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->PROID = $dataRow['PROID'];
$this->STOCKDATE = $dataRow['STOCKDATE'];
$this->STOCKQTY = $dataRow['STOCKQTY'];
$this->STOCKPRICE = $dataRow['STOCKPRICE'];
$this->USERID = $dataRow['USERID'];
}

// UPDATE
public function updateStockin(){
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->STOCKDATE=htmlspecialchars(strip_tags($this->STOCKDATE));
$this->STOCKQTY=htmlspecialchars(strip_tags($this->STOCKQTY));
$this->STOCKPRICE=htmlspecialchars(strip_tags($this->STOCKPRICE));
$this->USERID=htmlspecialchars(strip_tags($this->USERID));

$sqlQuery = "UPDATE ". $this->db_table ." SET PROID = '".$this->PROID."',
STOCKDATE = '".$this->STOCKDATE."',
STOCKQTY = '".$this->STOCKQTY."',
STOCKPRICE = '".$this->STOCKPRICE."',
USERID = '".$this->USERID."'
WHERE STOCKINID = ".$this->STOCKINID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteStockin(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE STOCKINID = ".$this->STOCKINID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>