<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/4/18
 * Time: 9:57 AM
 */
    require_once "../appdata/TeacherRepository.php";

    try{
        $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
        $tR = new TeacherRepository($dbConn);
        $tR->deleteTeacher($_POST['id']);
    }catch (TeacherException $msg){
        echo $msg->getMessage();
    }
?>