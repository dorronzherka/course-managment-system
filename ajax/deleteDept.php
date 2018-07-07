<?php 
	$delId;
	if(!isset($_POST['id'])){
		die();
	}
	$delId = $_POST['id'];
	include_once '../appdata/DepartmentRepository.php';
	try{
		$dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
		$dR = new DepartmentRepository($dbConn);
		$dR->deleteDepartment($delId);
		$dbConn->closeConnection();
	}catch(DepartmentException $msg){
        if(strpos($msg->getMessage() , "1451") == true){
            echo json_encode(array(
                "errorr" => "You cannot delete this data because is in use!"
            ));
        }else{
            echo  $msg->getMessage();

        }
	}
 ?>