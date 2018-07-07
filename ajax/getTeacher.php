<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/3/18
 * Time: 2:23 PM
 */

    require_once "../appdata/TeacherRepository.php";
    try{
        $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
        $tR = new TeacherRepository($dbConn);
        echo $tR->getTeacher($_POST['id']);
    }catch (TeacherException $msg){
        echo $msg->getMessage();
    }
?>