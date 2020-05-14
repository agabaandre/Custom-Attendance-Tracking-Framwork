<script>
$("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(500);
});
</script>
<div class="col-md-12">
<div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  <li class=""><a href="<?php echo base_url();?>index.php/Employee/viewData/facility/manage_facility">Manage facility</a></li>					  
                 </ul>
				</div>
                <div class="box-header with-border">
                  <h5 class="box-title">Manage Office</h5>
</div>
<button class=" btn btn-md btn-primary" data-toggle="modal" data-target="#add">Add Office</button>
	<div class="modal fade" id="add" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Add facility</center></h4>
                                          </div>
                                          <div class="modal-body">
     <form action="<?php echo base_url();?>index.php/Employee/addData/facility/manage_facility" method="post" enctype="multipart/form-data" >
              <label>Office/Facility:</label>
              <input type="text" class="form-control" name="name" value="" style="width:100%;">
              <label>Facility Type:</label>
              <select class="form-control" name="type" style="width:100%;">
              <option>Administrative Office</option>
              <option>Health Center II</option>
              <option>Health Center III</option>
              <option>Health Center IV</option>
              <option>Others</option>
              </select>
<button type="submit" class="btn btn-primary"><i class="add" style="margin-top:30px;"></i>Add Office</button>
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
					   <th>Office /Facility</th>
             <th>Office Type /Facility Type</th>
						<th>Edit / Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //  print_r($data);
                      $i=1;
                      if(empty($data['dbset'])){
                        $rows=$data['fac'];
                      }
                      else{
                      $rows = $data['dbset'];
                      }
                      foreach($rows as $row){
                    ?>
                    <tr>
                    <td><?php echo $i++;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['type'];?></td>
                       <td>
	<button data-toggle="modal" data-target="#<?php echo $modalid='my'.$row['id'];?>" title="Update facility Details" class="btn btn-sm btn-info"><i class="edit"></i>Edit</button>
	<form action="<?php echo base_url();?>index.php/Employee/deleteData/facility/manage_facility" method="post" style="width:40px;"><input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
	<!-- <button  type="submit" title="On click, this record will be deleted!" class="btn btn-sm btn-danger" style="float:left;"><i class="delete"></i>Delete</button>		            -->
	</form>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Update Office</center></h4>
                                          </div>
                                          <div class="modal-body">
              <form action="<?php echo base_url();?>index.php/Employee/updateData/manage_facility/facility" method="post" enctype="" >
              <label>facility:</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" style="width:100%;">
              <label>Facility Type:</label>
              <select class="form-control" name="type" style="width:100%;">
              <option>Administrative Office</option>
              <option>Health Center II</option>
              <option>Health Center III</option>
              <option>Health Center IV</option>
              <option>Others</option>
              </select>
              <input class="form-control" name="id"  value="<?php echo $row['id'];?>" placeholder="" type="hidden"/>
<button type="submit"  class="btn btn-primary"><i class="add" style="margin-top:4px;"></i>Update facility</button>
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
