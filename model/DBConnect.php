<?php 

class DBConnect{
  private $conn = null;
  private $stsm = null;
  function __construct($dbname='cuacuon',$username='root',$password=''){
    $dsn = "mysql:dbname=$dbname;host=localhost";
    try{
      $this->conn = new PDO($dsn,$username,$password);
      $this->conn->exec('SET NAMES utf8');
    }
    catch(PDOException $e){
      echo $e->getMessage();
      die;

    }
  }
  //hàm update/delete/insert
  function executeQuery($sql,$options=[]){
    $this->stsm = $this->conn->prepare($sql);
    if(count($options) > 0 || !empty($options)){
      return $this->stsm->execute($options);
    };
    return $this->stsm->execute();
  }
  //hàm lấy nhiều dòng
  function getMoreRows($sql){
    $check = $this->executeQuery($sql);
    if($check){
      return $this->stsm->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
  }
  function getOneRow($sql){
    $check = $this->executeQuery($sql);
    if($check){
      return $this->stsm->fetch(PDO::FETCH_OBJ);
    }
    return false;
  }

  // Hfam lấy id vừa mới insert
  function getIdInsert(){
        return $this->conn->lastInsertId();
  }


}
?>