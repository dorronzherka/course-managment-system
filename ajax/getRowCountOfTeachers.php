<?php
include_once '../appdata/TeacherRepository.php';
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new TeacherRepository($dbConn);
    $arr = array("length" =>$tR->getRowCountOfTeachers());
    echo json_encode($arr);
    $dbConn->closeConnection();
}catch(Exception $msg){
    echo json_encode(array(
        "error" => $msg->getMessage()
    ));
}

?>