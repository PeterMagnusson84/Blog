<?php 

	class Validate{
		
		//Sträng utan visning av html och javascript.
		public function Strings($strings)
		{
			$regex = "/^[a-öA-Ö0-9_.,-:;%<>'´=*?!\/\(\")\\ ]{1,}$/m";
			
			//regulärtutryck som inte kan ta in html och javascript.
			if (preg_match($regex, $strings)) {
				return true;
			}
			else {
				return false;
			}
		}
		
		public function Password($password) 
		{
			//Kollar så att lösenordet är minst 6 tecken, och innehåller siffror samt stora och små bokstäver.
			$regex = "/^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/";
			
			if (preg_match($regex, $password)) {
				return true;
			}
			else {
				return false;
			}
		}
		
	}
?>


