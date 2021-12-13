<?php
class AutoNumber{
// dbection
private $db;
// Table
private $db_table = "tblautonumber"; // coconut
// Columns
public $ID;
public $AUTOSTART;
public $AUTOINC;
public $AUTOEND;
public $AUTOKEY;
public $AUTONUM;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getAutoNumber(){
$sqlQuery = "SELECT ID, AUTOSTART, AUTOINC, AUTOEND, AUTOKEY, AUTONUM FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createAutoNumber(){
$this->AUTOINC=htmlspecialchars(strip_tags($this->AUTOINC));
$this->AUTOSTART=htmlspecialchars(strip_tags($this->AUTOSTART));
$this->AUTOEND=htmlspecialchars(strip_tags($this->AUTOEND));
$this->AUTOKEY=htmlspecialchars(strip_tags($this->AUTOKEY));
$this->AUTONUM=htmlspecialchars(strip_tags($this->AUTONUM));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET AUTOINC = '".$this->AUTOINC."',
AUTOSTART = '".$this->AUTOSTART."',
AUTOEND = '".$this->AUTOEND."',
AUTOKEY = '".$this->AUTOKEY."',
AUTONUM = '".$this->AUTONUM."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSingleAutoNumber(){
$sqlQuery = "SELECT ID, AUTOSTART, AUTOINC, AUTOEND, AUTOKEY, AUTONUM FROM
". $this->db_table ." WHERE ID = ".$this->ID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->AUTOINC = $dataRow['AUTOINC'];
$this->AUTOSTART = $dataRow['AUTOSTART'];
$this->AUTOEND = $dataRow['AUTOEND'];
$this->AUTOKEY = $dataRow['AUTOKEY'];
$this->AUTONUM = $dataRow['AUTONUM'];
}

// UPDATE
public function updateAutoNumber(){
$this->AUTOINC=htmlspecialchars(strip_tags($this->AUTOINC));
$this->AUTOSTART=htmlspecialchars(strip_tags($this->AUTOSTART));
$this->AUTOEND=htmlspecialchars(strip_tags($this->AUTOEND));
$this->AUTOKEY=htmlspecialchars(strip_tags($this->AUTOKEY));
$this->AUTONUM=htmlspecialchars(strip_tags($this->AUTONUM));

$sqlQuery = "UPDATE ". $this->db_table ." SET AUTOINC = '".$this->AUTOINC."',
AUTOSTART = '".$this->AUTOSTART."',
AUTOEND = '".$this->AUTOEND."',
AUTOKEY = '".$this->AUTOKEY."',
AUTONUM = '".$this->AUTONUM."'
WHERE ID = ".$this->ID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteAutoNumber(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE ID = ".$this->ID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>