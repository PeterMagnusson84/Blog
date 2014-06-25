<?php
	
	require_once 'Model/RegisterHandler.php';
	
	class RegisterView {
		
		private $username = 'username';
		private $password = 'password';
		private $password2 = 'password2';
		private $register = 'register';
		//private $nav = 'index.php';

		const USER_REGISTER = 0;
		const NAME_DOES_EXIST = 1;
		const NAME_IS_EMPTY = 2;
		const PASS_IS_EMPTY = 3;
		const PASS_NOT_EQUAL = 4;
		const PASS_NOT_GOOD = 5;
		
		public function UserInfo() {		
			$ret = "
				<div id='registerForm'>
					<form method='POST'>
						<div class=''>
							<p id='registerLabel'>Användarnamn:</p>
							<p><input type='text' name='$this->username' /></p>
						</div>
						<div class=''>	
							<p id='registerLabel'>Lösenord:</p>
							<p><input type='password' name='$this->password' /></p>
						</div>
						<div class=''>	
							<p id='registerLabel'>Repetera Lösenord:</p>
							<p><input type='password' name='$this->password2' /></p>
						</div>
						<br>
						<div class=''>	
							<p><button name='$this->register' class='button' id='register'>Skapa användare</button></p>
						</div>
					</form>
				</div>";
				return $ret;
		}
		
		//Hämtar användarnamnet som har skrivits in av användaren.
		public function GetUsername(){
			if(isset($_POST[$this->username])){
				return $_POST[$this->username];
			}
		}
		//Hämtar lösenordet som har skrivits in av användaren.
		public function GetPassword(){
			if(isset($_POST[$this->password])){
				return $_POST[$this->password];
			}
		}
		//Hämtar det andra lösenordet.
		public function GetPassword2(){
			if(isset($_POST[$this->password2])){
				return $_POST[$this->password2];
			}
		}
		//Kollar så att det är samma lösenord som har skrivit in av användaren.
		public function checkPasswords($password, $password2){
			if($password !== $password2){
				return TRUE;
			}
			return FALSE;
		}
		//Kollar ifall användaren har tryckt på registerar knappen.
		public function TriedToRegister(){
			if(isset($_POST[$this->register])){
				return TRUE;
			}
			return FALSE;
		}
		
		//Funktion med felmeddelanden när man registerar sig.
		public static function Message($n){
				$message = null;
				
				switch($n){
					case self::USER_REGISTER:
						$message .= "<p id='registerMessage'>Du är nu registrerad</p>";
						break;
						
					case self::NAME_DOES_EXIST:
						$message .= "<p id='registerMessage'>Detta användarnamn är redan upptaget</p>";
						break;
						
					case self::NAME_IS_EMPTY:
						$message .= "<p id='registerMessage'>Ett användarnamn måste anges</p>";
						break;
						
					case self::PASS_IS_EMPTY:
						$message .= "<p id='registerMessage'>Ett lösenord måste anges</p>";
						break;
						
					case self::PASS_NOT_EQUAL:
						$message .= "<p id='registerMessage'>Lösenorden stämmer inte överens</p>";
						break;
					case self::PASS_NOT_GOOD:
						$message .= "<p id='registerMessage'>Lösenordet måste innehålla sex tecken eller mer <br> samt minst en stor bokstav och siffra</p>";
						break;
				}			
			


			return "<p> $message</p>";
			
		}
	}