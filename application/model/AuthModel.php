<?php 
require_once(__DIR__.'/../../core/AndreModel.php');
class AuthModel extends AndreModel{
	function __contruct(){
		parent::__construct();
	}
	function addUser(){
	}
	function authenticate($username, $password){
		$result=$this->get("array","select * from users where username='$username' and password='$password' and flag=1");
		if($result){
		return $result;
		}
		else{
		return array('uuid'=>'');
		}
		}
}
 ?>