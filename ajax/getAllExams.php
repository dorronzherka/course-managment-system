<?php 
require_once '../appdata/ExamsRepository.php';
try{
	$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
	$eR = new ExamsRepository($dbConn);
	$exams = $eR->getAllExams();
	$dbConn->closeConnection();
	echo $exams;
}catch(examsException $msg){
	echo $msg->getMessage();
}
?>
