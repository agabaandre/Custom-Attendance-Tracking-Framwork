<?php

require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../../core/AndreController.php');

class Auth extends AndreController{

	function __construct(){
		$this->UserData=new UserModel();
	
	}
	public function login(){
	
	   $data['template']='home';
	   $data['users']=$this->UserData->rawquerys();

       
	  // print_r($data);

	   
	return	$this->load_view('main',$data);
	}
	public function addUser_post(){

		$post=$this->inputpost('input1');

		print_r($post);

    
	 

	}


}

	



?>