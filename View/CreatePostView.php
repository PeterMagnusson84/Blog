<?php

require_once 'Model/PostsHandler.php';

class CreatePostView{

	private $title = "title";
	private $post = "post";
	private $author ="author";
	private $picture ="picture";
	private $category ="category";
	private $postbutton ="postbutton";

		const POST_CREATED = 0;
		const TITLE_IS_EMPTY = 1;
		const POST_IS_EMPTY = 2;
		const AUTHOR_IS_EMPTY = 3;
		const NO_HACK = 4;

	public function CreatePostForm(){
			$ret = "<div id='createPostForm'>
					<form method='POST'>					
					<div>
						<p id='createPostLabel'>Titel:</p>
						<p><input type='text' id='createPostTitleForm' name='$this->title' /></p>
					</div>
					<div>	
						<p id='createPostLabel'>Text:</p>
						<p><textarea type='text' id='posttext' name='$this->post' rows='20' cols='90'/></textarea></p>
					</div>
					<div>	
						<p id='createPostLabel'>Författare:</p>
						<p><input type='text' id='postauthor' name='$this->author' /></p>
					</div>
					<div>
						<p><select name='$this->category'>
    					<option value='1'>Windows</option>
  						<option value='2'>Android</option>
  						<option value='3'>Spel</option>
  						<option value='4'>iOS</option>
  						<option value='5'>Windows Phone</option>
  						<option value='6'>Webb</option>
    					</select></p>
					</div>
					<div>	
						<p><button name='$this->postbutton' class='button' id='button'>Skapa inlägg</button></p>
					</div>
					</form>						
				</div>";
				return $ret;
	}

	public function NotLoggedInAsAdmin(){
		$ret="<div>Du måste logga in som admin för att kunna skapa ett inlägg</div>";

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
	//Hämtar en kategori
	public function GetCategory(){
		if(isset ($_POST[$this->category])){
			return $_POST[$this->category];
		}
	}
	//Funktion till skapa inlägg knappen
	public function TriedToPost(){
		if(isset($_POST[$this->postbutton])){
			return TRUE;
		}
		return FALSE;
	}

		//Funktion med felmeddelanden som visas när man skapar en post.
		public static function Message($n){
				$message = null;
				
				switch($n){
					case self::POST_CREATED:
						$message .= "<p id='CreatePostViewValidation'>Inlägget har skapats</p>";
						break;
						
					case self::TITLE_IS_EMPTY:
						$message .= "<p id='CreatePostViewValidation'> En titel saknas</p>";
						break;
						
					case self::POST_IS_EMPTY:
						$message .= "<p id='CreatePostViewValidation'>En text saknas</p>";
						break;
						
					case self::AUTHOR_IS_EMPTY:
						$message .= "<p id='CreatePostViewValidation'>Du måste ange en författare</p>";
						break;
					case self::NO_HACK:
						$message .= "<p></p>";
						break;
				}			
			
			return "<p> $message</p>";
			
		}	
}
