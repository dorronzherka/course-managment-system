<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:20 PM
 */
require_once "DatabaseConnection.php";
require_once "Student.php";
class StudentRepository
{
    private  $dbConn;


    public  function  __construct(DatabaseConnection $dbConn){
        try{
            $this->dbConn = $dbConn->getDatabaseConnectionInstance();
        }catch (DatabaseConnectionException $msg){
            throw  new StudentException($msg->getMessage());
        }
    }


    public function  getAllStudentsAsJson(){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Students");
            $query->execute();
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }

    public function  addStudent(Student $Student){
        try{
            $query = $this->dbConn->prepare("INSERT INTO Students (FirstName,LastName,DateOfBirth,Gender,Email,Address,City,PhoneNumber,profileImage) VALUES(:FirstName,:LastName,:DateOfBirth,:Gender,:Email,:Address,:City,:PhoneNumber,:profileImage)");
            $query->execute(array(
                ":FirstName" => $Student->getFirstName(),
                ":LastName"  => $Student->getLastName(),
                ":DateOfBirth" => $Student->getDateOfBirth(),
                ":Gender" => $Student->getGender(),
                ":Email" => $Student->getEmail(),
                ":Address" => $Student->getAddress(),
                ":City" => $Student->getCity(),
                ":PhoneNumber" => $Student->getPhoneNumber(),
                ":profileImage" => $Student->getProfileImage()
            ));
            return json_encode($this->dbConn->lastInsertId());
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }


    public  function  getStudent($id){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Students WHERE StudentID = :StudentID");
            $query->execute(array(
                ":StudentID" => $id
            ));

            return json_encode($query->fetch(PDO::FETCH_ASSOC));

        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }

    public  function  deleteStudent($id){
        try{
            $query  = $this->dbConn->prepare("DELETE FROM Students WHERE StudentID  = :StudentID");
            $query->execute(array(
                ":StudentID" => $id
            ));
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }

    public function  getImage($id){
        try{
            $query  = $this->dbConn->prepare("SELECT profileImage FROM Students WHERE StudentID = :StudentID");
            $query->execute(array(
                ":StudentID" => $id
            ));
            return $query->fetch(PDO::FETCH_ASSOC)['profileImage'];
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }

    public function  updateStudentWithImage(Student $Student){
        try{
            $query = $this->dbConn->prepare("UPDATE  Students SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber , profileImage = :profileImage WHERE StudentID = :StudentID");
            $query->execute(array(
                ":FirstName" => $Student->getFirstName(),
                ":LastName" => $Student->getLastName(),
                ":DateOfBirth" => $Student->getDateOfBirth(),
                ":Gender" => $Student->getGender(),
                ":Email" => $Student->getEmail(),
                ":Address" => $Student->getAddress(),
                ":City" => $Student->getCity(),
                ":PhoneNumber" => $Student->getPhoneNumber(),
                ":profileImage" => $Student->getProfileImage(),
                ":StudentID" => $Student->getStudentID()
            ));
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }

    public function  updateStudentWithoutImage(Student $Student){
        try{
            $query = $this->dbConn->prepare("UPDATE Students SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber  WHERE StudentID = :StudentID");
            $query->execute(array(
                ":FirstName" => $Student->getFirstName(),
                ":LastName" => $Student->getLastName(),
                ":DateOfBirth" => $Student->getDateOfBirth(),
                ":Gender" => $Student->getGender(),
                ":Email" => $Student->getEmail(),
                ":Address" => $Student->getAddress(),
                ":City" => $Student->getCity(),
                ":PhoneNumber" => $Student->getPhoneNumber(),
                ":StudentID" => $Student->getStudentID()
            ));
        }catch (Exception $msg){
            throw  new StudentException($msg->getMessage());
        }
    }
}

?>