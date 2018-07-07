<?php

include_once '../appdata/ExamPointsRepository.php';

try{
  $dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
  $epR= new ExamPointsRepository($dbConn);
  echo $epR->getAllExamPointsAsJsonString();
  $dbConn->closeConnection();
}catch(ExamPointsException $msg){
  echo $msg->getMessage();
}
 ?>
