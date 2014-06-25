<?php

require_once 'View/PostsView.php';
require_once 'Model/PostsHandler.php';
require_once 'Model/LoginHandler.php';

class PostsController{

	private $ret = "";
	private $message = "";

	public function DoControll(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}
		//Hämtar alla inlägg.	
		$blogposts = $postsHandler->GetPosts();
		
		//Undersöker vilken view som ska visas beroende på om man är inloggad som admin eller ej.
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllWindows(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}

		//Hämtar alla Windowsinlägg	
		$blogposts = $postsHandler->GetSpecificWindowsPosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllAndroid(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}

		//Hämtar alla Androidinlägg
		$blogposts = $postsHandler->GetSpecificAndroidPosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllGames(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}

		$blogposts = $postsHandler->GetSpecificGamesPosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllIos(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}
	
		$blogposts = $postsHandler->GetSpecificIosPosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllWindowsPhone(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}
	
		$blogposts = $postsHandler->GetSpecificWindowsPhonePosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}

	public function DoControllWebb(Database $db){

		$postsHandler = new PostsHandler($db);
		$postsView = new PostsView();
		$loginHandler = new LoginHandler($db);

		if($postsView->TriedToDeletePost()){
				if($postsHandler->DeletePost($postsView->DeletePostID())){
					$this->message .=$postsView->Message(PostsView::DELETED);					
				}
			}
	
		$blogposts = $postsHandler->GetSpecificWebbPosts();
		
		if($loginHandler->LoggedInAsAdmin() === true){
				$this->ret = $postsView->CategoryView($blogposts);
				$this->ret .= $postsView->ViewPostsAsAdmin($blogposts);
		}
		else
		{
			$this->ret = $postsView->CategoryView($blogposts);
			$this->ret .= $postsView->ViewPosts($blogposts);
		}

		return $this->ret. $this->message;

	}
}