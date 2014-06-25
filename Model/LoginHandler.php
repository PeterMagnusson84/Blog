<?php

require_once 'UserDAL.php';

class LoginHandler{
	
	
	private $m_sessionLocation;
	private $userName;
	private $m_userIsAdmin;
	private $db;
	private $userdal;
	
	public function __construct(Database $db){
		$this->db = $db;
		$this->userdal = new UserDAL($db);
		
 	}

	//Kollar ifall man är inloggad.
	public function IsLoggedIn(){
		//Öppnar en session
		if (isset ($_SESSION[$this->m_sessionLocation]) == true ){
			return TRUE;
		}
		return false;
	}

	//Kollar ifall den som loggar in är admin.
	public function LoggedInAsAdmin(){
		if (isset($_SESSION[$this->m_userIsAdmin]) == true){
			if ($_SESSION[$this->m_userIsAdmin] == 1){
				return true;
			}

		}
		return false;
	}
	
	public function DoLogin($username, $password){
	
			$user = $this->userdal->SelectOneUserByUsernameAndPassword($username, $password);

			if(count($user) > 0){
				$_SESSION[$this->m_sessionLocation] = true;
				$_SESSION[$this->userName] = $username;
				$_SESSION[$this->m_userIsAdmin] = $user['admin'];
				return true;
				
			}
			return false;
			
	}
	
	public function DoLogout(){
		//Öppnar och stänger en session
		if (isset ($_SESSION[$this->m_sessionLocation]))
			unset ($_SESSION[$this->m_sessionLocation]);
			unset ($_SESSION[$this->userName]);
	}
	
	public function GetLoggedInUserName() {
			return $_SESSION[$this->userName];
		}
	
}