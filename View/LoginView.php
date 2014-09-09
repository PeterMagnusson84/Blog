<?php

require_once 'Model/LoginHandler.php';

class LoginView{
	
	private $getUserName = "name";
	private $getPassword = "pass";
	private $login = "login";
	private $logout = "logout";
	private $remember = "remember";
	private $nav = "?Register";
	private $admin = '?Admin';
	private $start = 'index.php';
	
	
	const USER_LOGGED_IN = 1;
	const USER_LOGGED_OUT = 2;
	const USER_LOGGED_ERROR = 3;
	const ADMIN_LOGGED_IN = 4;
	
	public function DoLoginBox() {
		//Retunerar ett formulär
		return "<div ><form id='login' action='index.php' method='get' accept-charset='UTF-8' >	
					<fieldset id='loginform'>							
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='username' id='loginname'>Användarnamn:</label><br>
						<input type='text' name='$this->getUserName' id='username' width='50px' /><br>
						<label for='password' id='loginpassword'>Lösenord:</label><br>
						<input type='password' name='$this->getPassword' id='password'  /><br>
						<p  id='loginremeberme'>
						<input type='submit' name='$this->login' value='Logga in' />
						<input type='checkbox' name='$this->remember' value='RemeberMe' />Kom ihåg mig</p>
						<a href='$this->nav'>Registrera dig</a>
					</fieldset>
						<a href='$this->start' id='startlink2'>Startsidan</a>
				
					</form>		
				</div>";
	}
	
	public function DoLogoutBox(){
		//Retunerar utloggningsknappen
		return "<div><form id='login' action='index.php' method='get' accept-charset='UTF-8'>
						<a href='$this->start' id='startlink'>Startsidan</a>
						<input type='submit' name='$this->logout' value='Logga ut' id='logoutbutton' />
					</form>
				</div>";		
	}

	public function DoLogoutBoxAdmin(){
		//Retunerar utloggningsknappen när admin är inloggad.
		return "<div><form id='login' action='index.php' method='get' accept-charset='UTF-8'>
						<a href='$this->start' id='startlink'>Startsidan</a>
						<a href='$this->admin' id='startlink'>Skapa nytt inlägg</a>
						<input type='submit' name='$this->logout' value='Logga ut' id='logoutbutton'/>
					</form>
				</div>";		
	}

	public function Message($statusNumber){
		//Skriver ut meddelanden beroende på vad användaren gör.	
		if ($statusNumber == self::USER_LOGGED_IN) {
			$msg ="<p id='loginmessage'>Du är inloggad</p>";
		}
		elseif ($statusNumber == self::ADMIN_LOGGED_IN) {
			$msg ="<p id='loginmessage'>Du är inloggad som admin</p>";
		}
		elseif ($statusNumber == self::USER_LOGGED_OUT) {
			$msg ="<p id='loginmessage'>Du är utloggad</p>";
		}
		elseif ($statusNumber == self::USER_LOGGED_ERROR) {
			$msg ="<p id='loginmessage'>Fel Uppgifter</p>";
		}
		return $msg;		
	}
	
	//Returnerar användarnamnet som användaren har skrivit.
	public function GetUserName(){
		if (isset($_GET[$this->getUserName]) == true){		
			return $_GET[$this->getUserName];
		}
		else
		{	
			if(isset($_COOKIE[$this->getUserName])){
				return $_COOKIE[$this->getUserName];
			}
		}
	}
	
	//Returnerar lösenordet som användaren har skrivit.
	public function GetPassword(){
		$password = $_GET[$this->getPassword];
		$md5_password = md5($password);
		if (isset($md5_password) == true){
			return $md5_password;
		}
		else
		{
			if(isset($_COOKIE[$this->getPassword])){
				return $_COOKIE[$this->getPassword];
			}
		}
	}
	
	public function TriedToLogIn(){
		//Hämtar användarnamn och lösenord när användaren trycker på login.
		if  (isset($_GET[$this->login]) &&
			 isset($_GET[$this->getUserName]) && 
			 isset($_GET[$this->getPassword]) && 
			 !empty($_GET[$this->getUserName]) && 
			 !empty($_GET[$this->getPassword]))
		{			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
	
	public function TriedToLogOut(){
		//Loggar ut	om användaren trycker på logout knappen.	
		if(isset($_GET[$this->logout] )== true)
		{
			return TRUE;	
		}
		else		
		{
			return FALSE;
		}	
		
	}

	//om användaren har markerat "kom ihåg mig" funktionen
	public function rememberCookie(){
		return isset ($_GET[$this->remember]);
	}
	
	//ställer in en cookie och ger den ett värde
	public function setCookie(){
		setcookie($this->getUserName, $this->GetUserName(), time() +1000);
		setcookie($this->getPassword, $this->GetPassword(), time() +1000);
		$_COOKIE[$this->getUserName] = $this->GetUserName();
		$_COOKIE[$this->getPassword] = $this->GetUserName();
		
	}

	//Tömmer cookien på användarnamn och lösenord.
	public function unsetCookie(){
		setcookie($this->getUserName, "", time() -1000);
		setcookie($this->getPassword, "", time() -1000);		
		unset($_COOKIE[$this->getUserName]);
		unset($_COOKIE[$this->getPassword]);		
	}
	
	//Kolla ifall det finns en cookie 
	public function readCookie(){
		if(isset ($_COOKIE[$this->getUserName]) && ($_COOKIE[$this->getPassword])){
			return true;
		}
		return false;
	}
	
}
