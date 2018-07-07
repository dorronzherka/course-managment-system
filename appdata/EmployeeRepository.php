<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/2/18
 * Time: 5:20 PM
 */
require_once "DatabaseConnection.php";
require_once "Employee.php";
class EmployeeRepository
{
    private  $dbConn;


    public  function  __construct(DatabaseConnection $dbConn){
        try{
            $this->dbConn = $dbConn->getDatabaseConnectionInstance();
        }catch (DatabaseConnectionException $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }


    public function  getAllEmployeesAsJson(){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Employees");
            $query->execute();
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }

    public function  addEmployee(Employee $Employee){
        try{
            $query = $this->dbConn->prepare("INSERT INTO Employees (FirstName,LastName,DateOfBirth,Gender,Email,Address,City,PhoneNumber,profileImage,job) VALUES(:FirstName,:LastName,:DateOfBirth,:Gender,:Email,:Address,:City,:PhoneNumber,:profileImage,:job)");
            $query->execute(array(
                ":FirstName" => $Employee->getFirstName(),
                ":LastName"  => $Employee->getLastName(),
                ":DateOfBirth" => $Employee->getDateOfBirth(),
                ":Gender" => $Employee->getGender(),
                ":Email" => $Employee->getEmail(),
                ":Address" => $Employee->getAddress(),
                ":City" => $Employee->getCity(),
                ":PhoneNumber" => $Employee->getPhoneNumber(),
                ":profileImage" => $Employee->getProfileImage(),
                ":job" => $Employee->getJob()
            ));
            return json_encode($this->dbConn->lastInsertId());
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }


    public  function  getEmployee($id){
        try{
            $query = $this->dbConn->prepare("SELECT * FROM Employees WHERE EmployeeID = :EmployeeID");
            $query->execute(array(
                ":EmployeeID" => $id
            ));

            return json_encode($query->fetch(PDO::FETCH_ASSOC));

        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }

    public  function  deleteEmployee($id){
        try{
            $query  = $this->dbConn->prepare("DELETE FROM Employees WHERE EmployeeID  = :EmployeeID");
            $query->execute(array(
                ":EmployeeID" => $id
            ));
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }

    public function  getImage($id){
        try{
            $query  = $this->dbConn->prepare("SELECT profileImage FROM Employees WHERE EmployeeID = :EmployeeID");
            $query->execute(array(
                ":EmployeeID" => $id
            ));
            return $query->fetch(PDO::FETCH_ASSOC)['profileImage'];
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }

    public function  updateEmployeeWithImage(Employee $Employee){
        try{
            $query = $this->dbConn->prepare("UPDATE  Employees SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber , profileImage = :profileImage, job = :job WHERE EmployeeID = :EmployeeID");
            $query->execute(array(
                ":FirstName" => $Employee->getFirstName(),
                ":LastName" => $Employee->getLastName(),
                ":DateOfBirth" => $Employee->getDateOfBirth(),
                ":Gender" => $Employee->getGender(),
                ":Email" => $Employee->getEmail(),
                ":Address" => $Employee->getAddress(),
                ":City" => $Employee->getCity(),
                ":PhoneNumber" => $Employee->getPhoneNumber(),
                ":profileImage" => $Employee->getProfileImage(),
                ":EmployeeID" => $Employee->getEmployeeID(),
                ":job" => $Employee->getJob()
            ));
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }

    public function  updateEmployeeWithoutImage(Employee $Employee){
        try{
            $query = $this->dbConn->prepare("UPDATE Employees SET FirstName = :FirstName, LastName = :LastName , DateOfBirth = :DateOfBirth , Gender = :Gender ,  Email = :Email , Address = :Address , City = :City , PhoneNumber = :PhoneNumber , job = :job WHERE EmployeeID = :EmployeeID");
            $query->execute(array(
                ":FirstName" => $Employee->getFirstName(),
                ":LastName" => $Employee->getLastName(),
                ":DateOfBirth" => $Employee->getDateOfBirth(),
                ":Gender" => $Employee->getGender(),
                ":Email" => $Employee->getEmail(),
                ":Address" => $Employee->getAddress(),
                ":City" => $Employee->getCity(),
                ":PhoneNumber" => $Employee->getPhoneNumber(),
                ":EmployeeID" => $Employee->getEmployeeID(),
                ":job" => $Employee->getJob()
            ));
        }catch (Exception $msg){
            throw  new EmployeeException($msg->getMessage());
        }
    }
}

?>