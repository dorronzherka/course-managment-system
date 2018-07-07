<?php 
	include_once '../appdata/DepartmentRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		$dep = new Department();
		$dep->setDepartamentID($_POST['id']);
		$dep->setName($_POST['name']);
		$dep->setDescription($_POST['desc']);
		$dR->editDepartment($dep);
		$dbConn->closeConnection();
	}catch(DepartmentException $msg){
		json_encode(array(
			"error" => $msg->getMessage()
		));
	}
 ?>