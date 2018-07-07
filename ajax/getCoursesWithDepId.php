<?php
include_once '../appdata/CourseRepository.php';
try{
    //vlera e qelsit prej ku ka mi marr kurset
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $cR = new CourseRepository($dbConn);
    $depId = $_POST['id'];
    $courses = $cR->getCoursesFromDepId($depId);
    $dbConn->closeConnection();
    echo $courses;
}catch(CourseException $msg){
    echo $msg->getMessage();
}

?>