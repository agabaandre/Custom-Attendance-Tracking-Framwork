<?php 
		session_start();
	if ($_SESSION['uuid']='')
	{
		$this->load_view('login','Logged Out');
	}
		ini_set('error_reporting', E_ALL);
		//use true or false
		ini_set('display_errors', 'true'); 
		//helpers
		require('config/helpers.php');
		//controllers
		//Example $array('Auth','User');
		$controllers=array ('Auth','Employee','Users','Attendance');
		load_controller($controllers);
function initArgument($uri){
		foreach ($uri as $key => $value){
			if($value == 'index.php'){
				if($key == count($uri) - 1 ) return -1;
				return $key+1;
			}
		}
}
 function render(){
		$guri = parse_url($_SERVER['REQUEST_URI']);
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		//print_r($guri);
		$uriSegments[3];
	  //set default view{
	if ($uriSegments[3]==""){
		 $suri='/'.$uriSegments[1].'/'.$uriSegments[2].'index.php/Auth/login';
		$uri = array('path'=>$suri);
		// print_r($uri);
	}
	else{
		$uri = parse_url($_SERVER['REQUEST_URI']);
	}
		$parameters = explode('/', $uri['path']);
		$start = initArgument($parameters);
	if($start != -1){
		$controller_name = $parameters[$start];
		$function_name = $parameters[$start+1]; 
		$start+=2;
		$args = array();
		for(;$start < count($parameters); $start++){
			array_push($args, $parameters[$start]);
		}
		call_user_func_array(array(new $controller_name, $function_name), $args);
	}
	else{
		call_user_func_array(array('application/views/error404.php'));
	}
}
render();
?>