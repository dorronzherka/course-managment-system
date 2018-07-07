<?php
include_once '../appdata/CourseRepository.php';
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $cR = new CourseRepository($dbConn);
    echo json_encode($cR->getTheLastInsertedId());
    $dbConn->closeConnection();
}catch(CourseException $msg){
    echo $msg->getMessage();
}

?>