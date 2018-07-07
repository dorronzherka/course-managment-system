<?php
include_once '../appdata/ExamPointsRepository.php';
try {
  $dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
  $epR= new ExamPointsRepository($dbConn);
  $ep=new ExamPoints();
  $ep->setPoint($_POST['points']);
  $ep->setExamId($_POST['examId']);
  $ep->setStudentId($_POST['studentId']);
  echo $epR->addExamPoints($ep);
} catch (ExamPointsException $msg) {
  if(strpos($msg->getMessage(),"1062 ") == true){
          echo json_encode(array("error" =>"You cannot add duplicate departments!"));
      }else{
           echo $msg->getMessage();
      }
}

 ?>
