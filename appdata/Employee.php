<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 2:43 PM
 */

require_once "EmployeeException.php";

class Employee{

    private $EmployeeID;
    private $FristName;
    private $LastName;
    private $DateOfBirth;
    private $Gender;
    private $Address;
    private $City;
    private $PhoneNumber;
    private $Email;
    private $profileImage;
    private $Job;


    public  function  __construct(){}

    public  function  getEmployeeID(){
        return $this->EmployeeID;
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

    public  function  getJob(){
        return $this->Job;
    }

    public function  setEmployeeID($id){
        if(!filter_var($id,FILTER_VALIDATE_INT)){
            throw  new EmployeeException("Employee is not integer value please type integer value!");
        }
        $this->EmployeeID = $id;
    }

    public  function setFirstName($firstName){
        if(!preg_match("/[A-Za-z]\w+/",$firstName))
            throw new EmployeeException("First Name variable only accepts this charchters A-Z or a-z!");
        $this->FristName = $firstName;
    }

    public  function setLastName($lastName){
        if(!preg_match("/[A-Za-z]\w+/",$lastName))
            throw new EmployeeException("Last name variable only accepts this charchters A-Z or a-z!");
        $this->LastName = $lastName;
    }

    public  function setAddress($adress){
        if(!preg_match("/[A-Za-z]\w+/",$adress))
            throw new EmployeeException("Adress variable only accepts this charchters A-Z or a-z!");
        $this->Address = $adress;
    }

    public  function  setPhoneNumber($phone){
        if(!filter_var($phone,FILTER_VALIDATE_INT)){
            throw  new EmployeeException("Phone number  is not integer value please type integer values!");
        }
        $this->PhoneNumber = $phone;

    }

    public  function setCity($city){
        if(!preg_match("/[A-Za-z]\w+/",$city))
            throw new EmployeeException("City variable only accepts this charchters A-Z or a-z");
        $this->City = $city;
    }

    public  function  setGender($gender){
        $this->Gender = $gender;
    }

    public  function  setEmail($email){
        if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
            throw new EmployeeException("Email variable only accepts this form type email@anyhost.com");
        }
        $this->Email = $email;
    }

    public  function  setDateOfBirth($date){

        $this->DateOfBirth = $date;
    }

    public  function  setProfileImage($img){
        $this->profileImage = $img;
    }

    public  function  setJob($job){
        $this->Job = $job;
    }
}