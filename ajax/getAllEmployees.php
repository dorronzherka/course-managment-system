<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:27 PM
 */

require_once "../appdata/EmployeeRepository.php";

try{
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $tR = new EmployeeRepository($dbConn);
    echo $tR->getAllEmployeesAsJson();
    $dbConn->closeConnection();
}catch (EmployeeException $msg){
    echo $msg->getMessage();
}
?>