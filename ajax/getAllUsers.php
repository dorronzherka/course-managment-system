<?php
    require_once "../appdata/UserRepository.php";
    try{
        $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
        $uR = new UserRepository($dbConn);
        echo $uR->getAllUsersAsJson();
        $dbConn->closeConnection();
    }catch (UserException $msg){
        echo $msg->getMessage();
    }
?>