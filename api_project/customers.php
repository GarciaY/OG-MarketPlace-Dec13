<?php
class Customer{
// dbection
private $db;
// Table
private $db_table = "tblcustomer";
// Columns
public $customerid;
public $firstname;
public $lastname;
public $email;
public $contactnumber;
public $address;
public $password;
public $userphoto;
public $datejoin;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getCustomers(){
$sqlQuery = "SELECT customerid, firstname, lastname, email, contactnumber, address, password, userphoto, datejoin FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createCustomer(){
$this->firstname=htmlspecialchars(strip_tags($this->firstname));
$this->lastname=htmlspecialchars(strip_tags($this->lastname));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->contactnumber=htmlspecialchars(strip_tags($this->contactnumber));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->userphoto=htmlspecialchars(strip_tags($this->userphoto));
$this->datejoin=htmlspecialchars(strip_tags($this->datejoin));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET firstname = '".$this->firstname."',
lastname = '".$this->lastname."',
email = '".$this->email."',
contactnumber = '".$this->contactnumber."',
address = '".$this->address."',
password = '".$this->password."',
userphoto = '".$this->userphoto."',
datejoin = '".$this->datejoin."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleCustomer(){
$sqlQuery = "SELECT customerid, firstname, lastname, email, contactnumber, address, password, userphoto, datejoin FROM
". $this->db_table ." WHERE customerid = ".$this->customerid;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->firstname = $dataRow['firstname'];
$this->lastname = $dataRow['lastname'];
$this->email = $dataRow['email'];
$this->contactnumber = $dataRow['contactnumber'];
$this->address = $dataRow['address'];
$this->password = $dataRow['password'];
$this->userphoto = $dataRow['userphoto'];
$this->datejoin = $dataRow['datejoin'];
}

// UPDATE
public function updateCustomer(){
$this->firstname=htmlspecialchars(strip_tags($this->firstname));
$this->lastname=htmlspecialchars(strip_tags($this->lastname));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->contactnumber=htmlspecialchars(strip_tags($this->contactnumber));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->userphoto=htmlspecialchars(strip_tags($this->userphoto));
$this->datejoin=htmlspecialchars(strip_tags($this->datejoin));
$this->customerid=htmlspecialchars(strip_tags($this->customerid));

$sqlQuery = "UPDATE ". $this->db_table ." SET firstname = '".$this->firstname."',
lastname = '".$this->lastname."',
email = '".$this->email."',
contactnumber = '".$this->contactnumber."',
address = '".$this->address."',
password = '".$this->password."',
userphoto = '".$this->userphoto."',
datejoin = '".$this->datejoin."'
WHERE customerid = ".$this->customerid;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteCustomer(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE customerid = ".$this->customerid;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>