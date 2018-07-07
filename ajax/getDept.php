<?php
	include_once '../appdata/DepartmentRepository.php';
	try{
        $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		echo $dR->getDepartmentFromId($_POST["id"]);
		$dbConn->closeConnection();
	}catch(DepartmentException $msg){
		echo json_encode(array(
			"error" => $msg->getMessage()
		));
	}

 ?>