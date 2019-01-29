<?php


/**
*  loadder class
*/
class load {
	
	public function view($name,$data = false){
		if( $data == true){
			extract($data);
		}
		include_once "views/components/".$name.".php";
	}

}

?>