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
function autoload($controllers){
    foreach ($controllers as $controller) {
        include('./application/controller/'.$controller.'.php');
    }
}
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
?>
