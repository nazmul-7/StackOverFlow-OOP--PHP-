<?php

/**
*  Main Database
*/
class database extends PDO{
	
	function __construct($dsn, $user, $pass){
		
		 parent::__construct($dsn, $user, $pass);
	}

	

	/* User Database Query */

	public function getuserdata($table, $condition=1){

		$sql="SELECT * FROM $table where $condition ";
		$stat=$this->prepare($sql);
		$stat->execute();
		return $stat->fetchAll(PDO::FETCH_ASSOC);	
	}

	public function userInsert($table, $data){
		$keys   = implode(',', array_keys($data));
		$values =':'. implode(', :', array_keys($data));
		$sql    = "INSERT into $table($keys) Values($values)";

		$stat   = $this->prepare($sql);
		foreach ($data as $key => $value) {
		 	$stat->bindValue(":$key", $value);
		 } 
		  return $stat->execute();
	}

	public function usercontroll ($table, $condition){

		$sql="SELECT *  FROM $table where $condition";
		$state = $this->prepare($sql);
		$state->execute();
		return $state->rowCount();
	}


	

    
}