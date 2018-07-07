<?php
include_once'examsException.php';
    class Exams{
        private $ExamID;
        private $ExamName;
        private $ExamStartDateAndTime;
        private $ExamEndDateAndTIme;
        private $CourseID;

    public function __construct(){}

    //Getters
		public function getExamID(){
			return $this->ExamID;
		}
        public function getExamName(){
            return $this->ExamName;
        }
        public function getExamStartDateAndTime(){
            return $this->ExamStartDateAndTime;
        }
        public function getExamEndDateAndTime(){
            return $this->ExamEndDateAndTIme;
        }
        public function getCourseID(){
            return $this->CourseID;
        }

    //Setters
		public function setExamID($id){
			if(!isset($id)){
				throw new examsException("Exam Id is empty");
			}
			$this->ExamID = $id;
		}
        public function setExamName($name){
            if(!isset($name)){
                throw new examsException("Name is Empty");
            }
            $this->ExamName=$name;
        }
        public function setExamStartDateAndTime($stdt){
            if(!isset($stdt)){
                throw new examsException("Exam start date and time is empty");
            }
            $this->ExamStartDateAndTime=$stdt;
        }
        public function setExamEndDateAndTIme($endt){
            if(!isset($endt)){
                throw new examsException("Exam end date and time is empty");
            }
            $this->ExamEndDateAndTIme=$endt;
        }
        public function setCourseID($id){
                if(!isset($id)){
                    throw new examsException("Course Id is empty");
                }
                $this->CourseID = $id;
            }
    }
?>
