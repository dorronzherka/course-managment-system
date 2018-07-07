<?php 
	include_once '../appdata/DepartmentRepository.php';
	try{		
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		echo $dR->getAllDeparmentsAsJsonString();
		$dbConn->closeConnection();
	}catch(CourseException $msg){
		echo $msg->getMessage();
	}


 ?>