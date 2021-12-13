<?php
  class Setting {
    // DB Stuff
    private $db;
    private $db_table = 'tblsetting';

    // Properties
    public $SETTINGID;
    public $PLACE;
    public $BRGY;
    public $DELPRICE;

    // Constructor with DB
  public function __construct($db){
  $this->db = $db;
  }

    //GET ALL MOTHAFUCKA
    public function getSetting(){
    $sqlQuery = "SELECT SETTINGID, PLACE, BRGY, DELPRICE FROM " . $this->db_table . "";
    $this->result = $this->db->query($sqlQuery);
    return $this->result;
    }

  //CREATE CATEGORY YO WASSAP
  public function createSetting(){
  $this->SETTINGID=htmlspecialchars(strip_tags($this->SETTINGID));
  $this->PLACE=htmlspecialchars(strip_tags($this->PLACE));
  $this->BRGY=htmlspecialchars(strip_tags($this->BRGY));
  $this->DELPRICE=htmlspecialchars(strip_tags($this->DELPRICE));
  $sqlQuery = "INSERT INTO
  ". $this->db_table ." SET PLACE = '".$this->PLACE."',
  BRGY = '".$this->BRGY."'";
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }

  //GET SINGLE CATEGORY
  public function getSingleSetting(){
  $sqlQuery = "SELECT SETTINGID, PLACE, BRGY, DELPRICE FROM
  ". $this->db_table ." WHERE SETTINGID = ".$this->SETTINGID;
  $record = $this->db->query($sqlQuery);
  $dataRow=$record->fetch_assoc();
  $this->SETTINGID = $dataRow['SETTINGID'];
  $this->PLACE = $dataRow['PLACE'];
  $this->BRGY = $dataRow['BRGY'];
  $this->DELPRICE = $dataRow['DELPRICE'];
  }
  
  // UPDATE CATEGORY
  public function updateSetting(){
  $this->SETTINGID=htmlspecialchars(strip_tags($this->SETTINGID));
  $this->PLACE=htmlspecialchars(strip_tags($this->PLACE));
  $this->BRGY=htmlspecialchars(strip_tags($this->BRGY));
  $this->DELPRICE=htmlspecialchars(strip_tags($this->DELPRICE));

  $sqlQuery = "UPDATE ". $this->db_table ." SET PLACE = '".$this->PLACE."',
  BRGY = '".$this->BRGY."' 
  WHERE SETTINGID = ".$this->SETTINGID;
  
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }

  //DELETE ERASE THIS FROM THA WORLD MOTHAFUCKA 8==D ñ

  function deleteSetting(){
  $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE SETTINGID = ".$this->SETTINGID;
  $this->db->query($sqlQuery);
  if($this->db->affected_rows > 0){
  return true;
  }
  return false;
  }
  }
?>