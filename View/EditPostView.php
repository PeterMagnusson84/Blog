<?php

require_once 'Model/PostsHandler.php';

class EditPostView{

	private $title = "title";
	private $post = "post";
	private $author ="author";
	private $id ="id";
	private $categorypick ="categorypick";
	private $postbutton ="postbutton";
	
		const POST_UPDATED = 0;
		const TITLE_IS_EMPTY = 1;
		const POST_IS_EMPTY = 2;
		const AUTHOR_IS_EMPTY = 3;
		const NO_HACK = 4;

	public function EditPostForm($blogpost){
			$ret = '
				<div id="editPostForm">
					<form method="POST">										
						<div>
							<p id="editPostLabel">Titel:</p>
							<p><input type="text" id="editPostTitleForm" name="'.$this->title.'" value="'.$blogpost->getTitle().'" /></p>
						</div>					
						<div class="">
							<p id="editPostLabel">Text:</p>
							<p><textarea type="text" id="editPostText" name="'.$this->post.'"  rows="20" cols="90"/>'.$blogpost->getPost().'</textarea></p>
						</div>					
						<div class="">	
							<p id="editPostLabel">Författare:</p>
							<p><input type="text" id="editPostAuthor" name="'.$this->author.'" value="'.$blogpost->getAuthor().'"" /></p>
						</div>						
						<div class="">	
							<p><button name="'.$this->postbutton.'" class="button" id="editPostButton"">Redigera inlägg</button></p>
						</div>				
					</form>						
				</div>';
				return $ret;
		}

	public function NotLoggedInAsAdmin(){
		$ret="<div>Du måste logga in som admin för att kunna redigera ett inlägg</div>";

		return $ret;
	}

		//Hämtar det som har skrivits i titelfältet.
	public function GetTitle(){
		if(isset ($_POST[$this->title])){
			return $_POST[$this->title];
		}
	}
	//Hämtar det som har skrivits i inläggfältet.	
	public function GetPost(){
		if(isset($_POST[$this->post])){
			return $_POST[$this->post];
		}
	}
	//Hämtar författaren.
	public function GetAuthor(){
		if(isset($_POST[$this->author])){
			return $_POST[$this->author];
		}
	}
	//Hämtar ID.
	public function GetId(){		
		if(isset ($_GET[$this->id])){
			return $_GET[$this->id];
		}
	}
	//Funktion till skapa inlägg knappen
	public function TriedToEditPost(){
		if(isset($_POST[$this->postbutton])){
			return TRUE;
		}
		return FALSE;
	}

		//Funktion med felmeddelanden som visas när man skapar en post.
		public static function Message($n){
				$message = null;
				
				switch($n){
					case self::POST_UPDATED:
						$message .= "<p id='EditPostViewValidation'>Inlägget har redigerats</p>";
						break;
						
					case self::TITLE_IS_EMPTY:
						$message .= "<p id='EditPostViewValidation'> En title saknas </p>";
						break;
						
					case self::POST_IS_EMPTY:
						$message .= "<p id='EditPostViewValidation'>En text saknas</p>";
						break;
						
					case self::AUTHOR_IS_EMPTY:
						$message .= "<p id='EditPostViewValidation'>Du måste ange en författare</p>";
						break;
					case self::NO_HACK:
						$message .= "<p></p>";
						break;
				}			
			
			return "<p> $message</p>";
			
		}	
}