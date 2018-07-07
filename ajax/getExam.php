<?php
	include_once '../appdata/ExamsRepository.php';
	try{
	$dbConn = new DatabaseConnection("localhost", "cms", "admin1", "admin1");
		$cR = new ExamsRepository($dbConn);
		echo $cR->getExamFromId($_POST['id']);
	}catch(examsException $msg){
		echo $msg->getMessage();
	}

 ?>
