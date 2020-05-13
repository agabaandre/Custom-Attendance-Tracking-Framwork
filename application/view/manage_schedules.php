
<div class="col-md-12">
<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  <li class=""><a href="<?php echo base_url();?>index.php/Employee/viewData/schedules/manage_schedules">Manage Schedules</a></li>					  
                 </ul>
				</div>
                <div class="box-header with-border">
                  <h5 class="box-title">Manage Schedules</h5>
</div>
<button class=" btn btn-md btn-primary" data-toggle="modal" data-target="#add">Add Schedules</button>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Add Shedules</center></h4>
                                          </div>
                                          <div class="modal-body">
     <form action="<?php echo base_url();?>index.php/Employee/addData/schedules/manage_schedules" method="post" >
              <label>Schedule:</label>
              <input type="text" class="form-control" name="name" value="" style="width:100%;">
			  <label>Letter:</label>
              <input type="text" class="form-control" name="letter" value="" style="width:100%;">
			  <label>Start:</label>
              <input type="time" class="form-control" name="starts" value="" style="width:100%;">
			  <label>Ends:</label>
              <input type="time" class="form-control" name="ends" value="" style="width:100%;">
<button type="submit" class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Add Schedules</button>
</form>
                                         </div>
                                      </div>
                                    </div>
    </div>
<div class="col-md-12">
<?php
                                      if(isset($data['msg'])){
                                      echo'<div id="alert" class="alert alert-success alert-dismissable">
                                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>'.$data['msg'].'</strong>
                                      </div>';
                                            }
  ?>
<hr style="border:1px solid rgb(140, 141, 137);"/>
	 <table id="mydata" class="table table-bordered table-responsive">
                    <thead>
                      <tr>
              <th>#</th>
					   <th>Schedule</th>
					   <th>Letter</th>
					   <th>Starts</th>
					   <th>Ends</th>
						<th>Edit / Delete</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 
        //  print_r($data);
          $i=1;
          foreach($data['dbset'] as $row){
                    ?>
                    <tr>
                    <td><?php echo $i++;?></td>
            <td><?php echo $row['name'];?></td>
			<td><?php echo $row['letter'];?></td>
			<td><?php echo $row['starts'];?></td>
			<td><?php echo $row['ends'];?></td>
                       <td>
	<button data-toggle="modal" data-target="#<?php echo $modalid='my'.$row['id'];?>" title="Update schedules Details" class="btn btn-sm btn-info"><i class="edit"></i>Edit</button>
	<form action="<?php echo base_url();?>index.php/Employee/deleteData/schedules/manage_schedules" method="post" style="width:40px;"><input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
	<!-- <button  type="submit" title="On click, this record will be deleted!" class="btn btn-sm btn-danger" style="float:left;"><i class="delete"></i>Delete</button>		            -->
	</form>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Update Schedules</center></h4>
                                          </div>
                                          <div class="modal-body">
              <form action="<?php echo base_url();?>index.php/Employee/addData/schedules/manage_schedules" method="post" enctype="multipart/form-data" >
              <label>schedules:</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" style="width:100%;">
			  <label>Letter:</label>
              <input type="text" class="form-control" name="letter" value="<?php echo $row['letter'];?>" style="width:100%;">
			  <label>Starts:</label>
              <input type="text" class="form-control" name="starts" value="<?php echo $row['starts'];?>" style="width:100%;">
			  <label>Ends:</label>
              <input type="text" class="form-control" name="ends" value="<?php echo $row['ends'];?>" style="width:100%;">
              <input class="form-control" name="id2"  value="<?php echo $row['id'];?>" placeholder="" type="hidden"/>
<button type="submit"  class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Update Schedules</button>
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
