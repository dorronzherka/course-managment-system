<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 10:00 PM
 */
require_once "../appdata/StudentRepository.php";
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new StudentRepository($dbConn);
    $Student = new Student();
    $Student->setFirstName($_POST['firstName']);
    $Student->setLastName($_POST['lastName']);
    $Student->setEmail($_POST['email']);
    $Student->setAddress($_POST['address']);
    $Student->setCity($_POST['city']);
    $Student->setDateOfBirth($_POST['dateOfBirth']);
    $Student->setGender($_POST['gender']);
    $Student->setPhoneNumber($_POST['phoneNumber']);
    $Student->setProfileImage($_POST['profileImage']);
    echo $tR->addStudent($Student);
    $dbConn->closeConnection();
}catch (StudentException $msg){
    echo $msg->getMessage();
}
?>