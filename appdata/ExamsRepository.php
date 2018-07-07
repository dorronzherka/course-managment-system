<?php
    require_once 'DatabaseConnection.php';
	require_once 'Exams.php';

    class ExamsRepository{
        private $dbConn;
		
		public function  __construct(DatabaseConnection $dbConn) {
			try{
				$this->dbConn =  $dbConn->getDatabaseConnectionInstance();
			}catch(DatabaseConnectionException $msg){
				throw new examsException($msg->getMesage());
			}
		}

		public function getAllExams(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Exams");
				$query->execute();
				return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
			}catch(Exception $msg){
				throw new examsException($msg->getMesage());
			}
		}

		public function insertExam(Exams $exam){
			try{
				$query = $this->dbConn->prepare("INSERT INTO Exams (ExamName, ExamStartDateAndTime, ExamEndDateAndTIme, CourseID) VALUES(:examname, :esdt, :eedt, :courseid)");
				$query->execute(array(
					":examname" => $exam->getExamName(),
					":esdt"     => $exam->getExamStartDateAndTime(),
					":eedt"     => $exam->getExamEndDateAndTime(),
					":courseid" => $exam->getCourseID()
				));
				return $this->dbConn->lastInsertId();
			}catch(Exception $msg){
				throw new examsException($msg->getMessage());
			}
		}
	}
?>
