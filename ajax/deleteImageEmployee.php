<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/3/18
 * Time: 2:23 PM
 */

require_once "../appdata/EmployeeRepository.php";
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new EmployeeRepository($dbConn);
    $img = $tR->getImage($_POST['id']);
    $dir = "../assets/img/profileImages/";
    $imgDelete = $dir.basename($img);
    echo $imgDelete;
    unlink($imgDelete);
}catch (EmployeeException $msg){
    echo $msg->getMessage();
}
?>