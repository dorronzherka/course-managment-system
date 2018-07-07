<?php 
	include_once 'DatabaseConnection.php';
	include_once 'Course.php';

	class CourseRepository{

		private $dbConn;
		public function __construct(DatabaseConnection $dbConn){
			try{
				$this->dbConn = $dbConn->getDatabaseConnectionInstance();
			}catch(Exception $msg){
				echo $msg->getMessage();
			}
		}


		public function getCoursesWithLimit(int $start){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Courses LIMIT :start , 20");
				$query->bindParam(":start",$start,PDO::PARAM_INT);
				$query->execute();
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}

		}

		public function getCourses(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Courses");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}

		}

		public function getCoursesForClassroom(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Courses WHERE ClassroomId = ''");
				$query->bindParam(":start",$start,PDO::PARAM_INT);
				$query->execute();
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}

		}



		public function getLength(){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM Courses");
				$query->execute();
				return $query->rowCount();
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}
		}

		public function addCourses(Course $course){
			try{
				$query = $this->dbConn->prepare("INSERT INTO Courses (Name,Cost,DepartmentID ) VALUES (:name,:cost,:departmentID)");
				$query->execute(array(
					":name" => $course->getName(),
					":cost" => (int)$course->getCost(),
					":departmentID" => (int)$course->getDepartmentID()
				));
				return json_encode($this->dbConn->lastInsertId());
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}	
		}


		public function getCourseFromId($id){
			try{
				$query = $this->dbConn->prepare("SELECT * FROM  Courses WHERE CourseID = :id");
				$query->execute(array(
					":id" => $id
				));
				return json_encode($query->fetch(PDO::FETCH_ASSOC));
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}
		}

        public function getCourseFromIdWithoutJSON($id){
            try{
                $query = $this->dbConn->prepare("SELECT * FROM  Courses WHERE CourseID = :id");
                $query->execute(array(
                    ":id" => $id
                ));
                return $query->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $msg){
                throw new CourseException($msg->getMessage());
            }
        }


		public function deleteCourse($id){
			try{
				$query = $this->dbConn->prepare("DELETE FROM Courses WHERE CourseID = :id");
				$query->execute(array(
					":id" => $id
				));
			}catch(Exception $msg){
				throw new CourseException($msg->getMessage());
			}
		}

		public  function  editCourse(Course $course){
            try{
                $query = $this->dbConn->prepare("UPDATE Courses SET Name = :name , Cost = :cost , DepartmentID = :departmentid  WHERE  CourseID = :courseID");
                $query->execute(array(
                    ":name" =>  $course->getName(),
                    ":cost" => $course->getCost(),
                    ":departmentid" => $course->getDepartmentID(),
                    ":courseID" => $course->getCourseID()
                ));
            }catch (Exception $msg){
                throw new CourseException($msg->getMessage());
            }
        }


        public  function  insertClassroomCourseData(Course $course){
            try{
                $query = $this->dbConn->prepare("UPDATE Courses SET ClassroomId = :classroomid , ClassroomUrl = :classroomurl , EnrollmentCode = :enrollmentcode  WHERE CourseID = :courseID");
                $query->execute(array(
                    ":classroomid" => $course->getClassroomId(),
                    ":classroomurl" => $course->getClassroomUrl(),
                    ":courseID" => $course->getCourseID(),
                    ":enrollmentcode" => $course->getEnrollmentCode()
                ));
            }catch (Exception $msg){
                throw new CourseException($msg->getMessage());
            }
        }

        public  function  getCoursesFromDepId($id){
            try{
                $query = $this->dbConn->prepare("SELECT * FROM Courses WHERE DepartmentID = :id");
                $query->execute(array(
                    ":id" => $id
                ));
                return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
            }catch(Exception $msg){
                throw new CourseException($msg->getMessage());
            }
        }

	}
 ?>