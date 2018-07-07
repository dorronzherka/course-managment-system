<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 10:00 PM
 */
require_once "../appdata/TeacherRepository.php";
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new TeacherRepository($dbConn);
    $teacher = new Teacher();
    $teacher->setTeacherID($_POST['teacherID']);
    $teacher->setFirstName($_POST['firstName']);
    $teacher->setLastName($_POST['lastName']);
    $teacher->setEmail($_POST['email']);
    $teacher->setAddress($_POST['address']);
    $teacher->setCity($_POST['city']);
    $teacher->setDateOfBirth($_POST['dateOfBirth']);
    $teacher->setGender($_POST['gender']);
    $teacher->setPhoneNumber($_POST['phoneNumber']);
    $teacher->setProfileImage($_POST['profileImage']);

    if(isset($_POST['profileImage'])){
        $teacher->setProfileImage($_POST['profileImage']);
        $tR->updateTeacherWithImage($teacher);
    }else{
        $tR->updateTeacherWithImage($teacher);
    }

    $dbConn->closeConnection();
}catch (TeacherException $msg){
    echo $msg->getMessage();
}
?>