<?php

require_once 'Validate.php';
require_once 'CommentArray.php';
require_once 'PostArray.php';

class CommentsHandler{

	private $db;
	private $validate;

	public function __construct(Database $db){
		$this->db = $db;
		$this->validate = new Validate();
	}
	//INSERT INTO comments(comment, postid) VALUES(?, ?)
	//Funktion för att skapa en kommentar till databasen.
	public function CreateComment($comment, $postid){
		$sqlQuery = "INSERT INTO comments(comment, postid) VALUES(?, ?)";
		
		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('si', $comment, $postid);
		
		if($this->db->Execute($stmt) === TRUE){
			return TRUE;
		}
			return FALSE;
	}

	public function GetSpecificComments($postid){
		
		$sqlQuery = "SELECT comments.id, comments.comment, comments.date
					FROM comments INNER JOIN posts ON posts.id = comments.postid 
					WHERE postid = ? ORDER BY id Desc";
		
		
		$stmt = $this->db->Prepare($sqlQuery);
						
		$stmt->bind_param('i', $postid);
		
		$this->db->Execute($stmt);
		
		if ($stmt->bind_result($id, $comment, $date) == FALSE) {
            throw new \Exception($this->mysqli->error);
        }
		
        $ret = new BlogCommentArray();
        while ($stmt->fetch()) {
        	$ret->add(new CommentArray($id, $comment, $date));
        }
                
        $stmt->close();
                
        return $ret;
				
	}

	//Funktion för att ta bort en kommentar.
	public function DeleteComment($deleteCommentID){
		$sqlQuery = "DELETE FROM comments WHERE id = ?";
		
		$stmt = $this->db->Prepare($sqlQuery);
		
		$stmt->bind_param('i', $deleteCommentID);
		
		if($this->db->execute($stmt)){
			$stmt->close();
			return true;
		}
		else
		{
			$stmt->close();
			return false;
		}		
	}

	//Kollar så att användaren har skrivit en kommentar
	public function commentIsEmpty($comment){
		if(empty($comment)){
			return TRUE;
		}
		return FALSE;
	} 
	//Validerar kommentaren.
	public function validateComment($comment){
		if($this->validate->Strings($comment)){
			return true;
		}
		return false;
	}
}