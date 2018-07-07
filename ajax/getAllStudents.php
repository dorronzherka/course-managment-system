<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:27 PM
 */

require_once "../appdata/StudentRepository.php";

try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new StudentRepository($dbConn);
    echo $tR->getAllStudentsAsJson();
    $dbConn->closeConnection();
}catch (StudentException $msg){
    echo $msg->getMessage();
}
?>