<?php
class Promopro{
// dbection
private $db;
// Table
private $db_table = "tblpromopro"; // coconut
// Columns
public $PROMOID;
public $PROID;
public $PRODISCOUNT;
public $PRODISPRICE;
public $PROBANNER;
public $PRONEW;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getPromopro(){
$sqlQuery = "SELECT PROMOID, PROID, PRODISCOUNT, PRODISPRICE, PROBANNER, PRONEW FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createPromopro(){
$this->PRODISCOUNT=htmlspecialchars(strip_tags($this->PRODISCOUNT));
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->PRODISPRICE=htmlspecialchars(strip_tags($this->PRODISPRICE));
$this->PROBANNER=htmlspecialchars(strip_tags($this->PROBANNER));
$this->PRONEW=htmlspecialchars(strip_tags($this->PRONEW));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET PRODISCOUNT = '".$this->PRODISCOUNT."',
PROID = '".$this->PROID."',
PRODISPRICE = '".$this->PRODISPRICE."',
PROBANNER = '".$this->PROBANNER."',
PRONEW = '".$this->PRONEW."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSinglePromopro(){
$sqlQuery = "SELECT PROMOID, PROID, PRODISCOUNT, PRODISPRICE, PROBANNER, PRONEW FROM
". $this->db_table ." WHERE PROMOID = ".$this->PROMOID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->PRODISCOUNT = $dataRow['PRODISCOUNT'];
$this->PROID = $dataRow['PROID'];
$this->PRODISPRICE = $dataRow['PRODISPRICE'];
$this->PROBANNER = $dataRow['PROBANNER'];
$this->PRONEW = $dataRow['PRONEW'];
}

// UPDATE
public function updatePromopro(){
$this->PRODISCOUNT=htmlspecialchars(strip_tags($this->PRODISCOUNT));
$this->PROID=htmlspecialchars(strip_tags($this->PROID));
$this->PRODISPRICE=htmlspecialchars(strip_tags($this->PRODISPRICE));
$this->PROBANNER=htmlspecialchars(strip_tags($this->PROBANNER));
$this->PRONEW=htmlspecialchars(strip_tags($this->PRONEW));

$sqlQuery = "UPDATE ". $this->db_table ." SET PRODISCOUNT = '".$this->PRODISCOUNT."',
PROID = '".$this->PROID."',
PRODISPRICE = '".$this->PRODISPRICE."',
PROBANNER = '".$this->PROBANNER."',
PRONEW = '".$this->PRONEW."'
WHERE PROMOID = ".$this->PROMOID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deletePromopro(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE PROMOID = ".$this->PROMOID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>