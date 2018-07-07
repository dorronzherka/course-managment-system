<?php

include_once '../appdata/ExamPointsRepository.php';
try{
$startPoint = intval($_POST['startPoint']);
$dbConn = new DatabaseConnection("127.0.0.1","cms","admin1","admin1");
$epR=new ExamPointsRepository($dbConn);
$ep=new ExamPoints();
$eps=$epR->getAllExamPointsWithLimit($startPoint);
$data=array(
  "ExamPoints"=>$ep,
  "nrExamPoints"=>$epR->getNumbersExamPoints()
);
echo json_encode($data);
$dbConn->closeConnection();
}
catch(Exception $msg){
  json_encode(array(
    "error"=>$msg->getMessage()
  ));
}
 ?>
