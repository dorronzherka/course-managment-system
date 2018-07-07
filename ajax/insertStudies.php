<?php 
	require_once '../appdata/DatabaseConnection.php';
	require_once '../appdata/StudiesRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$sR = new StudiesRepository($dbConn);
		$studies = new Studies();
		$studies->setCourseID($_POST['courseid']);
		$studies->setStudentID($_POST['studentid']);
		$sR->insertStudies($studies);
	}catch(StudiesException $msg){
		echo json_encode(array("error" => $msg->getMessage()));
	}
 ?>