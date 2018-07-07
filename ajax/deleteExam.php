<?php
  $delId;

  if(isset($_POST['id'])){
    die();
  }
  $delId=$_POST['id'];
  include_once '../appdata/ExamsRepository.php';
  try{
    $dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
    $eR= new ExamsRepository($dbConn);
    $eR->deleteExam($delId);
    $dbConn->closeConnection();

  }catch(examsException $msg){
    if(strpos($msg->getMessage(),"1451")==true){
      echo json_encode(array(
          "error" => "You cannot delete this data because is in use!"
      ));
    }
    else{
      echo $msg->getMessage();
    }
  }

 ?>
