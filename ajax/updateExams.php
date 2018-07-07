<?php 
	include_once '../inc/ExamsRepository.php';
	try{
	$dbConn = new DatabaseConnection("localhost", "cms", "admin1", "admin1");
		$eR = new ExamsRepository($dbConn);
		$exa = new Exams();
		$exa->setExamID($_POST['id']);
		$exa->setExamName($_POST['name']);
        $exa->setExamEndDateAndTIme($_POST['stdt']);
        $exa->setExamEndDateAndTIme($_POST['endt']);
        $exa->setCourseID($_POST['id']);
		$eR->editDepartment($exa);
		$dbConn->closeConnection();
	}catch(ExamsException $msg){
		json_encode(array(
			"error" => $msg->getMessage
		));
	}
 ?>

 setExamID($id)

 setExamName($name)

 setExamStartDateAndTime($stdt)

 setExamEndDateAndTIme($endt)

 setCourseID