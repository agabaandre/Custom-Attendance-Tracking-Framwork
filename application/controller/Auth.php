<?php
require_once(__DIR__.'/../model/AuthModel.php');
require_once(__DIR__.'/../../core/AndreController.php');
require_once(__DIR__.'/../model/EmployeeModel.php');
require_once(__DIR__.'/../model/AttendanceModel.php');
class Auth extends AndreController{
	function __construct(){
		$this->UserData=new AuthModel();
		$this->AttData=new AttendanceModel();
		$this->EmpData=new EmployeeModel();	
	}
	public function login(){
	   $data['template']='login';
	return	$this->load_view('login','');
	}
	public function home(){
		$data['template']='home';
		$data['employees']=$this->EmpData->viewEmpoyees();
		$data['widgets']=$this->AttData->widget_data();
		
	 return	$this->load_view('main',$data);
	 }
	public function authenticate(){
		$username=$this->inputpost('username');
		$password=$this->inputpost('password');
		$data['employees']=$this->EmpData->viewEmpoyees();
		$userdata=$this->UserData->authenticate($username,md5($password));
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
			$data['widgets']=$this->AttData->widget_data();
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