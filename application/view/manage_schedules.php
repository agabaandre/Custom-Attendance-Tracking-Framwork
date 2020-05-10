<?php include_once("db_connector/mysqli_conn.php"); ?>
<div class="col-md-12">
<script>
function show_value1(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value1").innerHTML=x;
}
function show_value2(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value2").innerHTML=x;
}
function show_value3(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value3").innerHTML=x;
}
function show_value4(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value4").innerHTML=x;
}
function show_value5(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value5").innerHTML=x;
}
function show_value6(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value6").innerHTML=x;
}
function show_value7(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value7").innerHTML=x;
}
function show_value8(x)
{
	if (x < 10) {x = "0" + x};
 document.getElementById("slider_value8").innerHTML=x;
}

</script>
<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  
				  <li class="active"><a href="dashboard.php?action=manage_schedules">Manage Schedule Types</a></li>					  
                 </ul>
				</div>
                               
                <div class="box-header with-border">
             
</div>
<?php
if(isset($_GET['msg'])){
$print_msg=$_GET['msg'];


echo'<div class="alert alert-success alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>'.$print_msg.'</strong>
                  </div>';
	
}
?>
<?php
if(isset($_POST['msg'])){
$print_msg=$_POST['msg'];


echo'<div class="alert alert-success alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>'.$print_msg.'</strong>
                  </div>';
	
}
?>
<button class="btn btn-md btn-primary" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i>Create New Type</button>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Add Schedule Type</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
     <form action="" method="post" enctype="multipart/form-data" >
            
			   <label>Key:</label>
              <input type="text" class="form-control" name="key" value="" aria-describedby="sizing-addon1" style="width:100%;">
			    <label>Schedule:</label>
              <input type="text" class="form-control" name="schedule" aria-describedby="sizing-addon2" value="" style="width:100%;">
			   <label>Starts From:(24hr Format)</label>
			  <label style="width:100%;">Set time HR to 00 and MIN 00 for if time is not Applicable
                  </label>
			    <center><span id="slider_value1" style="color:blue;font-weight:bold;">HR</span></center>
			  <div class="input-group">
             <span class="input-group-addon">00</span><input type="range" min="0" max="24" step="1" value="0" name="hrsfrom" onchange="show_value1(this.value)" style="width:100%;"> <span class="input-group-addon">23</span>
               </div>
			   <center><span id="slider_value2" style="color:blue;font-weight:bold;">MIN</span></center>
			 
			  <div class="input-group">
			   <br/>
			<span class="input-group-addon">00</span><input type="range" min="0" max="59" step="1" value="0" name="minfrom" onchange="show_value2(this.value)" style="width:100%;"><span class="input-group-addon">59</span>
            </div>
	           
      
     
  
			   <label>Ends At: (24hrs Format)</label>
			   <center><span id="slider_value3" style="color:blue;font-weight:bold;">HR</span></center>
			   <div class="input-group">
			   
             <span class="input-group-addon">00</span><input type="range" min="0" max="23" step="1" value="0" name="hrsto" onchange="show_value3(this.value)" style="width:100%;"> <span class="input-group-addon">23</span>
			 </div>
			 <center><span id="slider_value4" style="color:blue;font-weight:bold;">MIN</span></center>
			  <div class="input-group">
               <span class="input-group-addon">00</span><input type="range" min="0" max="59" step="1" value="0" name="minto" onchange="show_value4(this.value)" style="width:100%;"> <span class="input-group-addon">59</span>
			  </div>
            <div class="modal-footer">
<button type="submit" name="add" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Save</button>
</div>
</form>

                                         </div>
                                      </div>
                                    </div>
    </div>
<?php
if(isset($_POST['delete']))
		{
$r_id= $_POST['id'];
if($r_id!="")
{
	
if ($act=mysqli_query($dbcon,"Delete from schedules where schedule_id=$r_id")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Deletion Successful</strong>
                   </div>';
     }
     
		}}
