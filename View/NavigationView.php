<?php

class NavigationView{
	
	private static $RegisterView = "Register";
	private static $CreatePostView = "Admin";
	private static $CreateCommentView = "Comments";
	private static $EditPostView = "Edit";
	private static $WindowsCategoryPostsView = "Windows";
	Private static $AndroidCategoryPostsView = "Android";
	private static $SpelCategoryPostsView = "Spel";
	Private static $IosCategoryPostsView = "iOS";
	private static $WindowsPhoneCategoryPostsView = "WP";
	Private static $WebbCategoryPostsView = "Webb";
		
		// Kollar om url:en säger ?Register
		public function navRegister(){
			if(isset($_GET[self::$RegisterView])){
				return true;
			}
			return false;
		}

		public function navCreatePost(){
			if(isset($_GET[self::$CreatePostView])){
				return true;
			}
			return false;
		}

		public function navComment(){
			if(isset($_GET[self::$CreateCommentView])){
				return TRUE;
			}
			return FALSE;
		}

		public function navEdit(){
			if(isset($_GET[self::$EditPostView])){
				return TRUE;
			}
			return FALSE;
		}

		public function navWindows(){
			if(isset($_GET[self::$WindowsCategoryPostsView])){
				return true;
			}
			return false;
		}

		public function navAndroid(){
			if(isset($_GET[self::$AndroidCategoryPostsView])){
				return true;
			}
			return false;
		}

		public function navSpel(){
			if(isset($_GET[self::$SpelCategoryPostsView])){
				return true;
			}
			return false;
		}

		public function navIos(){
			if(isset($_GET[self::$IosCategoryPostsView])){
				return true;
			}
			return false;
		}

		public function navWindowsPhone(){
			if(isset($_GET[self::$WindowsPhoneCategoryPostsView])){
				return true;
			}
			return false;
		}

		public function navWebb(){
			if(isset($_GET[self::$WebbCategoryPostsView])){
				return true;
			}
			return false;
		}
		
}
