<?php

require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../../core/AndreController.php');

class Auth extends AndreController{

	function __construct(){
		$this->UserData=new UserModel();
	
	}

	
	public function getUsers(){

		$username=$this->inputpost('username');
		$password=$this->inputpost('password');
		$userdata=$this->UserData->authenticate($username,sha1(md5($password)));
	   // print_r($userdata);
		foreach($userdata as $user){
			 $uuid=$user['uuid'];
			 $username=$user['username'];
			 $usertype=$user['usertype'];
			 $name=$user['name'];

		}

		if($uuid!=''){

			$_SESSION['username']=$username;
			$_SESSION['usertype']=$usertype;
			$_SESSION['name']=$name;
			$_SESSION['uuid']=$uuid;
			$data['template']='home';
			
            
			
			$this->load_view('main',$data);
			
		}
		else{
            $data=['Wrong Username or Password'];
			$this->load_view('login',$data);
		}

    
	 

	}
	public function logout(){
		session_destroy();
		$data=['Log Out Successful'];
		$this->load_view('login',$data);


	}
	public function addUser_post(){

		$post=$this->inputpost('input1');

		print_r($post);

    
	 

	}


}

	



?>