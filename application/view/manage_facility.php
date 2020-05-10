<div class="col-md-12">

<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  
				  <li class=""><a href="dashboard.php?action=manage_Facilities">Manage Facilities</a></li>					  
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Manage Facilities</h5>
</div>
<button class=" btn btn-md btn-primary" data-toggle="modal" data-target="#add">Add Facility</button>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Add Facility</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
     <form action="" method="post" enctype="multipart/form-data" >
              <label>Facility:</label>
              <input type="text" class="form-control" name="facility" value="" style="width:100%;">
			  <label>Type:</label>
              <select class="form-control select2" name="type" value="" style="width:100%;">
			  <option value="Health Centre II">Health Centre II</option>
			  <option value="Health Centre III">Health Centre III</option>
			  <option value="Health Centre IV">Health Centre IV</option>
			  <option value="Health Centre IV">Health Centre IV</option>
			  <option value="DHO's Office">DHO's Office</option>
			  <option value="Human Clinic">Human Clinic</option>
			  <option value="General Hospital">General Hospital</option>
			  <option value="Regional Referral Hospital">Regional Referral Hospital</option>
			  <option value="Sub-County">Sub-County</option>
			  <option value="Town Council">Town Council</option>
			  <option value="Administration">Administration</option>
			  <option value="NGO">NGO</option>
			  <option value="Parastatal Body">Parastatal Body</option>
			  </select>
              
<button type="submit" name="add" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Add Facility</button>
</form>

                                         </div>
                                      </div>
                                    </div>
    </div>
<?php
if(isset($_POST['delete']))
		{

$rs_id= $_POST['id'];



if($rs_id!="")


{
	
if ($act=mysql_query("delete from facility where facility_id='$rs_id'")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Deletion Successful</strong>
                   </div>';
     }
     
		}}
?>
<?php if (isset($_POST['update'])){

$rs_id= $_POST['id2'];
$value= $_POST['facility'];
$type= $_POST['type'];



if($rs_id!="")


{
	
if ($act=mysql_query("UPDATE `attendance_tracking`.`facility` SET `name` = '$value',`type` = '$type' WHERE `facility`.`facility_id` ='$rs_id'")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Update Successful</strong>
                   </div>';
     }
     
}}
?>
<?php if (isset($_POST['add'])){

$value= $_POST['facility'];
$type= $_POST['type'];
$count = $db->countOf("facility", "name='$value'");
		if($count==1)
			{
		$msg=" Duplicate Entry! Please Verify</font>";
		echo'<div class="alert alert-danger alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>'.$msg.'</strong>
                   </div>';
			}
			else
			{
	
if ($act=mysql_query(" INSERT INTO `attendance_tracking`.`facility` (
`facility_id` ,
`name`,
`type`
)
VALUES (NULL, '$value', '$type')")){
	
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
					   <th>facility</th>
					   <th>Type</th>
						
						<th>Edit / Delete</th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					$sql="SELECT * FROM facility";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) 
                   {
                    ?>
                    <tr>
					   <td><?php echo $row['name'];?></td>
					   <td><?php echo $row['type'];?></td>
                       
                       <td>
	<button data-toggle="modal" data-target="#<?php echo $modalid='my'.$row['facility_id'];?>" title="Update facility Details" class="btn btn-sm btn-info"><i class="edit"></i>Edit</button>
	<form action="" method="post" style="width:40px;"><input type="hidden" name="id" value="<?php echo $row['facility_id'];?>"/>
	<button  type="submit" name="delete" title="On click, this record will be deleted!" class="btn btn-sm btn-danger" style="float:left;"><i class="delete"></i>Delete</button>		           
	</form>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Update Facility</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
              <form action="" method="post" enctype="multipart/form-data" >
              <label>facility:</label>
              <input type="text" class="form-control" name="facility" value="<?php echo $row['name'];?>" style="width:100%;">
			  <label>Type:</label>
              <select class="form-control select2" name="type" value="" style="width:100%;">
			  <option value="Health Centre II">Health Centre II</option>
			  <option value="Health Centre III">Health Centre III</option>
			  <option value="Health Centre IV">Health Centre IV</option>
			  <option value="Health Centre IV">Health Centre IV</option>
			  <option value="DHO's Office">DHO's Office</option>
			  <option value="Human Clinic">Human Clinic</option>
			  <option value="General Hospital">General Hospital</option>
			  <option value="Regional Referral Hospital">Regional Referral Hospital</option>
			  <option value="Sub-County">Sub-County</option>
			  <option value="Town Council">Town Council</option>
			  <option value="Administration">Administration</option>
			  <option value="NGO">NGO</option>
			  <option value="Parastatal Body">Parastatal Body</option>
			  </select>
              
              <input class="form-control" name="id2"  value="<?php echo $row['facility_id'];?>" placeholder="" type="hidden"/>
<button type="submit" name="update" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Update facility</button>
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

