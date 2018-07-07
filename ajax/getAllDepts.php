<?php 
	include_once '../appdata/DepartmentRepository.php';
	try{
		$startPoint = $_POST['startPoint'] ;
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		$dep = new Department();
		$depts = $dR->getAllDeparmentsWithLimit($startPoint);
		$data =  array(
			"departmentet" => $depts,
			"nrDepertmenteve" => $dR->getNumbersDepts()
		);
		echo json_encode($data);
		$dbConn->closeConnection();	
	}catch(Exception $msg){
		json_encode(array(
			"error" => $msg->getMessage
		));
	}
 ?>