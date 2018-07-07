<?php 
	include_once '../appdata/CourseRepository.php';
	try{
		//vlera e qelsit prej ku ka mi marr kurset
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$cR = new CourseRepository($dbConn);
		$courses = $cR->getCourses();
		$dbConn->closeConnection();
		echo json_encode($courses);
	}catch(CourseException $msg){
		echo $msg->getMessage();
	}

 ?>