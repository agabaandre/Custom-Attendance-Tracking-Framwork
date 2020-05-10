<?php 
 require_once(__DIR__.'/../../core/AndreModel.php');

class UserModel extends AndreModel{

	public function __contruct(){
		parent::__construct();
	
	
		
	}

	function allUsers(){

		return $this->select('users',array('*'),null);
	}

	function User($id){

		return $this->select('users', array('*'), array('uuid'=>$id));
	}
	public function rawquerys(){

		$result=$this->query('select* from users');

		return $result;

	
		
	}
}
 ?>