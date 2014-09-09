<?php

require_once 'Model/PostsHandler.php';


class PostsView{

	private $nav ="?Comments";
	private $id ="&id=";
	private $title = "title";
	private $editNav ="?Edit";
	private $deletePostID = "deletePostID";
	private $deletePost ="deletePost";
	private $windows = '?Windows';
	private $android = '?Android';
	private $spel = '?Spel';
	private $ios = '?iOS';
	private $wp = '?WP';
	private $webb = '?Webb';

	const DELETED = 0;

	//Inläggen som visas för en vanlig användare.
	public function ViewPosts($blogposts){
		$ret = "";
		foreach ($blogposts as $key => $value) {
			
			$ret .= '<div id="postsview">
				<div></br></br>
					<h2 id="titlePostsView">'.nl2br($value->getTitle()).'</h2></br>
					<p id="postPostsView">'.nl2br($value->getPost()).'</p></br>
					<a id="commentButton" href="' . $this->nav . $this->id . $value->getId() .'">Kommentera</a></br></br>
					<p id="authorPostsView">Skapad av:'.$value->getAuthor().'</p>
					<p id="datePostsView">'.$value->getDate().'</p>
				</div>							
			</div>' ;		
			}
			return $ret;
		}

	//Inlägg tillsammans med en raderaknapp om man är admin.
	public function ViewPostsAsAdmin($blogposts){
	$ret = "";
	foreach ($blogposts as $key => $value) {
		
		$ret .= '<div id="postsview">
			<div>
			</br>
			<form action="" method="post">
			  	<input name="'.$this->deletePostID.'" type="hidden" value="'.$value->getId().'" />
			  	<input name="'.$this->deletePost.'" type="submit" id="deletebutton" value="X" />
			  </form>
			  <br>
				<h2 id="titlePostsView">'.nl2br($value->getTitle()).'</h2></br>		
				<p id="postPostsView">'.nl2br($value->getPost()).'</p></br>			
			</div>
			<br>
			<div id="commenteditButtons">
				<a id="commentButton" href="' . $this->nav . $this->id . $value->getId() .'">Kommentarer</a>
				<a id="editButton" href="' . $this->editNav . $this->id . $value->getId() .'">Redigera</a></br></br>
			</div>

			<div>
				<p id="authorPostsView">Skapad av:'.$value->getAuthor().'</p>
				<p id="datePostsView">'.$value->getDate().'</p>
			</div>
			
		</div>' ;		
		}
		return $ret;		
	}
	//Alla kategorilänkar
	public function CategoryView(){
		$ret="
		<div id='categoryMenu'>
			<a href='$this->windows' id='categoryLink'>Windows |</a>
			<a href='$this->android' id='categoryLink'>Android |</a>
			<a href='$this->spel' id='categoryLink'>Spel |</a>
			<a href='$this->ios' id='categoryLink'>iOS |</a>
			<a href='$this->wp' id='categoryLink'>Windows Phone |</a>
			<a href='$this->webb' id='categoryLink'>Webb</a>
		</div>";

		return $ret;
	}
	
	public function DeletePost($deleteID)
	 {
			 return "<form action='' method='post'>
			 <input name='$this->deletePostID' type='hidden' value='$deleteID' />
			 <input name='$this->deletePost' type='submit' value='Radera' />
			 </form>";		
	 }
	 
	 //Tar bort en specifik inlägg.
	public function DeletePostID(){
		 if(isset ($_POST[$this->deletePostID])){
			 return $_POST[$this->deletePostID];
		 }
	 }
	//Försöker ta bort en inlägg.
	 public function TriedToDeletePost(){
		 if(isset($_POST[$this->deletePostID])){
			 return TRUE;
		}
		 return FALSE;
	 }

	  public static function Message($n){
				$message = null;				
				switch($n){					
					 case self::DELETED:
						 $message .= "<p id='fieldtext'>Inlägget raderat</p>";
						 break;
				}			
			
			return "<p class='message'> $message</p>";			
		}	

}