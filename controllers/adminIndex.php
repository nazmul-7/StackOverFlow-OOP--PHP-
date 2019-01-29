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
			$mdata['msg'] = "Catagory Added Successfully!";
		}
		else{
			$mdata['msg'] = "Insertion Failed!";
		}

		session::set("msg", $mdata['msg']);

		header("Location: ".BASE_URL."/adminIndex/showCatagory");
	}


}