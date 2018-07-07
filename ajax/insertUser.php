<?php
    require_once "../appdata/UserRepository.php";
    require_once "../vendor/autoload.php";
   try{
        $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
        $uR = new UserRepository($dbConn);
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setSubID($_POST['subid']);
        $dbConn->closeConnection();
    }catch (UserException $msg){
        echo $msg->getMessage();
    }
?>