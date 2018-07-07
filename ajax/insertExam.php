<?php
    include_once '../appdata/ExamsRepository.php';
	try{



		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$eR = new ExamsRepository($dbConn);
		$exams = new Exams();
		$exams->setExamName($_POST['name']);
		$exams->setExamStartDateAndTime($_POST['stdt']);
		$exams->setExamEndDateAndTIme($_POST['endt']);
		$exams->setCourseID($_POST['courseid']);
		echo $eR->insertExam($exams);
		$dbConn->closeConnection();
	}catch(examsException $msg){
		echo $msg->getMessage();
	}
?>
