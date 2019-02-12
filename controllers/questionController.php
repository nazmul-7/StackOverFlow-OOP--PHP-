<?php
class questionController extends config

{
	function __construct(){
		parent::__construct();
	}
	public function showAllQuestion(){
		
		$data['question'] = $this->db->getQuestoinData();
		$this->load->partial("header");
		$this->load->view("allQuestion", $data);
		$this->load->partial("footer");
	}
	public function showAddQuestion()
	{	
		if (session::get("login") == true && session::get("status") == true) {
			$table = 'categories';
			$data['category'] = $this->db->getuserdata($table);
			$this->load->partial("header");
			$this->load->view("addQuestion", $data);
			$this->load->partial("footer");
		}
		else {
			$mdata['msg'] = "Please login to ask question!";
			session::set("msg", $mdata['msg']);
			header("Location: " . BASE_URL . "/index/signIn");
			
		}
	}
	public function storeQuestion(){
		$temp = false;
		$table = 'questions';
		$data = array();
		$user_id = session::get('id');
		$title = isset($_POST["title"]) ? $_POST["title"] : NULL;
		$content = isset($_POST["content"]) ? $_POST["content"] : NULL;
		$category_id = isset($_POST["category_id"]) ? $_POST["category_id"] : NULL;
		$data = array(
			'user_id' => $user_id,
			'category_id' => $category_id,
			'date' => date("Y/m/d") ,
			'title' => $title,
			'content' => $content,
		);
		$result = $this->db->userInsert($table, $data);
		if ($result == 1) {
			$mdata['msg'] = "Your question Posted Successfully!";
			$temp = true;
		}
		else {
			$mdata['msg'] = "Something went wrong!";
		}
		session::set("msg", $mdata['msg']);
		header("Location: " . BASE_URL . "/questionController/showAllQuestion");
	}
	public function storeAnswer(){
		session::start();
		$table = 'answers';
		$data = array();
		$user_id = session::get('id');
		$question_id = isset($_POST["question_id"]) ? $_POST["question_id"] : NULL;
		$content = isset($_POST["content"]) ? $_POST["content"] : NULL;
		$data = array(
			'user_id' => $user_id,
			'question_id' => $question_id,
			'date' => date("Y/m/d") ,
			'content' => $content
		);
		//print_r($data);
		echo ($user_id);
		$result = $this->db->userInsert($table, $data);
		if ($result == 1) {
			$mdata['msg'] = "Your question Posted Successfully!";
			$temp = true;
		}
		else {
			$mdata['msg'] = "Something went wrong!";
		}
		session::set("msg", $mdata['msg']);
		//header("Location: " . BASE_URL . "/questionController/questionDetails/$question_id");
	}
	public function getAnswers($id)
	{	
			$table = 'answers';
			$condition = " question_id = $id";
			$answers = $this->db->getuserdata($table,$condition);
			echo json_encode($answers);
			// $this->load->partial("header");
			// $this->load->view("addQuestion", $data);
			// $this->load->partial("footer");
	}
	public function questionDetails($id)	{
		$condition = "questions.id = $id";
		$data['questionDetails'] = $this->db->getQuestoinData($condition);
		$this->load->partial("header");
		$this->load->view("questionDetails", $data);
		$this->load->partial("footer");
	}
	public function showDate(){
		return date("Y/m/d");
	}
}
