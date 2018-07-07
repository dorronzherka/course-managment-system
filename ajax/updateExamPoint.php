<?php

include_once '../appdata/ExamPointsRepository.php';
try{
  $dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
  $epR= new ExamPointsRepository($dbConn);
  $ep = new ExamPoints();
  $ep->setPoint($_POST['points']);
  $ep->setExamId($_POST['examId']);
  $ep->setStudentId($_POST['studentId']);
  $epR->editExamPoint();
}catch(ExamPointsException $msg){
  json_encode(array(
    "error" => $msg->getMessage()
  ));
}
 ?>
