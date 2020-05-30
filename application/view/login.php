<!DOCTYPE html>
<html >
<head>
<?php
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="Agaba Andrew">
  <title>Employee Scheduling System</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cmxform.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/validationEngine.jquery.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style2.css">
	<!-- Scripts -->
	<script href="<?php echo base_url(); ?>assets/js/lib/jquery.min.js" type="text/javascript"></script>
	<script href="<?php echo base_url(); ?>assets/js/lib/jquery.validate.min.js" type="text/javascript"></script>
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				username: {
					required: true,
					minlength: 3
				},
				password: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 3 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 3 characters long"
				}
			}
		});
	});
	</script>
</head>
<body>
 <div class="col-md-4"></div>
 <div class="col-md-4">
 <div class="panel panel-default">
        <div class="panel-heading">
           <p style="font-weight:bold; text-align:center; font-size:1.5em;"> Login</p>
                  </div>
        <div class="panel-body">
            </form>
	</div>
<table>
<tr>
<form action="<?php echo base_url()?>index.php/Auth/authenticate" method="POST" id="login-form" autocomplete="off">
</tr>
<tr>
<?php
if(isset($data[0])){
echo'<div class="alert alert-danger alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>'.$data[0].'</strong>
                  </div>';
}
?>
<tr>
<tr>
  <div class="group">
   <label>Username</label>
  <input type="text" placeholder="user name" name="username" id="username" class="box1 border1">
  </div>
 </tr>
 <tr>
    <div class="group">
	  <label>Password</label>
	   <input type="password" placeholder="password" name="password" id="password" class="box1 border2">
   </div>
</tr>
 <tr>
   <div id="footer-buttons" style="clear:both; margin-top:20px;">
            <button  class=" send btn btn-lg btn-primary" name="clockin" type="submit" style="height:80px; font-size:1.2em; width:100%; margin:0 auto;"><span class="add" ></span>Login</button>
    </div> 
</tr>
</table>
</form>
<footer class="main-footer"style="background:url(images/header_bg.png) 0 0 repeat-x; color:white;background-color:#C02424; font-size:10px;">
</footer>
</div>
 </div>
 <div class="col-md-4"></div>
</body>
</html>
