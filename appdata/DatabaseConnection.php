	<?php 
		require_once 'DatabaseConnectionException.php';
		class DatabaseConnection{
			private  $connInstance;

			public function __construct($host ,$dbName,$user,$password){
				if($host == null || empty($host)){
					throw new DatabaseConnectionException("Host  is empty or null!");
				}else if($dbName == null || empty($dbName)){
					throw new DatabaseConnectionException("Database  is empty or null!");
				}else if($user == null || empty($user)){
					throw new DatabaseConnectionException("Username  is empty or null!");
				}else if($password == null || empty($password)){
					throw new DatabaseConnectionException("Password  is empty or null!");
				}else if($host == null || empty($host) 			&& 
				   		 $dbName == null || empty($dbName)		&&
				   		 $user == null || empty($user)			&&  
				         $password == null || empty($password)){
					throw new DatabaseConnectionException("Host , database name ,  user and password are empty or null!");
				}else{
					try{
						$this->connInstance =  new PDO("mysql:host={$host};dbname={$dbName}",$user,$password);
						$this->connInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					}catch(PDOException $msg){
						throw new DatabaseConnectionException($msg->getMessage()." ".$msg->getTraceAsString());
					}
				}
			}

			public function getDatabaseConnectionInstance(){
					return $this->connInstance;
			}

			public function closeConnection(){
				$this->connInstance =null;
			}

		}

	 ?>