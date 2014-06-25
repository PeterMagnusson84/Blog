<?php

require_once 'Validate.php';
require_once 'PostArray.php';

class PostsHandler{

	private $db;
	private $validate;
	
	public function __construct(Database $db){

		$this->db = $db;
		$this->validate = new Validate();
	}

	public function CreatePost($title, $post, $author, $category){

		$sqlQuery = "INSERT INTO posts(title, post, author, category) VALUES(?, ?, ?, ?)";

		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('ssss', $title, $post, $author, $category);
		
		if($this->db->Execute($stmt) === TRUE){
			return TRUE;
		}
			return FALSE;
	}
	
	//Funktion för att hämta alla inlägg.
	public function GetPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificWindowsPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (1) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificAndroidPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (2) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificGamesPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (3) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificIosPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (4) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificWindowsPhonePosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (5) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	public function GetSpecificWebbPosts(){
		$sqlQuery = "SELECT id, title, post, author, date, category From posts WHERE category IN (6) ORDER BY id DESC";

		$stmt = $this->db->Prepare($sqlQuery);

		$this->db->Execute($stmt);

		$stmt->bind_result($id, $title, $post, $author, $date, $category);

		while ($stmt->fetch()) {
			//Hämntar ifrån PostArray.php.
			$blogpost = new PostArray($id, $title, $post, $author, $date, $category);
			
			$blogposts[] = $blogpost;
		}
		$stmt->close();
		return $blogposts;
	}

	//Funktion för att ta bort ett specifikt inlägg.
	public function DeletePost($deletePostID){
	
		$sqlQuery = "DELETE FROM posts WHERE id = ?";
		
		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('i', $deletePostID);
		
		$this->db->execute($stmt);
		
		$stmt->close();
		
		return FALSE;
	}

	//Updaterar en post.
	public function UpdatePost($title, $post, $author, $id){
		
		$sqlQuery = "UPDATE posts SET title = ?, post = ?, author = ? WHERE id = ?";
		
		$stmt = $this->db->Prepare($sqlQuery);
		$stmt->bind_param('sssi', $title, $post, $author, $id);
		
		if($this->db->Execute($stmt) === TRUE){
			return TRUE;
		}
			return FALSE;
	}

	public function GetSpecificPost($id){
		
		$sqlQuery = "SELECT id, title, post, author, date, category FROM posts WHERE id = ? ORDER BY Id Desc";
		
		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('i', $id);
		
		$this->db->Execute($stmt);
		
		if ($stmt->bind_result($id, $title, $post, $author, $date, $category) == FALSE) {
        		throw new \Exception($this->mysqli->error);
        }
		if ($stmt->fetch()) {
           	$ret = new PostArray($id, $title, $post, $author, $date, $category);
                        
        } else {
        	throw new \Exception("Could not find post $id");
        }
                
        $stmt->close();
                       
        return $ret;
		
		
	}

	//Kollar så att det finns en titel.
	public function titleIsEmpty($title){
		if(empty($title)){
			return TRUE;
		}
		return FALSE;		
	}
	//Kollar så att det finns någon text till inlägget.
	public function postIsEmpty($post){
		if(empty($post)){
			return TRUE;
		}
		return FALSE;
	} 
	 //Kollar så att en författare har angets.
	public function authorIsEmpty($author){
		if(empty($author)){
			return TRUE;
		}
		return FALSE;
	} 
	
	//Validerar det som skickas in och kollar så att det inte är skadlig kod.
	public function validateTitle($title){
		if($this->validate->Strings($title)){
			return true;
		}
		return false;
	}
	
	public function validatePost($post){
		if($this->validate->Strings($post)){
			return true;
		}
		return false;
	}
	
	public function validateAuthor($author){
		if($this->validate->Strings($author)){
			return true;
		}
		return false;
	}
	

}