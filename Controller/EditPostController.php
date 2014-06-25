<?php

require_once 'View/EditPostView.php';
require_once 'Model/PostsHandler.php';
require_once 'Model/LoginHandler.php';

class EditPostController{

	private $message = "";
	private $ret = "";
	private $error = FALSE;	
	
	
	public function DoControll(Database $db){
		$editPostsView = new EditPostView();
		$postsHandler = new PostsHandler($db);
		$loginHandler = new LoginHandler($db);
		$id = $_GET['id'];

		$blogposts = $postsHandler->GetSpecificPost($id);
		if($loginHandler->LoggedInAsAdmin() === true){
			$this->ret .= $editPostsView->EditPostForm($blogposts);
		}
		else{
			$this->ret .= $editPostsView->NotLoggedInAsAdmin();
		}

		if($editPostsView->TriedToEditPost()){
			
			//Kollar så att administratören har skrivit någon titel.
			if($postsHandler->titleIsEmpty($editPostsView->GetTitle())){
				$this->message .=$editPostsView->Message(EditPostView::TITLE_IS_EMPTY);
				$this->error = TRUE;
			}
			//Kollar så att admin har skrivit något inlägg.
			if($postsHandler->postIsEmpty($editPostsView->GetPost())){
				$this->message .=$editPostsView->Message(EditPostView::POST_IS_EMPTY);
				$this->error = TRUE;
			}
			//Kollar så att admin har skrivit författare.
			if($postsHandler->authorIsEmpty($editPostsView->GetAuthor())){
				$this->message .=$editPostsView->Message(EditPostView::AUTHOR_IS_EMPTY);
				$this->error = TRUE;
			}
			//Validerar så att ingen html eller javascript går igenom.
			if($postsHandler->validateTitle($editPostsView->GetTitle()) === FALSE){
				$this->message .=$editPostsView->Message(EditPostView::NO_HACK);
				$this->error = TRUE;
			}
			
			if($postsHandler->validatePost($editPostsView->GetPost()) === FALSE){
				$this->message .=$editPostsView->Message(EditPostView::NO_HACK);
				$this->error = TRUE;
			}
			
			if($postsHandler->validateAuthor($editPostsView->GetAuthor()) === FALSE){
				$this->message .=$editPostsView->Message(EditPostView::NO_HACK);
				$this->error = TRUE;
			}
			if($this->error === FALSE){
				if($postsHandler->UpdatePost($editPostsView->GetTitle(), $editPostsView->GetPost(), $editPostsView->GetAuthor(), $editPostsView->GetId())){ //skicka in $blogpost
					$this->message .=$editPostsView->Message(EditPostView::POST_UPDATED);
				}
			}
		}

		return $this->ret . $this->message;
	}

}