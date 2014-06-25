<?php

require_once 'View/RegisterView.php';
require_once 'Model/RegisterHandler.php';

class RegisterController{
	
	private $message = "";
	private $ret = "";
	private $error = FALSE;
	
	public function DoControll(Database $db){
		$registerView = new RegisterView();
		$registerHandler = new RegisterHandler($db);
		
		//Skapar fomuläret.
		$this->ret =$registerView->UserInfo();
		
		if($registerView->TriedToRegister()){
			//Kollar så att användarnamnet är ledigt.
			if($registerHandler->CheckExist($registerView->GetUsername())){
				$this->message .=$registerView->Message(RegisterView::NAME_DOES_EXIST);
				$this->error = TRUE;
			}
			//Kollar så att användaren har skrivit något användarnamn.
			if($registerHandler->usernameIsEmpty($registerView->GetUsername())){
				$this->message .=$registerView->Message(RegisterView::NAME_IS_EMPTY);
				$this->error = TRUE;
			}
			//Kollar så att användaren har skrivit in ett lösenord.
			if($registerHandler->passwordIsEmpty($registerView->GetPassword())){
				$this->message .=$registerView->Message(RegisterView::PASS_IS_EMPTY);
				$this->error = TRUE;
			}
			//Kollar om lösenorden matchar med varandra.
			if($registerView->checkPasswords($registerView->GetPassword(), $registerView->GetPassword2())){
				$this->message .=$registerView->Message(RegisterView::PASS_NOT_EQUAL);
				$this->error = TRUE;
			}
			//Validerar lösenordet.
			if($registerHandler->validatePassWord($registerView->GetPassword()) === FALSE){
				$this->message .=$registerView->Message(RegisterView::PASS_NOT_GOOD);
				$this->error = TRUE;
			}
			
			if($this->error === FALSE){
				if($registerHandler->RegisterUser($registerView->GetUsername(), md5($registerView->GetPassword()))){
					$this->message .=$registerView->Message(RegisterView::USER_REGISTER);
				}
			}
			
		}
		return $this->ret . $this->message;
	}
	
}
