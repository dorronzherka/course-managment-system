<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:27 PM
 */

require_once "../appdata/TeacherRepository.php";

try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new TeacherRepository($dbConn);
    $startingPoint = (int) $_POST['startingPoint'];
    echo $tR->getAllTeachersWithimLimitationAsJson($startingPoint,20);
    $dbConn->closeConnection();
}catch (TeacherException $msg){
    echo $msg->getMessage();
}
?>