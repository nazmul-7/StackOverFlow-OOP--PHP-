<?php
class questionController extends config{

	function __construct(){

		parent::__construct();
	}

    public function showAllQuestion(){ 
		$table='questions';
		$data['question'] = $this->db->getuserdata($table);
		$table='catagories';
		$data['catagory'] = $this->db->getuserdata($table);
		$this->load->view("allQuestion",$data);
	}
    public function showAddQuestion(){
		if(session::get("login") == true && session::get("status")==true){
				
				$table='catagories';
				$data['catagory'] = $this->db->getuserdata($table);
				$this->load->view("addQuestion",$data);
		}
		else{
			$mdata['msg'] = "Please login to ask question!";
			session::set("msg", $mdata['msg']);
			header("Location: ".BASE_URL."/index/signIn");
		}

		
		

	}
    public function storeQuestion(){
		$temp=false;
		$table = 'questions';
		$data  = array();
		$user_id = session::get('id');
		$title = isset($_POST["title"])? $_POST["title"]: NULL;
		$content = isset($_POST["content"])? $_POST["content"]: NULL;
		$category_id = isset($_POST["category_id"])? $_POST["category_id"]: NULL;
		$data  = array('user_id' => $user_id,
					'category_id' => $category_id,
					'title' => $title, 
					'content' => $content,
					);
		
		$result = $this->db->userInsert($table, $data);

		if($result==1){
			$mdata['msg'] = "Your question Posted Successfully!";
				$temp=true;
		}
		else{
			$mdata['msg'] = "Something went wrong!";
		} 

	session::set("msg", $mdata['msg']);
	header("Location: ".BASE_URL."/questionController/showAllQuestion");
	
	
	}


}