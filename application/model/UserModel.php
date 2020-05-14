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
	public function addUsers(){
		$data=$this->inputpost();
		$result=$this->insert('users',$data);
		if($result){
		return 'Added Successfully';	 
		}
		else{
		return 'Failed';
		}
	}
	public function updateUsers(){
		
		$result=$this->update('users',$this->inputpost(),array('uuid'=>$this->inputpost('uuid')));
		if($result){
		return 'Successfull';	 
		}
		else{
		return 'Failed';
		}
	}
	public function changePwd(){
		$oldpwd=$this->inputpost('oldpwd');
		$newpwd=sha1(md5($this->inputpost('newpwd')));
		$realoldpwd=sha1(md5($oldpwd));
		$username=$this->inputpost('username');
		$check=$this->get('array',"SELECT * from users where username='$username'");
		foreach($check as $row){
			$dboldpwd=$row['password'];
		}
		if($realoldpwd==$dboldpwd){
		$sql=$this->rawquery("UPDATE `users` SET `password` = '$newpwd' WHERE `users`.`username` = '$username'; ");
	     if($sql){
		 return 'Changed Successful';	 
		 }
		 else{
		return 'Change Failed';
		 }
		}
		else{
		return 'Change Failed';
		}
	}
}
 ?>