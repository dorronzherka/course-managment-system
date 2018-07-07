<?php
include_once '../appdata/CourseRepository.php';
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $cR = new CourseRepository($dbConn);
    $cR->deleteCourse($_POST['id']);
    $dbConn->closeConnection();
}catch(CourseException $msg){
    if(strpos($msg->getMessage() , "1451") == true){
        echo json_encode(array(
            "error" => "You cannot delete this data because is in use!"
        ));
    }else{
        echo  $msg->getMessage();

    }
}

?>