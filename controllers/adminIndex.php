<?php
class adminIndex extends config{

	function __construct(){

		parent::__construct();
	}

    public function showCatagory(){ 
		$table='catagories';
		$data['catagoryData'] = $this->db->getuserdata($table);
		if( $data == true){
			extract($data);
		}
		include_once('views/components/addCatagory.php');
	}
    public function addCatagory(){

		$catagory = isset($_POST["catagory"])? $_POST["catagory"]: NULL;

		$data  = array(
			'name' => $catagory
			);
		$table='catagories';
		$result = $this->db->userInsert($table, $data);
		
		if($result==1){
			$data['msg'] = "Catagory Added Successfully!";
		}
		else{
			$data['msg'] = "Insertion Failed!";
		}

		$data['catagoryData'] = $this->db->getuserdata($table);
		if( $data == true){
			extract($data);
		}
		include_once('views/components/addCatagory.php');

		// if(strlen($catagory)<1){
		// 	$error['catagory']="The Minimun character For First Name should be {$min}!!";
		// }
		
	//	include_once('views/components/addCatagory.php');
	}


}