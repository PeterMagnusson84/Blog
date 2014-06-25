<?php

require_once 'View/CreatePostView.php';
require_once 'Model/PostsHandler.php';
require_once 'Model/LoginHandler.php';

class CreatePostController{

	private $ret = "";
	private $message = "";
	private $error = FALSE;

	public function DoControll(Database $db){
		$createpostView = New CreatePostView();
		$postsHandler = New PostsHandler($db);
		$loginHandler = New LoginHandler($db);

		if($loginHandler->LoggedInAsAdmin() === true){
			$this->ret .= $createpostView->CreatePostForm();
		}
		else{
			$this->ret .= $createpostView->NotLoggedInAsAdmin();
		}
		

		if($createpostView->TriedToPost()){
			
			//Kollar så att administratören har skrivit någon titel.
			if($postsHandler->titleIsEmpty($createpostView->GetTitle())){
				$this->message .=$createpostView->Message(CreatePostView::TITLE_IS_EMPTY);
				$this->error = TRUE; 
			}
			//Kollar så att admin har skrivit något inlägg.
			if($postsHandler->postIsEmpty($createpostView->GetPost())){
				$this->message .=$createpostView->Message(CreatePostView::POST_IS_EMPTY);
				$this->error = TRUE;
			}
			//Kollar så att admin har skrivit författare.
			if($postsHandler->authorIsEmpty($createpostView->GetAuthor())){
				$this->message .=$createpostView->Message(CreatePostView::AUTHOR_IS_EMPTY);
				$this->error = TRUE;
			}
			//Validerar så att ingen html eller javascript går igenom.
			if($postsHandler->validateTitle($createpostView->GetTitle()) === FALSE){
				$this->message .=$createpostView->Message(CreatePostView::NO_HACK);
				$this->error = TRUE;
			}
			
			if($postsHandler->validatePost($createpostView->GetPost()) === FALSE){
				$this->message .=$createpostView->Message(CreatePostView::NO_HACK);
				$this->error = TRUE;
			}
			
			if($postsHandler->validateAuthor($createpostView->GetAuthor()) === FALSE){
				$this->message .=$createpostView->Message(CreatePostView::NO_HACK);
				$this->error = TRUE;
			}
			
			if($this->error === FALSE){
				if($postsHandler->CreatePost($createpostView->GetTitle(), $createpostView->GetPost(), $createpostView->GetAuthor(), $createpostView->GetCategory())){ //skicka in $blogpost
					$this->message .=$createpostView->Message(CreatePostView::POST_CREATED);
				}
			}	
		}

		return $this->ret . $this->message;
	}
}