<?php
	require_once 'StudiesException.php';
	class Studies {
		private $StudiesID;
		private $CourseID;
		private $StudentID;
		private $isEnrolledinClassroom;


		public function __construct(){}

		//getters 
		public function getStudiesID(){
			return $this->$StudiesID;
		}

		public function getCourseID(){
			return $this->CourseID;
		}

		public function getStudentID(){
			return $this->StudentID;
		}

		public function getIsEnrolled(){
			return $this->isEnrolledinClassroom;
		}

		//setters
		public function setStudiesID($id){
			if(!isset($id)){
				throw new StudiesException("StudiesID is not added");
				
			}
			$this->StudiesID = $id;
		}

		public function setCourseID($id){
			if(!isset($id)){
				throw new StudiesException("CourseID is not added");
				
			}
			$this->CourseID = $id;
		}

		public function setStudentID($id){
			if(!isset($id)){
				throw new StudiesException("StudentID is not added");
				
			}
			$this->StudentID = $id;
		}

		public function setEnrolled($enrolled){
			if(!isset($id)){
				throw new StudiesException("Enrolled in classroom is not added");
			}
			$this->isEnrolledinClassroom = $enrolled;
		}
	}
?>