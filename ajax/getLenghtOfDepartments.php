<?php
include_once '../appdata/DepartmentRepository.php';
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $dR = new DepartmentRepository($dbConn);
    $array = array(
        "numofdep" => $dR->getNumbersDepts()
    );
    echo json_encode($array);
    $dbConn->closeConnection();
}catch(CourseException $msg){
    echo $msg->getMessage();
}

?>