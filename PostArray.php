<?php

class PostsArray{
	
	private $blogposts = array();
	
	public function __construct(){
		
	}
	//Lägger till ett inlägg i arrayen
	public function add(Blogpost $blogpost){
		$this->blogposts[] = $blogpost;
	}
	//Hämtar inlägg ifrån arrayen.
	public function getBlogposts(){
		return $this->blogposts;
	}
	
}

class PostArray{
	
	private $id;
	private $title;
	private $post;
	private $author;
	private $date;
	private $category;
	
	public function __construct($id, $title, $post, $author, $date, $category){
		$this->id = $id;
		$this->title = $title;
		$this->post = $post;
		$this->author = $author;
		$this->date = $date;
		$this->category = $category;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getPost(){
		return $this->post;
	}
	
	public function getAuthor(){
		return $this->author;
	}

	public function getCategory(){
	return $this->category;
	}

	public function getDate(){
		return $this->date;
	}
	
}