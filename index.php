<?php
session_start();

require_once 'DBConfig.php';
require_once 'Database.php';
require_once 'View/PageView.php';
require_once 'View/NavigationView.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/RegisterController.php';
require_once 'Controller/CreatePostController.php';
require_once 'Controller/PostsController.php';
require_once 'Controller/CommentController.php';
require_once 'Controller/EditPostController.php';

class MasterController{
	
	public static function DoControll(){

		$navigationView = new NavigationView();
		$pageView = new PageView();
		$pageView->StyleSheet('style.css');
		$db = new Database();
		
		$db->Connect(new DBConfig);

			//Detta visas på startsidan.
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControll($db);
				
		
		//Om admin trycker på skapa nytt inlägg.
		if($navigationView->navCreatePost()){
			$createpostController = new CreatePostController();
			$loginController = new LoginController();
			$controller = $loginController->DoControll($db);
			$controller .= $createpostController->DoControll($db);
		}		
		//Om användaren trycker på "Registrera dig" länken visas detta.
		if($navigationView->navRegister()){
			$registerController = new RegisterController();
			$loginController = new LoginController();
			$controller = $loginController->DoControll($db);
			$controller .= $registerController->DoControll($db);			
		}
		//Om användaren trycker på kommentera länken visas detta.
		if($navigationView->navComment()){
			$commentController = new CommentController();
			$loginController = new LoginController();
			$controller = $loginController->DoControll($db);
			$controller .= $commentController->DoControll($db);
		}
		//Om admin trycker på redigera vissas detta.
		if($navigationView->navEdit()){
			$editPostController = new EditPostController();
			$loginController = new LoginController();
			$controller = $loginController->DoControll($db);
			$controller .= $editPostController->DoControll($db);
		}
		//Om användaren trycker på Windowskategorin vissas detta.
		if($navigationView->navWindows()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllWindows($db);
		}	
		//Om användaren trycker på Androidkategorin vissas detta.
		if($navigationView->navAndroid()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllAndroid($db);
		}	
		//Om användaren trycker på Spelkategorin vissas detta.
		if($navigationView->navSpel()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllGames($db);
		}	
		//Om användaren trycker på iOSkategorin vissas detta.
		if($navigationView->navIos()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllIos($db);
		}
		//Om användaren trycker på WindowsPhonekategorin vissas detta.
		if($navigationView->navWindowsPhone()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllWindowsPhone($db);
		}		
		//Om användaren trycker på Webbkategorin vissas detta.
		if($navigationView->navWebb()){
			$loginController = new LoginController();
			$postsController = new PostsController();
			$controller = $loginController->DoControll($db);
			$controller .= $postsController->DoControllWebb($db);
		}	
		
		
		$body = $pageView->GetXHTML10StrictPage("PeterMagnusson84 - www.petermangusson84.nu", $controller);

		return $body;
		
		$db->Close();
		    	
		        

	}



}
echo MasterController::DoControll();



?>