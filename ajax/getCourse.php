<?php 
	include_once '../appdata/CourseRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$cR = new CourseRepository($dbConn);
		echo $cR->getCourseFromId($_POST['id']);
	}catch(CourseException $msg){
		echo $msg->getMessage();
	}

 ?>