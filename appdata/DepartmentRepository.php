<?php 
	include_once 'Department.php';
	include_once 'DatabaseConnection.php';
	
	class DepartmentRepository {
		private $dbConn;

		public function __construct(DatabaseConnection $dbConn){
			try{
				$this->dbConn = $dbConn->getDatabaseConnectionInstance();
			}catch(DatabaseConnectionException $e){
				 throw  new DepartmentException($e->getMessage());
			}
		}


		public function addDepartment(Department $Department){
			if($Department == null || empty($Department)){
				throw new DepartmentException("Department is null!");
				
			}
			try{
				$query = $this->dbConn->prepare("INSERT INTO Departments(Name,Description) VALUES(:name,:desc)");
				$query->execute(array(
					":name" => $Department->getName(),
					":desc" => $Department->getDescription()
				));
				return json_encode($this->dbConn->lastInsertId());
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
				
			}
		}

		public function getAllDeparmentsAsJsonString(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Departments");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($result);
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
				
			}
		}

		public function getAllDeparmentsWithLimit(int $startPoint){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Departments LIMIT :start,20");
				$query->bindParam(':start', $startPoint, PDO::PARAM_INT);
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
				
			}
		}

		public function getNumbersDepts(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Departments");
				$query->execute();
				return "".$query->rowCount();
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
			}
		}


		public function getDepartmentFromId($id){
			try{
				$query =$this->dbConn->prepare("SELECT * FROM Departments WHERE DepartmentID = :id");
				$query->bindParam(":id",$id,PDO::PARAM_INT);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);
				return json_encode($result);
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
			}
		}

		public function editDepartment(Department $dep){
			try{
				$query = $this->dbConn->prepare("UPDATE Departments SET Name = :name , Description = :description WHERE DepartmentID = :departmentId");
				$query->execute(array(
					':name' => $dep->getName(),
					':description' => $dep->getDescription(),
					':departmentId' => $dep->getDeparmentID()
				));

			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
			}
		}

		public function deleteDepartment($id){
			try{
				if($id == 0 || $id == null){
					throw new DepartmentException("Id  is empty");
				}
				$query = $this->dbConn->prepare("DELETE FROM Departments WHERE DepartmentID = :id");
				$query->execute(array(
					":id" => $id
				));
			}catch(Exception $msg){
				throw new DepartmentException($msg->getMessage());
			}
		}
	}
 ?>