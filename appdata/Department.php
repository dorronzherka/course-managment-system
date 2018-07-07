<?php 
	include_once 'DepartmentException.php';
	class Department{
		private $DepartmentID;
		private $Name;
		private $Description;


		public function __construct(){}

		public function setDepartamentID($id){
			if($id == null || empty($id))
				throw new DepartmentException("DepartmentID is null or empty!");
			$this->DepartmentID = $id;
				
		}

		public function setName($name){
			if($name == null || empty($name))
				throw new DepartmentException("Name is empty or null");
			$this->Name = $name." Deparment";
		}

		public function setDescription($desc){
			if($desc == null || empty($desc))
				throw new DepartmentException("Description is empty or null");
			$this->Description = $desc;
		}


		public function getDeparmentID() {
			return $this->DepartmentID;
		}

		public function getName(){
			return $this->Name;
		}

		public function getDescription(){
			return $this->Description;
		}


	}
 ?>