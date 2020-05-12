<?php 
session_start();
if ($_SESSION['uuid']='')
{
$this->load_view('login','Logged Out');
}
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'true'); 
//helpers
require('config/helpers.php');
//controllers
//Example $array('Auth','User');
$controllers=array ('Auth','Employee','Users');
autoload($controllers);

function getArgumentStart($uri){
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
	 //print_r($uri);
	
	 $uriSegments[3];
	//default page{
	if ($uriSegments[3]==""){
		 $suri='/'.$uriSegments[1].'/'.$uriSegments[2].'index.php/Auth/login';
		$uri = array('path'=>$suri);
		// print_r($uri);
	}
	else{
		$uri = parse_url($_SERVER['REQUEST_URI']);
	//	print_r($uri);
	}
	$parameters = explode('/', $uri['path']);
	$start = getArgumentStart($parameters);
	if($start != -1){
		$controller_name = $parameters[$start];

		$function_name = $parameters[$start+1] . "_" . strtolower($_SERVER['REQUEST_METHOD']); 
		$start+=2;
		$args = array();
		for(;$start < count($parameters); $start++){
			array_push($args, $parameters[$start]);
		}
		$getpost=array('_get','_post');
		$final_fname=str_replace($getpost,'',$function_name);
		
	
		call_user_func_array(array(new $controller_name, $final_fname), $args);
	}else{
		echo "Error 404, Page not found";
	}
}
render();

?>