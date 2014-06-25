<?php

require_once 'DBConfig.php';
require_once 'UserDAL.php';

class Database{
	
	private $mysqli = NULL;
	
	//Skpar en funktion som kopplar upp mig mot databasen
	public function Connect(DBConfig $config){
		$this->mysqli = new mysqli($config->host, 
							$config->user, 
							$config->password, 
							$config->db);
	
		if ($this->mysqli->connect_error) {
		   throw new Exception($this->mysqli->connect_error);
			}	
				$this->mysqli->set_charset("utf8");
		
			return TRUE;
		}


		//En Execute funktion som kan hämtas.
	public function Execute($stmt){
		if($stmt->execute() === FALSE ){
			throw new Exception($this->mysqli->error);		
		}
		return TRUE;
	}
	
	//Förebereder sql query.
	public function Prepare($sql){
		$ret = $this->mysqli->prepare($sql);
		
		if($ret == FALSE){
			throw new Exception($this->mysqli->error);				
		}
		return $ret;
	}
	
	
	//Funktion som lägger till användare i databasen.
	Public function Insert(mysqli_stmt $stmt){
		if($stmt->execute() == FALSE){
			throw new Exception($this->mysqli->error);		
			
		}
		$ret = $stmt->insert_id;
		
		$stmt->close();
		
		return $ret;
		
	}
	
	
	//En funktion som sedan stänger databasen.
	public function Close(){

		$ret = $this->mysqli->Close();
		if($ret == FALSE){
			throw new Exception($this->mysqli->error);					
		}
		return $ret;

	}

}
