<?php 
	include_once '../appdata/CourseRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$cR = new CourseRepository($dbConn);
		$course = new Course();
		$course->setName($_POST['name']);
		$course->setCost($_POST['cost']);
		$course->setDepartmentID($_POST['departmentID']);
		echo $cR->addCourses($course);
		$dbConn->closeConnection();
	}catch(CourseException $msg){
		echo $msg->getMessage();
	}
 ?>