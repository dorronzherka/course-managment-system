<?php
  include_once '../appdata/ExamPointsRepository.php';
  try{
    $dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
    $epR= new ExamPointsRepository($dbConn);
    echo $epR->getExamPointFromId($_POST["id"]);
    $dbConn->closeConnection();
  }catch(ExamPointsException $msg){
    echo json_encode(array(
			"error" => $msg->getMessage()
		));
  }
 ?>
