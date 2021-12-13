<?php
class Wishlist{
// dbection
private $db;
// Table
private $db_table = "tblwishlist"; // coconut
// Columns
public $id;
public $CUSID;
public $PROID;
public $WISHDATE;
public $WISHSTATS;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getWishlist(){
$sqlQuery = "SELECT id, CUSID, PROID, WISHDATE, WISHSTATS FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createWishlist(){
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->CUSID=htmlspecialchars(strip_tags($this->CUSID));
$this->WISHDATE=htmlspecialchars(strip_tags($this->WISHDATE));
$this->WISHSTATS=htmlspecialchars(strip_tags($this->WISHSTATS));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET PROID = '".$this->PROID."',
CUSID = '".$this->CUSID."',
WISHDATE = '".$this->WISHDATE."',
WISHSTATS = '".$this->WISHSTATS."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSingleWishlist(){
$sqlQuery = "SELECT id, CUSID, PROID, WISHDATE, WISHSTATS FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->PROID = $dataRow['PROID'];
$this->CUSID = $dataRow['CUSID'];
$this->WISHDATE = $dataRow['WISHDATE'];
$this->WISHSTATS = $dataRow['WISHSTATS'];
}

// UPDATE
public function updateWishlist(){
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->CUSID=htmlspecialchars(strip_tags($this->CUSID));
$this->WISHDATE=htmlspecialchars(strip_tags($this->WISHDATE));
$this->WISHSTATS=htmlspecialchars(strip_tags($this->WISHSTATS));

$sqlQuery = "UPDATE ". $this->db_table ." SET PROID = '".$this->PROID."',
CUSID = '".$this->CUSID."',
WISHDATE = '".$this->WISHDATE."',
WISHSTATS = '".$this->WISHSTATS."'
WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteWishlist(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>