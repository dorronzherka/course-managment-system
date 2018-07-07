<?php
	include_once '../appdata/DepartmentRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		$dep = new Department();
		$dep->setName($_POST['name']);
		$dep->setDescription($_POST['desc']);
		echo $dR->addDepartment($dep);
		$dbConn->closeConnection();		
	}catch(DepartmentException $msg){
		if(strpos($msg->getMessage(),"1062 ") == true){
            echo json_encode(array("error" =>"You cannot add duplicate departments!"));
        }else{
             echo $msg->getMessage();
        }
	}
?>