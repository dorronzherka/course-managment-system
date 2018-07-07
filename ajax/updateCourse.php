<?php
 include_once "../appdata/CourseRepository.php";
 try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $cR = new CourseRepository($dbConn);
    $course = new Course();
    $course->setCourseID($_POST['CourseID']);
    $course->setName($_POST['Name']);
    $course->setCost($_POST['Cost']);
    $course->setDepartmentID($_POST['DepartmentID']);
    $cR->editCourse($course);
    $dbConn->closeConnection();
 }catch (CourseException $msg){
     echo json_encode(array(
         "error" => $msg->getMessage()
     ));
 }
?>