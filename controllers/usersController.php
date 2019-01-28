<?php

class usersController extends config{
	
	function __construct(){
		parent::__construct();
    }

    public function userRegistration(){

		$firstName = isset($_POST["firstName"])? $_POST["firstName"]: NULL; 
		$lastName = isset($_POST["lastName"])? $_POST["lastName"]: NULL;
		$userName = isset($_POST["userName"])? $_POST["userName"]: NULL;
		$email = isset($_POST["email"])? $_POST["email"]: NULL;
		$password = isset($_POST["password"])? $_POST["password"]: NULL;
		$cpassword = isset($_POST["confirmPassword"])? $_POST["confirmPassword"]: NULL;
        $min=3;
		$max=50;
		$error=[];
		$table="users";
        
        if(strlen($firstName)<$min){
			$error['firstName']="The Minimun character For First Name should be {$min}!!";
		}
		if(strlen($firstName)>$max){
			$error['firstName']="The Maximum character For First Name  should be {$max}!!";
        }
        
        if(strlen($lastName)<$min){
			$error['lastName']="The Minimun character For Last Name should be {$min}!!";
		}
		if(strlen($lastName)>$max){
			$error['lastName']="The Maximum character For Last Name  should be {$max}!!";
        }
		if(strlen($email)<$min){
			$error['email']="The Minimun character For Email should be {$min}!!";
		}
		if(strlen($email)>$max){
			$error['email']="The Maximum character For Email  should be {$max}!!";
		}

        $conditionition ="email='$email' ";
		if($this->db->getuserdata($table, $condition)){
			$error['email']="This Email is already in our Database!!";
        }
		if(strlen($userName)<$min){
			$error['userName']="The Minimun character For User Name should be {$min}!!";
        }
		if(strlen($userName)>$max){
			$error['userName']="The Maximum character For User Name   should be {$max}!!";
		}

        $condition ="userName='$userName' ";
		if($this->db->getuserdata($table, $condition)){
			$error['userName']="User Name is alreay taken!!";
		}
		if(strlen($password)<$min){
			$error['password']="The Minimun character For Password should be {$min}!!";
		}
		if(strlen($password)>$max){
			$error['password']="The Maximum character For Password  should be {$max}!!";
		}
		if($password!==$cpassword){
			$error['password']="Password doesn't match!!";
		}

		if(empty($error)){
            $data  = array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
					'userName' => $userName, 
					'email' => $email,
					'password' => $password
					);
            $result = $this->db->userInsert($table, $data);
        
	        if($result==1){
		    
			    $mdata['msg'] = "Your regtration Successful...<br/>Please Login";
		    }
		    else { $mdata['msg'] = "There was a error";}
		    session::start();
		    session::set("msg", $mdata['msg']);
            header("Location: ".BASE_URL."/index/signIn");
		}
        else{
            session::start();
            session::set("error", $error);
            print_r($error);
            header("Location: ".BASE_URL."/index/signUp");
        }
    }
    
    public function userLogin(){
		$error=[];
		$data=[];
		$table="users";

		$userName = isset($_POST["userName"])? $_POST["userName"]: NULL;
		$data['userName'] = $userName;
		$password = isset($_POST["password"])? $_POST["password"]: NULL;
		$data['password'] = $password;
		$remember = isset($_POST["remember"])? $_POST["remember"]: NULL;
		$data['remember'] = $remember;
		
		//$password = md5($password);
		
		$condition = "( userName ='$userName' OR email = '$userName')";
		$count      = $this->db->usercontroll($table, $condition);
		if ($count > 0) {
			$condition = "( userName ='$userName' OR email = '$userName') and password='$password'";
			$count      = $this->db->usercontroll($table, $condition);
			if($count>0){

				$dbData = $this->db->getuserData($table, $condition);
				if($remember == "on"){
					setcookie("login",true,time()+84600);
					setcookie("userName",$userName,time()+84600);
					setcookie("id",$dbData[0]["id"],time()+84600);
					setcookie("status",$dbData[0]["status"],time()+84600);
				}
				session::start();
				session::set('dbData',$dbData);
				session::set("login", true);
				session::set("userName", $dbData[0]["userName"]);
				session::set("firstName", $dbData[0]["firstName"]);
				session::set("id", $dbData[0]["id"]);
				session::set("status", $dbData[0]["status"]);
				session::set("userType", $dbData[0]["userType"]);
				header("Location: ".BASE_URL);
			}
			else{
				session::start();
				$error['password']="Password  doesn't Match";
				session::set("error", $error);
				session::set("data", $data);
				header("Location: ".BASE_URL."/index/signIn");
			}
		} 
		else {
			session::start();
			$error['userName']="Username or Email doesn't Exist";
			session::set("error", $error);
			session::set("data", $data);
			header("Location: ".BASE_URL."/index/signIn");
		}
    }
    
    public function userLogout(){
		session::start();
		session::destroy();
		if(isset($_COOKIE['login'])){
			unset($_COOKIE['login']);
			unset($_COOKIE['username']);
			unset($_COOKIE['userid']);
			unset($_COOKIE['status']);
			unset($_COOKIE['userType']);
			setcookie("login",true,time()-84600);
			setcookie("username",$username,time()-84600);
			setcookie("userid",$data[0]["userid"],time()-84600);
			setcookie("status",$data[0]["status"],time()-84600);
			setcookie("userType",$data[0]["userType"],time()-84600);
		}
		header("Location: ".BASE_URL."/index/signIn");
	}

	public function fbLogin(){
		$data=[];
		$table="users";

		try {
			$accessToken = $this->helper->getAccessToken();
		} catch (\Facebook\Exceptions\FacebookResponseException $e) {
			echo "Response Exception: " . $e->getMessage();
			exit();
		} catch (\Facebook\Exceptions\FacebookSDKException $e) {
			echo "SDK Exception: " . $e->getMessage();
			exit();
		}
	
		if (!$accessToken) {
			header('Location: login.php');
			exit();
		}
	
		$oAuth2Client = $this->FB->getOAuth2Client();
		if (!$accessToken->isLongLived()){
			$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		}
		$response = $this->FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
		$userData = $response->getGraphNode()->asArray();

		$fbEmail=$userData['email'];
		$condition = "( email = '$fbEmail')";
		$count      = $this->db->usercontroll($table, $condition);

		if ($count > 0){
			$dbData = $this->db->getuserData($table, $condition);
			session::start();
			session::set("login", true);
			session::set("firstName", $dbData[0]["firstName"]);
			session::set("id", $dbData[0]["id"]);
			session::set("status", $dbData[0]["status"]);
			header("Location: ".BASE_URL);
		}
		else{
			$data  = array(
				'firstName' => $userData['first_name'],
				'lastName' =>  $userData['last_name'],
				'email' => $userData['email'],
				);

			$result = $this->db->userInsert($table, $data);
			if($result==1){
				$dbData = $this->db->getuserData($table, $condition);
				session::start();
				session::set("login", true);
				session::set("firstName", $dbData[0]["firstName"]);
				session::set("id", $dbData[0]["id"]);
				session::set("status", $dbData[0]["status"]);
				header("Location: ".BASE_URL);
			}
			else{
				$mdata['msg'] = "There was a error";
		    	session::start();
		    	session::set("msg", $mdata['msg']);
				header("Location: ".BASE_URL."/index/signIn");
			}
		}
		// $_SESSION['userData'] = $userData;
		// $_SESSION['access_token'] = (string) $accessToken;
		// header('Location: index.php');
		// exit();
	}
}