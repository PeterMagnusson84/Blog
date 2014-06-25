<?php

class BlogCommentArray{
	
	private $blogcomments = array();
	
	public function __construct(){
		
	}
	//Lägger till en kommentar i arrayen.
	public function add(CommentArray $blogcomment){
		$this->blogcomments[] = $blogcomment;
	}
	//Hämtar arrayen.
	public function getBlogcomments(){
		return $this->blogcomments;
	}
	
}

class CommentArray{
	
	private $id;
	private $comment;
	private $date;
	
	
	//En konstruktor.
	public function __construct($id, $comment, $date){
		$this->id = $id;
		$this->comment = $comment;
		$this->date = $date;
		
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getComment(){
		return $this->comment;
	}

	public function getDate(){
		return $this->date;
	}
	
	
}