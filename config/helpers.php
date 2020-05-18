<?php 
//url helper
//baser url
function base_url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
        $link = "https"; 
    else
        $link = "http"; 
    $link .= "://"; 
    $link .= $_SERVER['HTTP_HOST']; 
    $uriseg= explode('/',$_SERVER['REQUEST_URI']); 
    $link .= '/'.$uriseg[1];
    return $link.'/'; 
}
//uri segments
function uriSegment($number){
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    return $uriSegments[$number]; 
}
//autload controllers
// function autoload($controllers){
//     foreach ($controllers as $controller) {
//         include('./application/controller/'.$controller.'.php');
//     }
// }
function notification($data){
    if ($data['msg'])
    { 
    ?>
    <div class="alert alert-<?php echo $data['msg1'];?> alert-dismissable">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $data['$msg'] ?></strong>
    </div>
<?php
    }
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

?>
