<?php 
 require_once(__DIR__.'/../../core/AndreModel.php');

class UserModel extends AndreModel{

	public function __contruct(){
		parent::__construct();

		
	}

	
	public function getUsers(){

		$result=$this->get('array','select * from users');

		return $result;	
	}
}
 ?>