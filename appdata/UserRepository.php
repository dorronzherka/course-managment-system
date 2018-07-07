<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 12/28/17
 * Time: 8:04 PM
 */

require_once  "DatabaseConnection.php";
require_once  "User.php";
class UserRepository
{
    private  $dbConn;

    public  function  __construct(DatabaseConnection $dbConn)
    {
        try{
            $this->dbConn = $dbConn->getDatabaseConnectionInstance();
        }catch (DatabaseConnectionException $msg){
            throw new UserException($msg->getMessage());
        }
    }


    public  function  getAllUsersAsJson(){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Users");
            $query->execute();
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $msg){
            throw  new UserException($msg->getMessage());
        }
    }

    public  function  addUser(User $user){
        try{
            $query = $this->dbConn->prepare("INSERT INTO Users(SubID,Email) VALUES(:SubID , :Email)");
            $query->execute(array(
                ":SubID" => $user->getSubID(),
                ":Email" => $user->getEmail()
            ));
        }catch (Exception $msg){
            throw  new UserException($msg->getMessage());
        }
    }
}