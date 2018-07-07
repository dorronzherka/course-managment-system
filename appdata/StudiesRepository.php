<?php 
	require 'Studies.php';
	//require 'DatabaseConnection.php';
	class StudiesRepository{
		private $dbConn;

		public function __construct(DatabaseConnection $dbConn){
			try{
				$this->dbConn = $dbConn->getDatabaseConnectionInstance();
			}catch(DatabaseConnectionException $e){
				throw new StudiesException($e->getMessage);
			}
		}


		public function insertStudies(Studies $studies){
			try{
				$query = $this->dbConn->prepare("INSERT INTO Studies (CourseID,StudentID) VALUES(:courseid,:studentid)");
				$query->execute(array(
					":courseid" => $studies->getCourseID(),
					":studentid" => $studies->getStudentID()
				));
			}catch(Exception $e){
				throw new StudiesException($e->getMessage());
			}
		}


		public function getAllStudentsFromThisCourse($idCourse){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Studies INNER JOIN Students on Studies.StudentID = Students.StudentID WHERE CourseID = :courseid ");
				$query->execute(array(
					":courseid" => intval($idCourse)
				));
				return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
			}catch(Exception $e){
				throw new StudiesException($e->getMessage());
			}	
		}

		public function getStudiesById($idCourse , $idStudent){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Studies INNER JOIN Students on Studies.StudentID = Students.StudentID WHERE CourseID = :courseid  AND Studies.StudentID = :studentid");
				$query->execute(array(
					":courseid" => intval($idCourse),
					":studentid" => intval($idStudent)
				));
				return $query->fetch(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw new StudiesException($e->getMessage());
			}
		}
 

		public function enrollStudent($idStudent){
			try{
				$query = $this->dbConn->prepare("UPDATE FROM Studies SET isEnrolledinClassroom = 1 WHERE StudentID =  :studentid ");
				$query->execute(array(
					":studentid" => $idStudent
				));
			}catch(Exception $e){
				throw new StudiesException($e->getMessage());
			}
		}
	}
?>