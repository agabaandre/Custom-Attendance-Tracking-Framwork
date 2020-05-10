<?php 

require_once(__DIR__.'/../../core/AndreModel.php');

class Auth_Model extends AndreModel{

	function __contruct(){
		parent::__construct();
	}

	function addUser(){
		return $this->select('users',array('*'),null);
	}

	function getUser($id){

		return $this->select('users', array('*'), array('uuid'=>$id));
	}
	function rawquerys(){
		// return $this->query('select * from users where uuid=2');
		 

		 
		
	}
}
 ?>