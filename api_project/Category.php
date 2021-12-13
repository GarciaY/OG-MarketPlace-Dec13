<?php
  class Category {
    // DB Stuff
    private $db;
    private $db_table = 'tblcategory';

    // Properties
    public $CATEGID;
    public $CATEGORIES;
    public $USERID;

    // Constructor with DB
  public function __construct($db){
  $this->db = $db;
  }

    //GET ALL MOTHAFUCKA
    public function getCategory(){
    $sqlQuery = "SELECT CATEGID, CATEGORIES, USERID FROM " . $this->db_table . "";
    $this->result = $this->db->query($sqlQuery);
    return $this->result;
    }

  //CREATE CATEGORY YO WASSAP
  public function createCategory(){
  $this->CATEGID=htmlspecialchars(strip_tags($this->CATEGID));
  $this->CATEGORIES=htmlspecialchars(strip_tags($this->CATEGORIES));
  $this->USERID=htmlspecialchars(strip_tags($this->USERID));
  $sqlQuery = "INSERT INTO
  ". $this->db_table ." SET CATEGORIES = '".$this->CATEGORIES."',
  USERID = '".$this->USERID."'";
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }

  //GET SINGLE CATEGORY
  public function getSingleCategory(){
  $sqlQuery = "SELECT CATEGID, CATEGORIES, USERID FROM
  ". $this->db_table ." WHERE CATEGID = ".$this->CATEGID;
  $record = $this->db->query($sqlQuery);
  $dataRow=$record->fetch_assoc();
  $this->CATEGID = $dataRow['CATEGID'];
  $this->CATEGORIES = $dataRow['CATEGORIES'];
  $this->USERID = $dataRow['USERID'];
  }
  
  // UPDATE CATEGORY
  public function updateCategory(){
  $this->CATEGID=htmlspecialchars(strip_tags($this->CATEGID));
  $this->CATEGORIES=htmlspecialchars(strip_tags($this->CATEGORIES));
  $this->USERID=htmlspecialchars(strip_tags($this->USERID));

  $sqlQuery = "UPDATE ". $this->db_table ." SET CATEGORIES = '".$this->CATEGORIES."',
  USERID = '".$this->USERID."' 
  WHERE CATEGID = ".$this->CATEGID;
  
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }

  //DELETE ERASE THIS FROM THA WORLD MOTHAFUCKA 8==D ñ

  function deleteCategory(){
  $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE CATEGID = ".$this->CATEGID;
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }
  }
?>