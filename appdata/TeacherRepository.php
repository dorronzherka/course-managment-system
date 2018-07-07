<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:20 PM
 */
require_once "DatabaseConnection.php";
require_once "Teacher.php";
class TeacherRepository
{
    private  $dbConn;


    public  function  __construct(DatabaseConnection $dbConn){
        try{
            $this->dbConn = $dbConn->getDatabaseConnectionInstance();
        }catch (DatabaseConnectionException $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }


    public function  getAllTeachersAsJson(){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Teachers");
            $query->execute();
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }

        public function  getAllTeachersWithimLimitationAsJson($startingPoint,$limit){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Teachers LIMIT :start , :limit");
            $query->bindParam(":start",$startingPoint,PDO::PARAM_INT);
            $query->bindParam(":limit",$limit,PDO::PARAM_INT);
            $query->execute();
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }


    public function  addTeacher(Teacher $teacher){
        try{
            $query = $this->dbConn->prepare("INSERT INTO Teachers (FirstName,LastName,DateOfBirth,Gender,Email,Address,City,PhoneNumber,profileImage) VALUES(:FirstName,:LastName,:DateOfBirth,:Gender,:Email,:Address,:City,:PhoneNumber,:profileImage)");
            $query->execute(array(
                ":FirstName" => $teacher->getFirstName(),
                ":LastName"  => $teacher->getLastName(),
                ":DateOfBirth" => $teacher->getDateOfBirth(),
                ":Gender" => $teacher->getGender(),
                ":Email" => $teacher->getEmail(),
                ":Address" => $teacher->getAddress(),
                ":City" => $teacher->getCity(),
                ":PhoneNumber" => $teacher->getPhoneNumber(),
                ":profileImage" => $teacher->getProfileImage()
            ));
            return json_encode($this->dbConn->lastInsertId());
        }catch (Exception $msg){
            throw  new TeacherException("Error:".$msg->getMessage());
        }
    }


    public  function  getTeacher($id){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Teachers WHERE TeacherID = :TeacherID");
            $query->execute(array(
                    ":TeacherID" => $id
            ));

            return json_encode($query->fetch(PDO::FETCH_ASSOC));

        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }

    public  function  deleteTeacher($id){
        try{
            $query  = $this->dbConn->prepare("DELETE FROM Teachers WHERE TeacherID  = :TeacherID");
            $query->execute(array(
                ":TeacherID" => $id
            ));
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }

    public function  getImage($id){
        try{
            $query  = $this->dbConn->prepare("SELECT profileImage FROM Teachers WHERE TeacherID = :TeacherID");
            $query->execute(array(
                ":TeacherID" => $id
            ));
            return $query->fetch(PDO::FETCH_ASSOC)['profileImage'];
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }

    public function  updateTeacherWithImage(Teacher $teacher){
        try{
           $query = $this->dbConn->prepare("UPDATE  Teachers SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber , profileImage = :profileImage WHERE TeacherID = :TeacherID");
           $query->execute(array(
               ":FirstName" => $teacher->getFirstName(),
               ":LastName" => $teacher->getLastName(),
               ":DateOfBirth" => $teacher->getDateOfBirth(),
               ":Gender" => $teacher->getGender(),
               ":Email" => $teacher->getEmail(),
               ":Address" => $teacher->getAddress(),
               ":City" => $teacher->getCity(),
               ":PhoneNumber" => $teacher->getPhoneNumber(),
               ":profileImage" => $teacher->getProfileImage(),
               ":TeacherID" => $teacher->getTeacherID()
           ));
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }

    public function  updateTeacherWithoutImage(Teacher $teacher){
        try{
            $query = $this->dbConn->prepare("UPDATE  Teachers SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber  WHERE TeacherID = :TeacherID");
            $query->execute(array(
                ":FirstName" => $teacher->getFirstName(),
                ":LastName" => $teacher->getLastName(),
                ":DateOfBirth" => $teacher->getDateOfBirth(),
                ":Gender" => $teacher->getGender(),
                ":Email" => $teacher->getEmail(),
                ":Address" => $teacher->getAddress(),
                ":City" => $teacher->getCity(),
                ":PhoneNumber" => $teacher->getPhoneNumber(),
                ":TeacherID" => $teacher->getTeacherID()
             ));
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }


    public  function  getRowCountOfTeachers(){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Teachers");
            $query->execute();
            return $query->rowCount();
        }catch (Exception $msg){
            throw  new TeacherException($msg->getMessage());
        }
    }
}

?>