?>
<?php if (isset($_POST['update'])){
$key= $_POST['key'];
$value= $_POST['schedule'];
$r_id= $_POST['id2'];
$hrsfrom=$_POST['hrsfrom'];
if ($hrsfrom<10){
	$hrsfrom="0".$hrsfrom;
}
else{
	$hrsfrom=$_POST['hrsfrom'];
}
	
$minfrom=$_POST['minfrom'];
if ($minfrom<10){
	$minfrom="0".$minfrom;
}
else{
	$minfrom=$_POST['hrsfrom'];
}
$milliseconds='00';
//start time gen
$from=$hrsfrom.":".$minfrom.":".$milliseconds;

$hrsto=$_POST['hrsto'];
if ($hrsto<10){
	$hrsto="0".$hrsto;
}
else{
	$hrsto=$_POST['hrsto'];
}
	
$minto=$_POST['minto'];
if ($minto<10){
	$minto="0".$minto;
}
else{
	$minto=$_POST['hrsto'];
}
$milliseconds='00';
//end time
$to=$hrsto.":".$minto.":".$milliseconds;

if($r_id!="")

{
	
if ($act=mysqli_query($dbcon,"UPDATE schedules SET schedule = '$value',letter='$key', starts='$hrsfrom',ends='$hrsto' WHERE schedule_id=$r_id")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Schedule Type Successful</strong>
                   </div>';
     }
     
}}
?>
<?php if (isset($_POST['add'])){
$hrsfrom=$_POST['hrsfrom'];
if ($hrsfrom<10){
	$hrsfrom="0".$hrsfrom;
}
else{
	$hrsfrom=$_POST['hrsfrom'];
}
	
$minfrom=$_POST['minfrom'];
if ($minfrom<10){
	$minfrom="0".$minfrom;
}
else{
	$minfrom=$_POST['hrsfrom'];
}
$milliseconds='00';
//start time gen
$from=$hrsfrom.":".$minfrom.":".$milliseconds;

$hrsto=$_POST['hrsto'];
if ($hrsto<10){
	$hrsto="0".$hrsto;
}
else{
	$hrsto=$_POST['hrsto'];
}
	
$minto=$_POST['minto'];
if ($minto<10){
	$minto="0".$minto;
}
else{
	$minto=$_POST['hrsto'];
}
$milliseconds='00';
//end time
$to=$hrsto.":".$minto.":".$milliseconds;
$key= $_POST['key'];
$value= $_POST['schedule'];
$count=mysqli_query($dbcon,"select count(schedule), count(letter) from schedules where schedule='$value' AND letter='$key'");
     $count=mysqli_fetch_row($count);
     $count=$count[0];
		if($count>=1)
			{
		$msg=" Duplicate Entry! Please Verify</font>";
		echo'<div class="alert alert-danger alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>'.$msg.'</strong>
                   </div>';
			}
			else
			{

$key= $_POST['key'];
if ($act=mysql_query(" INSERT INTO schedules (
`schedule_id` ,
`schedule`,
`letter`,
`starts`,
`ends`
)
VALUES (NULL, '$value','$key','$from','$to')")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Saved Succeefully</strong>
                   </div>';
     
     
}}}
?>
<div class="col-md-12">
<hr style="border:1px solid rgb(140, 141, 137);"/>
	 <table id="mydata" class="table table-bordered table-responsive">
                    <thead>
                      <tr>
					   <th>No</th>
					   <th>Schedule Type</th>
					   <th>Key</th>
						<th>Start At</th>
						<th>Ends At</th>
						<th>Manage</th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					$i=1;
					$sql="SELECT schedule_id,schedule,starts,ends,letter from schedules";
					$result = mysqli_query($dbcon,$sql);
					while($row = mysqli_fetch_array($result)) 
                   {
                    ?>
                    <tr>
					   <td><?php echo $i++;?></td>
					   <td><?php echo $row['schedule'];?></td>
					   <td><?php echo $row['letter'];?></td>
					   <td><?php if ($row['starts']=='00:00:00'){ echo 'N/A'; }else { echo $row['starts']; }  ?></td>
					   <td><?php if ($row['ends']=='00:00:00'){ echo 'N/A'; }else { echo $row['ends']; }  ?></td>
                       
                       <td>
	<form action="" method="post" style="width:40px;">
                <input type="hidden" name="id" value="<?php echo $row['schedule_id'];?>"/>
	              
					   <?php  if  	($_SESSION['usertype'] =='admin')
		             { echo'<button  type="button" data-toggle="modal" data-target="#delete'.$row['schedule_id'].'"  name="delete" title="On click, this record will be deleted!" class="btn btn-sm btn-danger btn-disabled" style="float:left;"><i class="glyphicon glyphicon-remove"></i>Delete</button>';
					 }?>
					 
					 
					 <div class="modal fade" tabindex="-1" id="delete<?php echo $row['schedule_id'];?>" role="dialog">
					 <div class="modal-dialog modal-sm" style="margin-top:10%;">
					 
					 <div class="modal-content">
					 <div class="modal-header">
					 <h4>Confirm Deletion</h4>
					 
					 </div>
					 <div class="modal-body">
					 
							<p><i class="fa fa-warning" style="font-size:x-large; color:red;"></i> Are you sure you want to Delete this Schedule Type?</p>
					 
					 </div>
					 <div class="modal-footer">
					 <button data-dismiss="modal" class="btn btn-info"><i class="fa fa-times"></i> Cancel</button>
					 <button type="submit" class="btn btn-danger" name="delete"><i class="glyphicon glyphicon-trash"></i>Delete</button>
					 
					  </div>
					 </div>
					 </div>
					 
					 </div>
					 
					 
					 
					  </form>
					  <button data-toggle="modal" data-target="#<?php echo $modalid='my'.$row['schedule_id'];?>" title="Update position Details" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</button>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class=""></i>Edit Schedule Type</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
              <form action="" method="post" enctype="multipart/form-data" >
			   <label>Key:</label>
              <input type="text" class="form-control" name="key" value="<?php echo $row['letter'];?>" aria-describedby="sizing-addon1" style="width:100%;">
			    <label>Schedule:</label>
              <input type="text" class="form-control" name="schedule" aria-describedby="sizing-addon2" value="<?php echo $row['schedule'];?>" style="width:100%;">
			   <label>Starts From:(24hr Format)</label>
			  <label style="width:100%;">Set time HR to 00 and MIN 00 for if time is not Applicable
                  
               </label>
			    <center><span id="slider_value5" style="color:blue;font-weight:bold;">HR</span></center>
			  <div class="input-group" style="width:100%;">
             <span class="input-group-addon">00</span><input type="range" min="0" max="24" step="1" value="0" name="hrsfrom" onchange="show_value5(this.value)" style="width:100%;"> <span class="input-group-addon">23</span>
               </div>
			   <center><span id="slider_value6" style="color:blue;font-weight:bold;">MIN</span></center>
			 
			  <div class="input-group" style="width:100%;">
			   <br/>
			<span class="input-group-addon">00</span><input type="range" min="0" max="59" step="1" value="0" name="minfrom" onchange="show_value6(this.value)" style="width:100%;"><span class="input-group-addon">59</span>
            </div>
	           
            <br/>
     
  
			   <label>Ends At: (24hrs Format)</label>
			   <center><span id="slider_value7" style="color:blue;font-weight:bold;">HR</span></center>
			   <div class="input-group" style="width:100%;">
			   
             <span class="input-group-addon" >00</span><input type="range" min="0" max="23" step="1" value="0" name="hrsto" onchange="show_value7(this.value)" style="width:100%;"> <span class="input-group-addon">23</span>
			 </div>
			 <center><span id="slider_value8" style="color:blue;font-weight:bold;">MIN</span></center>
			  <div class="input-group" style="width:100%;">
               <span class="input-group-addon">00</span><input type="range" min="0" max="59" step="1" value="0" name="minto" onchange="show_value8(this.value)" "> <span class="input-group-addon">59</span>
			  </div>  <input class="form-control" name="id2"  value="<?php echo $row['schedule_id'];?>" placeholder="" type="hidden"/>
			 <div class="modal-footer">
               <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-edit" style="margin-top:4px;"></i>Edit</button>
              </div>

</form>

                                         </div>
                                      </div>
                                    </div>
             </div>
			       
					   </td>
					   
                    </tr>
					<?php }?>
                    </tbody>
                    <tfoot>
                    </tfoot>
    </table>
</div>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script>
  //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
</script>
