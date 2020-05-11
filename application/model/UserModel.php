<?php 
 require_once(__DIR__.'/../../core/AndreModel.php');

class UserModel extends AndreModel{

	public function __contruct(){
		parent::__construct();

		
	}

	
	public function rawquerys(){

		$result=$this->get('object','select * from users');

		return $result;	
	}
}
 ?>