<?php 
require_once('AndreModel.php');
class AndreController extends AndreModel{
	public function __construct(){
	}
	public function load_view($view, $args){
		$data=$args;
	return	require_once(__DIR__.'/../application/view/'.$view.'.php');
	}
}
?>