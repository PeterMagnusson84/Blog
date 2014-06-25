<?php

require_once 'DBConfig.php';
require_once 'Database.php';


class UserDAL{
	
	private $db;
	private $userdal;
	
	public function __construct(Database $db){
		$this->db = $db;
		
 	}
	
	/**
	 * Funktion för att hämta alla användare i databasen
	 * @param $sqlQuery The sql to get all users
	 * @return array Array containing Users
	 */
	
	public function SelectUsers($sqlQuery){
		
		$stmt = $this->$db->Prepare($sqlQuery);
		$this->$db->Execute($stmt);

		$stmt->bind_result($id, $user, $pass);

		$ret = array();
		$user = array();
		while ($stmt->fetch()) {
			$user['ID'] = $id;	
			$user['Username'] = $user;
			$user['Password'] = $pass;
			$ret[] = $user;
		}
		$stmt->close();
		var_dump($ret);
		return $ret;
	}
	
	public function CountUsers($sqlQuery){
	
		$stmt = $this->db->Prepare($sqlQuery);
		$this->db->Execute($stmt);
				
		$ret = 0;
		$stmt->bind_result($ret);
		$stmt->fetch();
		$stmt->close();
		
		return $ret;
	}

	public function SelectOneUser($stmt){
	
		$this->db->Execute($stmt);
				
		$stmt->bind_result($id, $userName, $pass, $admin);

		$user = array();
		while ($stmt->fetch()) {
			$user['ID'] = $id;
			$user['Username'] = $userName;
			$user['Password'] = $pass;
			$user['admin'] = $admin;
		}
		$stmt->close();

		return $user;
	}
	
	/**
	 * Funktion för att hämta och kolla en användare när man loggar in
	 */	
	public function SelectOneUserByUsernameAndPassword($username, $password){

		$sqlQuery = "SELECT * FROM login WHERE username = ? AND password = ?";

		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('ss', $username, $password);
	
		$this->db->Execute($stmt);
				
		$stmt->bind_result($id, $userName, $pass, $admin);

		$user = array();
		while ($stmt->fetch()) {
			$user['ID'] = $id;
			$user['Username'] = $userName;
			$user['Password'] = $pass;
			$user['admin'] = $admin;
		}
		$stmt->close();
		return $user;
	}
	
}
