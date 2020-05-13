<?php
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../model/EmployeeModel.php');
require_once(__DIR__.'/../../core/AndreController.php');
class Users extends AndreController{
	function __construct(){
        $this->UserData=new UserModel();
        $this->EmpData=new EmployeeModel();
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
    public function newPwd(){
        $data['template']='change_password';
     return  $this->load_view('main',$data);
       }
    public function changePwd(){
        $data['template']='change_password';
        $data['msg']=$this->UserData->changePwd();
        return  $this->load_view('main',$data);
	}
    public function changeState(){
        $post=$this->inputpost('input1');
	print_r($post);
	}
}
?>