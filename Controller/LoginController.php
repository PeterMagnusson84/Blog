<?php

require_once 'Model/LoginHandler.php';
require_once 'View/LoginView.php';

class LoginController {

	public function DoControll(Database $db) {
		$html = "";
		$message = "";
		$loginView = new LoginView();
		$loginHandler = new LoginHandler($db);
			

		//Kollar ifall användaren är inloggad.
		if ($loginHandler -> IsLoggedIn()) {
			//Kollar ifall användaren loggar ut.
			if ($loginView -> TriedToLogOut()) { 
				$loginHandler -> DoLogout();
				$loginView->unsetCookie();				
				$message .= $loginView->Message(LoginView::USER_LOGGED_OUT);
			}
		}
		//Om användaren försöker logga in.
		else if ($loginView->TriedToLogIn() || $loginView->readCookie() ) {
			if ($loginHandler->DoLogin($loginView->getUserName(), $loginView->getPassword())) {
				//Om användaren har valt att kryssa i kom ihåg mig rutan när hen loggar in.
				if ($loginView->rememberCookie()) {
					$loginView->setCookie();					
				}
			} 
			//Om det inte går att logga in.
			else 
			{
				 $message .= $loginView->Message(LoginView::USER_LOGGED_ERROR);
			}
		}
			//Om man loggar in som admin.
		 if ($loginHandler -> LoggedInAsAdmin()) {
			$html = $loginView -> DoLogoutBoxAdmin();
			$message .= $loginView->Message(LoginView::ADMIN_LOGGED_IN);		
		}

		//Om användaren inte är admin.
		else if ($loginHandler -> IsLoggedIn()) {
			$html = $loginView -> DoLogoutBox();
			$message .= $loginView->Message(LoginView::USER_LOGGED_IN);
		
		} 
		else 
		{
			$html = $loginView -> DoLoginBox();		
		}
		
		return $html . $message;
	}
}
?>