<div class="col-md-12">

<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  
				  <li class=""><a href="dashboard.php?action=manage_Jobs">Manage Jobs</a></li>					  
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Manage Jobs</h5>
</div>
<button class=" btn btn-md btn-primary" data-toggle="modal" data-target="#add">Add Job</button>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Add Job</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
     <form action="" method="post" enctype="multipart/form-data" >
              <label>Job:</label>
              <input type="text" class="form-control" name="position" value="" style="width:100%;">
              
<button type="submit" name="add" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Add Job</button>
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
	
if ($act=mysql_query("delete from position where position_id='$rs_id'")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Deletion Successful</strong>
                   </div>';
     }
     
		}}
?>
<?php if (isset($_POST['update'])){

$rs_id= $_POST['id2'];
$value= $_POST['position'];



if($rs_id!="")


{
	
if ($act=mysql_query("UPDATE `attendance_tracking`.`position` SET `position` = '$value' WHERE `position`.`position_id` ='$rs_id'")){
	
echo $msg='<div class="alert alert-success alert-dismissable">
                   <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Update Successful</strong>
                   </div>';
     }
     
}}
?>
<?php if (isset($_POST['add'])){

$value= $_POST['position'];
$count = $db->countOf("position", "position='$value'");
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
	
if ($act=mysql_query(" INSERT INTO `attendance_tracking`.`position` (
`position_id` ,
`position`
)
VALUES (NULL, '$value')")){
	
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
					   <th>position</th>
						
						<th>Edit / Delete</th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					$sql="SELECT * FROM position";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) 
                   {
                    ?>
                    <tr>
					   <td><?php echo $row['position'];?></td>
                       
                       <td>
	<button data-toggle="modal" data-target="#<?php echo $modalid='my'.$row['position_id'];?>" title="Update position Details" class="btn btn-sm btn-info"><i class="edit"></i>Edit</button>
	<form action="" method="post" style="width:40px;"><input type="hidden" name="id" value="<?php echo $row['position_id'];?>"/>
	<button  type="submit" name="delete" title="On click, this record will be deleted!" class="btn btn-sm btn-danger" style="float:left;"><i class="delete"></i>Delete</button>		           
	</form>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Update position</center></h4>
                                          </div>
                                          <div class="modal-body">
                                              
              <form action="" method="post" enctype="multipart/form-data" >
              <label>position:</label>
              <input type="text" class="form-control" name="position" value="<?php echo $row['position'];?>" style="width:100%;">
              <input class="form-control" name="id2"  value="<?php echo $row['position_id'];?>" placeholder="" type="hidden"/>
<button type="submit" name="update" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Update position</button>
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
