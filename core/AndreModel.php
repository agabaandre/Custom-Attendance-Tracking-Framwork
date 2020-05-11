<?php

require_once(__DIR__.'/database/DbConn.php');

class AndreModel extends DbConn{

	
	public function __construct($host = null, $username = null, $password = null, $db = null, $port = null, $charset = 'utf8', $socket = null)
    {
		$dbcon = new DbConn();
		 $this->connection= $dbcon->dbconnection();
		$mysqli=$this->connection;
	}
	function raw_insert($sql){
		$result = $this->connection->query($sql);
		//   echo $sql;
		if($result)
			return $result;
		else
		return 'Failed SQL ERROR';
	}

	
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
		  $result = $this->connection->query($sql);
		//   echo $sql;
		if($result)
			return $result;
		else
		return 'Failed SQL ERROR';
	}

    function update($tableName,$whatToSet,$whereArgs){
    	$sql='UPDATE '.$tableName .' SET ';
    	foreach ($whatToSet as $key => $value)
    	$sql .= $key .'=\'' . $value . '\',';
    	$sql=rtrim($sql,',');
	   if($whereArgs)
		$sql= $this->where($sql,$whereArgs);	
		$sql=$this->appendSemicolon($sql);
	    $result = $this->connection->query($sql);
		if($result)
			return $result;
		else
		return 'Failed SQL ERROR';

	
	}
	
   function delete($tableName,$whereArgs){
   	    $sql='DELETE FROM '.$tableName;
	   if($whereArgs)
	   	$sql=$this->where($sql,$whereArgs);
	   	$sql=$this->appendSemicolon($sql);
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

function get($type,$query){
	
   	

 $sql=$this->appendSemicolon($query);

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
function affected_rows(){
	$data=$this->connection->affected_rows;
	
	return $data;
}
public function dbclose()
{
 return	$this->connection->close();
}
public function inputpost($fieldname=FALSE){
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


return $fresult;
}
public function notify($query){

	if ($query){
		$data['msg']='Saved';
		$data['msg1']='success';
		return $data;
	}
	else{
		
		$data['msg']='Failure';
		$data['msg1']='Danger';
		return $data;
	}
}




}
?>