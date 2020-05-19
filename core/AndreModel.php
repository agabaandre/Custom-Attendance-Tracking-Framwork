<?php
require_once(__DIR__.'/database/DbConn.php');
class AndreModel extends DbConn{
	
	public function __construct()
    {
		$dbcon = new DbConn();
		 $this->connection= $dbcon->dbconnection();
		$mysqli=$this->connection;
	}
	public function environment(){
		//use debug or prod to turn on or off the queries
		$environment='prod';
	return $environment;
	}
	//use for delete, update, insert sql raw queries that dont return result
	//example: $this->rawquery('Delete from users where uuid=1");
	function rawquery($sql){
		$sql=$this->appendSemicolon($sql);
		$result = $this->connection->query($sql);
		if($this->environment()=='debug'){
		echo $sql;
		}
		if($result)
		return 'SUCCESS';
		else
		return 'Failed SQL ERROR';
	}
	//Example: $this->insert('users',$this->inputpost());
	function insert($tableName,$insertWhat){
		$sql='INSERT INTO '.$tableName.'(';
		foreach ($insertWhat as $key => $value)
		$sql .= $key.',';
		$sql=rtrim($sql,',');
		$sql.=')';
		$sql.=' VALUES(';
		foreach ($insertWhat as $key => $value)
		$sql .= '\''.$value.'\',';
		$sql=rtrim($sql,',');
		$sql.=')';
		$sql=$this->appendSemicolon($sql);
		if($this->environment()=='debug'){
		echo $sql;
		}
		$result = $this->connection->query($sql);
		if($result)
			return $result;
		else
		return 'Failed SQL ERROR';
	}
	//you can get the array to update from the form using $this->inputpost();, with this you have to only declare the array for conditions.
	//sample: $this->update('employee_details',array('Surname'=>'Andrew','Firstname=>'Agaba'), array('emp_id'=>'1'));
    function update($tableName,$whatToSet,$whereArgs){
    	$sql='UPDATE '.$tableName .' SET ';
    	foreach ($whatToSet as $key => $value)
    	$sql .= $key .'=\'' . $value . '\',';
    	$sql=rtrim($sql,',');
	   if($whereArgs)
		$sql= $this->where($sql,$whereArgs);	
		$sql=$this->appendSemicolon($sql);
		if($this->environment()=='debug'){
		echo $sql;
		}
	    $result = $this->connection->query($sql);
		if($result)
			return $result;
		else
		return 'Failed SQL ERROR';
	}
	//example: $this->delete('users',array('id'=>'1','flag'=>'0'));
   function delete($tableName,$whereArgs){
   	    $sql='DELETE FROM '.$tableName;
	   if($whereArgs)
	   	$sql=$this->where($sql,$whereArgs);
		$sql=$this->appendSemicolon($sql);
		if($this->environment()=='debug'){
		echo $sql;
		}
	  	$result = $this->connection->query($sql);
		if($result)
		return $result;
		else
		return 'Failed SQL ERROR';
   }
    function where($sql,$whereArgs){
    	$sql.=' WHERE ';
    	foreach ($whereArgs as $key => $value)
    		$sql.=$key.' = \''.$value.'\' AND ';
    	$sql=rtrim($sql,'AND ');  	
    	return $sql;
    }
	function appendSemicolon($sql){
		if(substr($sql,-1)!=';')
			return $sql.' ;';	
	}
	//this returns data from in either and array or object format from a raw query
	//example: $result=$this->get("array","SELECT * FROM users");
	function get($type,$query){
		$sql=$this->appendSemicolon($query);
		if($this->environment()=='debug'){
		echo $sql;
		}
		$array=array();
		$result = $this->connection->query($sql);
		if($result){
		if ($type=="object"){
		while($row=mysqli_fetch_object($result))
		array_push($array,$row);
		return $array;
		}
		elseif ($type=="array"){
			while($row=mysqli_fetch_assoc($result))
			array_push($array,$row);
		return $array;  
		}
		else
		return 'Failed SQL ERROR'; 
		}
		}
         //Get the rows affted after running a query
		//Usage: $affectedrows = $this->affected_rows();
	function affected_rows(){
		$data=$this->connection->affected_rows;
		if($this->environment()=='debug'){
			echo $data;
		}
		return $data;
	}
		// counts number of rows in  a result set from a run query.
		//$this->num_rows($sqlresult)
	function num_rows($sqlresult){
			$results=$this->connection->query($sqlresult);
			$data=$results->num_rows;
			if($this->environment()=='debug'){
				echo $data;
			}
			return $data;
	}
		//close a db connection;
	public function dbclose()
		{
		return	$this->connection->close();
		
	}
	public function helpers(){

	return	require_once(__DIR__.'/../config/helpers.php');

	}
	
	//this process form postinputs
		//instead of running $_POST['name]; you can run $this->inputpost('name);
  function inputpost($fieldname=FALSE){
			$sqlines=array('SELECT','select','Select','UPDATE','Update','update','DELETE',
			'Delete','delete','*','union','UNION','WHERE','where','AS','as','As','aS','#',
			'?','%','%%','??','$$','$','+','(',')','!','^','=');
			if($fieldname){
			// remove sql key statements
			$result=($_POST[$fieldname]);
			$fresult=str_replace($sqlines,'',$result);
			}
			else{
			$result=($_POST);
			$fresult=str_replace($sqlines,'',$result);
			}
			if($this->environment()=='debug'){
				echo $fresult;
			}
		return $fresult;
		}
		//works like above but use it for data sources you are sure of
 function inputpost_clean($fieldname=FALSE){
			if($fieldname){
			// remove sql key statements
			$result=($_POST[$fieldname]);
			$fresult=$result;
			}
			else{
			$result=($_POST);
			$fresult=$result;
			}
			if($this->environment()=='debug'){
				echo $fresult;
		   }
		return $fresult;
	}
        //helps in navigation
        //usage: call the function and the name path to the file
        // include(systempath().application/views/home.php
    function system_path(){
            $variable = $_SERVER['DOCUMENT_ROOT'];
            $variable .= $_SERVER['PHP_SELF'];
            $npath = substr($variable, 0, strpos($variable, "index.php"));
            return $npath;
        }
        // run only in models or controllers
        //you can access using the name within the class loading e.g $this->Attendance if the 
        //load like $this->load_controller('Attendance');
    function load_controller($name){
        $variable = $_SERVER['DOCUMENT_ROOT'];
        $variable .= $_SERVER['PHP_SELF'];
        $npath = substr($variable, 0, strpos($variable, "index.php"));
        if(!empty($name)){
            foreach ($name as $controller) {
                include($npath.'application/controller/'.$controller.'.php'); $controller = new $controller;
            }
           
        }
    }
    // run only in models or controllers
    function load_model($name=NULL){
        $variable = $_SERVER['DOCUMENT_ROOT'];
        $variable .= $_SERVER['PHP_SELF'];
        $npath = substr($variable, 0, strpos($variable, "index.php"));
        if(!empty($name)){
            foreach ($name as $controller) {
                include($npath.'application/model/'.$model.'.php'); $model = new $model;
            }
           
        }
    }
}
		
		?>