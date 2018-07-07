<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 2:43 PM
 */

require_once "TeacherException.php";

class Teacher{

    private $TeacherID;
    private $FristName;
    private $LastName;
    private $DateOfBirth;
    private $Gender;
    private $Address;
    private $City;
    private $PhoneNumber;
    private $Email;
    private $profileImage;


    public  function  __construct(){}

    public  function  getTeacherID(){
        return $this->TeacherID;
    }

    public  function getFirstName(){
        return $this->FristName;
    }

    public  function getLastName(){
        return $this->LastName;
    }

    public  function  getDateOfBirth(){
        return $this->DateOfBirth;
    }

    public  function  getGender(){
        return $this->Gender;
    }

    public function  getAddress(){
        return $this->Address;
    }

    public  function  getCity(){
        return $this->City;
    }

    public  function  getPhoneNumber(){
        return $this->PhoneNumber;
    }

    public  function  getEmail(){
        return $this->Email;
    }

    public function  getProfileImage(){
        return $this->profileImage;
    }


    public function  setTeacherID($id){
        if(!filter_var($id,FILTER_VALIDATE_INT)){
            throw  new TeacherException("Teacher is not integer value please type integer value!");
        }
        $this->TeacherID = $id;
    }

    public  function setFirstName($firstName){
        if(!preg_match("/[A-Za-z]\w+/",$firstName))
            throw new TeacherException("First Name variable only accepts this charchters A-Z or a-z!");
        $this->FristName = $firstName;
    }

    public  function setLastName($lastName){
        if(!preg_match("/[A-Za-z]\w+/",$lastName))
            throw new TeacherException("Last name variable only accepts this charchters A-Z or a-z!");
        $this->LastName = $lastName;
    }

    public  function setAddress($adress){
        if(!preg_match("/[A-Za-z]\w+/",$adress))
            throw new TeacherException("Adress variable only accepts this charchters A-Z or a-z!");
        $this->Address = $adress;
    }

    public  function  setPhoneNumber($phone){
        if(!filter_var($phone,FILTER_VALIDATE_INT)){
            throw  new TeacherException("Phone number  is not integer value please type integer values!");
        }
        $this->PhoneNumber = $phone;

    }

    public  function setCity($city){
        if(!preg_match("/[A-Za-z]\w+/",$city))
            throw new TeacherException("City variable only accepts this charchters A-Z or a-z");
        $this->City = $city;
    }

    public  function  setGender($gender){
        $this->Gender = $gender;
    }

    public  function  setEmail($email){
        if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
            throw new TeacherException("Email variable only accepts this form type email@anyhost.com");
        }
        $this->Email = $email;
    }

    public  function  setDateOfBirth($date){

        $this->DateOfBirth = $date;
    }

    public  function  setProfileImage($img){
        $this->profileImage = $img;
    }
}