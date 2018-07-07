<?php 
	include_once 'CourseException.php';
	class Course{
		private $CourseID;
		private $Name;
		private $ClassroomId;
		private $Cost;
		private $DepartmentID;
		private $ClassroomUrl;
		private $EnrollmentCode;

		public function __construct(){}

		//Getters
		public function getCourseID(){
			return $this->CourseID;
		}

		public function getName(){
			return $this->Name;
		}

		public function getCost(){
			return $this->Cost;
		}

		public function getDepartmentID(){
			return $this->DepartmentID;
		}

		public function  getClassroomId(){
            return  $this->ClassroomId;
        }

        public  function  getClassroomUrl(){
		    return $this->ClassroomUrl;
        }

        public  function  getEnrollmentCode(){
            return $this->EnrollmentCode;
        }


		//Setters
		public function setCourseID($id){
			if(!isset($id)){
				throw new CourseException("Course Id is empty");
			}
			$this->CourseID = $id;
		}

		public function setName($name){
			if(!isset($name)){
				throw new CourseException("Course name is empty");
			}

			$this->Name = $name;
		}


		public function setCost($cost){
			if(!isset($cost)){
				throw new CourseException("Course cost is empty");
			}

			$this->Cost = $cost;
		}

		public function setDepartmentID($departmentID){
			if(!isset($departmentID)){
				throw new CourseException("Course department id is empty");
			}

			$this->DepartmentID = $departmentID;
		}

		public  function  setClassroomId($id){
            if(!isset($id)){
                throw new CourseException("Course classroom id is empty");
            }
		    $this->ClassroomId = $id;
        }

        public  function  setClassroomUrl($url){
            if(!isset($url)){
                throw new CourseException("Course classroom url is empty");
            }
            $this->ClassroomUrl = $url;
        }

        public  function  setEnrollmentCode($code){
            if(!isset($code)){
                throw new CourseException("Course enrollment code is empty");
            }
            $this->EnrollmentCode = $code;
        }
	}

 ?>