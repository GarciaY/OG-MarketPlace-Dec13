<?php
class Product{
// dbection
private $db;
// Table
private $db_table = "tblproduct";
// Columns
public $PROID;
public $PRODESC;
public $INGREDIENTS;
public $PROQTY;
public $ORIGINALPRICE;
public $PROPRICE;
public $CATEGID;
public $IMAGES;
public $PROSTATS;
public $OWNERNAME;
public $OWNERPHONE;
// Db dbection just wan kay baaaaals
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getProduct(){
$sqlQuery = "SELECT PROID, PRODESC, INGREDIENTS, PROQTY, ORIGINALPRICE, PROPRICE, CATEGID, IMAGES, PROSTATS, OWNERNAME, OWNERPHONE FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createProduct(){
$this->PRODESC=htmlspecialchars(strip_tags($this->PRODESC));
$this->INGREDIENTS=htmlspecialchars(strip_tags($this->INGREDIENTS));
$this->PROQTY=htmlspecialchars(strip_tags($this->PROQTY));
$this->ORIGINALPRICE=htmlspecialchars(strip_tags($this->ORIGINALPRICE));
$this->PROPRICE=htmlspecialchars(strip_tags($this->PROPRICE));
$this->CATEGID=htmlspecialchars(strip_tags($this->CATEGID));
$this->IMAGES=htmlspecialchars(strip_tags($this->IMAGES));
$this->PROSTATS=htmlspecialchars(strip_tags($this->PROSTATS));
$this->OWNERNAME=htmlspecialchars(strip_tags($this->OWNERNAME));
$this->OWNERPHONE=htmlspecialchars(strip_tags($this->OWNERPHONE));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET PRODESC = '".$this->PRODESC."',
INGREDIENTS = '".$this->INGREDIENTS."',
PROQTY = '".$this->PROQTY."',
ORIGINALPRICE = '".$this->ORIGINALPRICE."',
PROPRICE = '".$this->PROPRICE."',
CATEGID = '".$this->CATEGID."',
IMAGES = '".$this->IMAGES."',
PROSTATS = '".$this->PROSTATS."',
OWNERNAME = '".$this->OWNERNAME."',
OWNERPHONE = '".$this->OWNERPHONE."'";

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleProduct(){
$sqlQuery = "SELECT PROID, PRODESC, INGREDIENTS, PROQTY, ORIGINALPRICE, PROPRICE, CATEGID, IMAGES, PROSTATS, OWNERNAME, OWNERPHONE FROM
". $this->db_table ." WHERE PROID = ".$this->PROID;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->PRODESC = $dataRow['PRODESC'];
$this->INGREDIENTS = $dataRow['INGREDIENTS'];
$this->PROQTY = $dataRow['PROQTY'];
$this->ORIGINALPRICE = $dataRow['ORIGINALPRICE'];
$this->PROPRICE = $dataRow['PROPRICE'];
$this->CATEGID = $dataRow['CATEGID'];
$this->IMAGES = $dataRow['IMAGES'];
$this->PROSTATS = $dataRow['PROSTATS'];
$this->OWNERNAME = $dataRow['OWNERNAME'];
$this->OWNERPHONE = $dataRow['OWNERPHONE'];
}

// UPDATE
public function updateProduct(){
$this->PRODESC=htmlspecialchars(strip_tags($this->PRODESC));
$this->INGREDIENTS=htmlspecialchars(strip_tags($this->INGREDIENTS));
$this->PROQTY=htmlspecialchars(strip_tags($this->PROQTY));
$this->ORIGINALPRICE=htmlspecialchars(strip_tags($this->ORIGINALPRICE));
$this->PROPRICE=htmlspecialchars(strip_tags($this->PROPRICE));
$this->CATEGID=htmlspecialchars(strip_tags($this->CATEGID));
$this->IMAGES=htmlspecialchars(strip_tags($this->IMAGES));
$this->PROSTATS=htmlspecialchars(strip_tags($this->PROSTATS));
$this->OWNERNAME=htmlspecialchars(strip_tags($this->OWNERNAME));
$this->OWNERPHONE=htmlspecialchars(strip_tags($this->OWNERPHONE));
$this->PROID=htmlspecialchars(strip_tags($this->PROID));

$sqlQuery = "UPDATE ". $this->db_table ." SET PRODESC = '".$this->PRODESC."',
INGREDIENTS = '".$this->INGREDIENTS."',
PROQTY = '".$this->PROQTY."',
ORIGINALPRICE = '".$this->ORIGINALPRICE."',
PROPRICE = '".$this->PROPRICE."',
CATEGID = '".$this->CATEGID."',
IMAGES = '".$this->IMAGES."',
PROSTATS = '".$this->PROSTATS."',
OWNERNAME = '".$this->OWNERNAME."',
OWNERPHONE = '".$this->OWNERPHONE."'
WHERE PROID = ".$this->PROID;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteProduct(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE PROID = ".$this->PROID;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>