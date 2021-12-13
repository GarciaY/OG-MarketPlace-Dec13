<?php
class Employee{
// dbection
private $db;
// Table
private $db_table = "tbluseraccount"; // coconut
// Columns
public $USERID;
public $U_NAME;
public $U_USERNAME;
public $U_PASS;
public $U_ROLE;
public $USERIMAGE;


public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getEmployee(){
$sqlQuery = "SELECT USERID, U_NAME, U_USERNAME, U_PASS, U_ROLE, USERIMAGE FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createEmployee(){
$this->U_USERNAME=htmlspecialchars(strip_tags($this->U_USERNAME));
$this->U_NAME=htmlspecialchars(strip_tags($this->U_NAME));
$this->U_PASS=htmlspecialchars(strip_tags($this->U_PASS));
$this->U_ROLE=htmlspecialchars(strip_tags($this->U_ROLE));
$this->USERIMAGE=htmlspecialchars(strip_tags($this->USERIMAGE));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET U_USERNAME = '".$this->U_USERNAME."',
U_NAME = '".$this->U_NAME."',
U_PASS = '".$this->U_PASS."',
U_ROLE = '".$this->U_ROLE."',
USERIMAGE = '".$this->USERIMAGE."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// READ SINGLE
public function getSingleEmployee(){
$sqlQuery = "SELECT USERID, U_NAME, U_USERNAME, U_PASS, U_ROLE, USERIMAGE FROM
". $this->db_table ." WHERE USERID = ".$this->USERID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->U_USERNAME = $dataRow['U_USERNAME'];
$this->U_NAME = $dataRow['U_NAME'];
$this->U_PASS = $dataRow['U_PASS'];
$this->U_ROLE = $dataRow['U_ROLE'];
$this->USERIMAGE = $dataRow['USERIMAGE'];
}

// UPDATE
public function updateEmployee(){
$this->U_USERNAME=htmlspecialchars(strip_tags($this->U_USERNAME));
$this->U_NAME=htmlspecialchars(strip_tags($this->U_NAME));
$this->U_PASS=htmlspecialchars(strip_tags($this->U_PASS));
$this->U_ROLE=htmlspecialchars(strip_tags($this->U_ROLE));
$this->USERIMAGE=htmlspecialchars(strip_tags($this->USERIMAGE));

$sqlQuery = "UPDATE ". $this->db_table ." SET U_USERNAME = '".$this->U_USERNAME."',
U_NAME = '".$this->U_NAME."',
U_PASS = '".$this->U_PASS."',
U_ROLE = '".$this->U_ROLE."',
USERIMAGE = '".$this->USERIMAGE."'
WHERE USERID = ".$this->USERID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteEmployee(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE USERID = ".$this->USERID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>