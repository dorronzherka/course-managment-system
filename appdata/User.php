<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 12/28/17
 * Time: 7:30 PM
 */

include_once "UserException.php";
class User
{
    private $UserID;
    private $SubID;
    private $Email;
    private $TeacherID;
    private  $StudentID;


    public  function  __construct()
    {
    }

    public  function  getUserID(){
        return $this->UserID;
    }

    public  function  getSubID(){
        return $this->SubID;
    }

    public  function  getEmail(){
        return $this->Email;
    }

    public  function  getTeacherID(){
        return $this->TeacherID;
    }

    public function  getStudentID(){
        return $this->StudentID;
    }

    public  function  setUserID($userID){
        $this->UserID = $userID;
    }

    public  function  setSubID($subID){
        $this->SubID = $subID;
    }

    public  function  setEmail($Email){
        $this->Email = $Email;
    }

    public  function  setTeacherID($teacherID){
        $this->TeacherID = $teacherID;
    }

    public  function  setStudentID($studentID){
        $this->StudentID = $studentID;
    }

}

?>