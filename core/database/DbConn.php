<?php 

require_once(__DIR__.'/../../config/Dbconfig.php');
class DbConn extends Dbconfig{

	public function __construct(){
		
		$settings = new Dbconfig();
		$this->dbsetting = $settings->dbsettings();
	}

   
	function dbconnection(){
		$conn = new mysqli($this->dbsetting['servername'],$this->dbsetting['username'],$this->dbsetting['password'],$this->dbsetting['dbname'],$this->dbsetting['port']);
		if($conn->connect_error){
			die("Connection Faild: ". $conn->connect_error);
		}
		return $conn;
	}
	
	

}



?>