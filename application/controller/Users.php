<?php

require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../../core/AndreController.php');

class Users extends AndreController{

	function __construct(){
		$this->UserData=new UserModel();
	
	}

	
	public function getUsers(){

	
        $data['users']=$this->UserData->getUsers();
        $data['template']='manage_users';
	   
	$this->load_view('main',$data);

    }

	public function addUser(){

		$post=$this->inputpost('input1');

		print_r($post);
	 
    }
    public function changeState(){

		$post=$this->inputpost('input1');

		print_r($post);

    
	 

	}


}

	



?>