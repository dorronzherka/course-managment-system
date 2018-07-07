<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 10:00 PM
 */
require_once "../appdata/EmployeeRepository.php";
try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new EmployeeRepository($dbConn);
    $Employee = new Employee();
    $Employee->setFirstName($_POST['firstName']);
    $Employee->setLastName($_POST['lastName']);
    $Employee->setEmail($_POST['email']);
    $Employee->setAddress($_POST['address']);
    $Employee->setCity($_POST['city']);
    $Employee->setDateOfBirth($_POST['dateOfBirth']);
    $Employee->setGender($_POST['gender']);
    $Employee->setPhoneNumber($_POST['phoneNumber']);
    $Employee->setProfileImage($_POST['profileImage']);
    $Employee->setJob($_POST['job']);
    echo $tR->addEmployee($Employee);
    $dbConn->closeConnection();
}catch (EmployeeException $msg){
    echo $msg->getMessage();
}
?>