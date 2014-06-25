<?php

	require_once 'Validate.php';
	
	class RegisterHandler {
				
		private $db;
		private $validate;
		
		public function __construct(Database $db) {
			$this->db = $db;
			$this->validate = new Validate();
		}
		
		//Funktion för som sköter registrering av användare.
		public function RegisterUser($username, $password) {
			
			$sqlQuery = "INSERT INTO login(username, password) VALUES(?, ?)";
			
			$stmt = $this->db->Prepare($sqlQuery);
			
			$stmt->bind_param('ss', $username, $password);
			
			if($this->db->Execute($stmt) === TRUE)
			{
				return true;
			}
			return false;
		}
		
		
		//Kollar ifall användarnamet redan finns.
		public function CheckExist($username)
		{
			$sqlQuery = "SELECT username FROM login WHERE username = ?";
			
			$stmt = $this->db->Prepare($sqlQuery);
			
			$stmt->bind_param('s', $username);
			
			$this->db->Execute($stmt);
			
			$result = "";
			$stmt->bind_result($result);
			$stmt->fetch();
			
			if ($result != NULL) {
				return true;
			}
			
			return false;
			
		}
		
		
		//Kollar så att det finns ett användarnam.
		public function usernameIsEmpty($username){
			if(empty($username)){
				return true;
			}
			return false;
		}
		// Kollar så att användaren skriver i ett lösenord.
		public function passwordIsEmpty($password){
			if(empty($password)){
				return true;
			}
			return false;
		}
		//Validerar lösenordet.
		public function validatePassWord($password){
			if($this->validate->Password($password)){
				return true;
			}
			return false;
		}
		
	
	}