<div class="col-md-12">
<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  <li class=""><a href="dashboard.php?action=register">Register New Employee</a></li>
				  <li class=""><a href="dashboard.php?action=view_employee">Manage Employee list</a></li>
                  <li class="active"><a href="dashboard.php?action=passport">Add a Passport Photo</a></li>	
                  <li class=""><a href="dashboard.php?action=update_passport">Update Passport Photo</a></li>					  
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Add Passport Photo</h5>
                <div class="up_pho" ><?php
                $rollno = rollno;
                
?>
<div class="col-md-4">
<form action="" method="post" enctype="multipart/form-data">
                <div id="">
                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                      <label>Passport Photo:</label> 
                      <input type="file" name="userfile" value="">
				</div>
                <div id="">
                      <label>Employee *</label> 
                        <select name="emp_id" class="form-control select2">
                            <?php 
							$sql = mysql_query("SELECT * FROM `employee_details` ");
		                      $i=0;
							  while ($list=mysql_fetch_array($sql))
							  {
							  $i++; ?>
							  <option value="<?php  echo $list['emp_id']; ?> "><?php echo $list['Surname']." ".$list['Firstname']." ".$list['Othername'];?><?php  echo " ".$list['emp_id']; ?>
							  </option>
					    <?php } ?>
					    </select>
					
					<br/>
                <button  class="btn btn-primary" name="submit" type="submit" ><span class="glyphicon glyphicon-upload"></span>Upload Passport</button>
</form>
</div>
<?php
 
// Checking the file was submitted
if(!isset($_FILES['userfile'])) { echo '<p>Please Select a file</p>'; }
 
else
{ try {
$msg = upload(); // function calling to upload an image
echo $msg;
}
catch(Exception $e) {
echo $e->getMessage();
echo 'Sorry, Could not upload file';
}
}
 
 
function upload() {
//include "database/dbco.php";
$maxsize = 20000000; //set to approx 10 MB
 
//check associated error code
if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
 
//check whether file is uploaded with HTTP POST
if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 
//checks size of uploaded image on server side
if( $_FILES['userfile']['size'] < $maxsize) {
 
//checks whether uploaded file is of image type
if($_FILES['userfile']['type']=="image/gif" || $_FILES['userfile']['type']== "image/png" || $_FILES['userfile']['type']== "image/jpeg" || $_FILES['userfile']['type']== "image/JPEG" || $_FILES['userfile']['type']== "image/PNG" || $_FILES['userfile']['type']== "image/GIF") {
 
// prepare the image for insertion
$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
$emp_id=mysql_real_escape_string($_POST['emp_id']);
 
$sql = "INSERT INTO `attendance_tracking`.`passports` (`id`, `emp_id`, `Passport_photo`, `Name`, `Size`) VALUES  ('NULL','$emp_id','{$imgData}','{$_FILES['userfile']['name']}','{$_FILES['userfile']['size']}');";
mysqli_query($dbcon,$sql);
// insert the image
 
$msg='<div class="alert alert-success alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Upload Successful</strong>
                  </div>';
}
else
$msg='<div class="alert alert-danger alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Uploaded File is not an Image!</strong>
                  </div>';
}
else {
// if the file is not less than the maximum allowed, print an error
$msg='<div class="alert alert-danger alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>The Image Exceeds the Allowed Size Limit</strong>
                  </div>
<div>Maximum File limit is '.$maxsize.' bytes</div>
<div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
' bytes</div><hr />';
}
}
else
$msg="Passport not uploaded successfully.";
 
}
else {
$msg= file_upload_error_message($_FILES['userfile']['error']);
}
return $msg;
}
 
// Function to return error message based on error code
 
function file_upload_error_message($error_code) {
switch ($error_code) {
case UPLOAD_ERR_INI_SIZE:
return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
case UPLOAD_ERR_FORM_SIZE:
return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
case UPLOAD_ERR_PARTIAL:
return 'The uploaded file was only partially uploaded';
case UPLOAD_ERR_NO_FILE:
return 'No file was uploaded';
case UPLOAD_ERR_NO_TMP_DIR:
return 'Missing a temporary folder';
case UPLOAD_ERR_CANT_WRITE:
return 'Failed to write file to disk';
case UPLOAD_ERR_EXTENSION:
return 'File upload stopped by extension';
default:
return 'Unknown upload error';
}
}
?>
<div class="col-md-8">
</div>
</div>