<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/3/18
 * Time: 2:23 PM
 */

require_once "../appdata/StudentRepository.php";
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new StudentRepository($dbConn);
    echo $tR->getStudent($_POST['id']);
}catch (StudentException $msg){
    echo $msg->getMessage();
}
?>