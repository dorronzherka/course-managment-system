<?php 
	include_once '../appdata/CourseRepository.php';
	try{
		//vlera e qelsit prej ku ka mi marr kurset
		$startPage = $_POST['startPoint'];
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$cR = new CourseRepository($dbConn);
		$courses = $cR->getCoursesWithLimit($startPage);
		$dbConn->closeConnection();
		echo json_encode($courses);
	}catch(CourseException $msg){
		echo $msg->getMessage();
	}

 ?>