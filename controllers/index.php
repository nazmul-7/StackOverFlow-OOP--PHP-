<?php
class index extends config{

	function __construct(){

		parent::__construct();
	}

    public function home(){
		//include_once('views/partials/header.php');
		include_once('views/components/home.php');
	}

	public function signIn(){

		$redirectURL = BASE_URL.'/usersController/fbLogin';
		$permissions = ['email'];
		$loginURL = $this->helper->getLoginUrl($redirectURL, $permissions);
	//	include_once('views/partials/header.php');
		include_once('views/components/signin.php');
	}
	
	public function signUp(){
	//	include_once('views/partials/header.php');
		include_once('views/components/signup.php');
	}
}