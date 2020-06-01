<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
             <li class=""><a href="<?php echo base_url();?>index.php/Employee/addEmployee">Register New Employee</a></li>
				<li class="active"><a href="<?php echo base_url();?>index.php/Employee/viewEmployee">Employee List</a></li>
                       </ul>
				</div>
<div class="col-md-12 offset-2" style="width:100%; overflow:auto; margin:0 auto;">
<?php
                                      if(isset($data['msg'])){
                                      echo'<div id="alert" class="alert alert-success alert-dismissable">
                                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>'.$data['msg'].'</strong>
                                      </div>';
                                            }
  ?>
<hr>
	 <table id="mydata" class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
					   <th>Employee ID</th>
                        <th>National ID</th>
						<th>Work ID NO</th>
						<th>Photo</th>											
						<th>Name</th>
						<th>Contact</th>
						<th>Position</th>
						<th>Department</th>
						<th>Change Status</th>
						<th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
				<?php 
				$rows=$data['employees'];
				foreach($rows as $row)
				{
					?>
                           <tr>
					      <td><?php echo $id=$row['emp_id']; ?></td>
						   <td><?php echo $nin=$row['national_id']; ?></td>
						   <td><?php echo $row['hris_pid']; ?></td>
                        <!-- <td><img src="modules/employee_details/getImage.php?id=<?php //echo $row["emp_id"];?>" class="img img-thumbnail" style="width:80px; height:80px;"/></td>
                       -->
					  <td><img src="<?php echo base_url();?>assets/images/no_pic.png" href="#" class="img img-thumbnail" style="width:25px; height:25px;"/></td>';
                       <td> <?php echo $myname=$row['Surname']." ".$row['Firstname']." ".$row['Othername'];?></td>
                       <td> <?php echo $row['contact'];?></td>
                       <td> <?php echo $job=$row['Position'];?></td>
					  <td> <?php  echo $department=$row['Department'];
									   $facility=$row['facility'];
									   $district=$row['district'];
					  ?></td>
					  <td>
					  <?php
                       //Flag Raiser
					  $status=$row['flag'];
				   $space="----|";
					  if ($status==0){ ?>
						  <form action='<?php echo base_url();?>index.php/Employee/updateData/view_employee/employee_details' method='post'>
						  <input type='hidden' value='1' name='flag'>
						  <input type='hidden' value="<?php echo $id; ?>" name='emp_id'>
						 <button type='submit'  class='btn btn-sm btn-primary' ><span class='glyphicon glyphicon-ok'></span>Activate</button>
						        </form>
					 <?php  }
					  else { ?>
						  <form action='<?php echo base_url();?>index.php/Employee/updateData/view_employee/employee_details' method='post'>
						  <input type='hidden' value='0' name='flag'>
						  <input type='hidden' value='<?php echo $id ?>' name='emp_id'>
	
						 <button type='submit'  class='btn btn-sm btn-danger'><span class='glyphicon glyphicon-remove'></span>De-activate</button>
						 </form>  
				<?php	  }
					  ?>
					  </td>
		              <td>
<button data-toggle="modal" data-target="#<?php echo $modalid=$id;?>" title="Update Employee Details" class="btn btn-sm btn-info"><span class='glyphicon glyphicon-edit'></span>Edit</button>
			<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class="fa fa-user fa-spin"></i>Update Employee</center></h4>
                                          </div>
                                          <div class="modal-body">
				<form name="<?php echo base_url();?>index.php/Employee/updateData/view_employee/employee_details" id="data_form" method="post" action="">
				   <div class="col-md-6">
		        	<div id="">
                      <label>IPPS NUMBER:  <span style="color:red">*</span></label> 
                      <input style="width:100%;" class="form-control" name="emp_id" id="studid" value="<?php echo $row['emp_id'];?>" type="number" readonly>
					  <input type='hidden' value='<?php echo $id ?>' name='emp_id'>
					</div>

					<div id="">
                      <label>iHRIS ID:  <span style="color:red"></span></label> 
                      <input style="width:100%;" class="form-control" name="hris_pid" id="ihris_id" value="<?php echo $row['hris_pid'];?>" type="number">
					</div>
					<div id="">
                      <label>National ID:  <span style="color:red"></span></label> 
                      <input style="width:100%;" class="form-control" name="national_id" id="studid" value="<?php echo $row['national_id'];?>" type="text">
					</div>
				<div id="">
					  <label>Surname:  <span style="color:red">*</span></label>
                      <input style="width:100%;" class="form-control" name="Surname" id="Surname" value="<?php echo $row['Surname'];?>" placeholder="Surname"type="text" required>
				   </div>
                   <div id="">
					 <label>First Name:  <span style="color:red">*</span></label> 
                      <input style="width:100%;" class="form-control" name="Firstname" id="Firstname" value="<?php echo $row['Firstname'];?>" placeholder="First Name"type="text" required>
					</div>
					<div id="">
					  <label>Other Name: </label>
                      <input style="width:100%;" class="form-control" name="Othername" id="othername" value="<?php echo $row['Othername'];?>" placeholder="Other Name"type="text">
				   </div>
				</div>
				<div class="col-md-6">
				    <div id="">
                      <label>Mobile Contact:  <span style="color:red"></span></label>
				      <input  style="width:100%;" class="form-control" name="contact" id="Contact" value="<?php echo $row['contact'];?>" placeholder="Contact" type="tel"/>
			       </div>	
				   <?php	
					$i=1;
					$facilitydata=$data['fac'];
					$districtdata=$data['dist'];
					$departmentdata=$data['depart'];
					$jobdata=$data['job'];
					?>
				   <div id="">
                      <label style="width:100%;">Job: <span style="color:red">*</span></label> 
					            <select name="Position" class="form-control select2" style="width:100%;">
                          <?php foreach($jobdata as $list1){ ?>
							  <option value="<?php echo $active_op=$list1['name']; ?>"<?php if ($job==$active_op){echo "selected";}?>><?php  echo $list1['name']; ?>
							  </option>
						  <?php } ?>
		           </select>
				   </div>
				   	   <div id="">
                      <label style="width:100%;">Office/ Facility: <span style="color:red">*</span></label> 
                       <select name="facility" class="form-control select2" style="width:100%;">
						 <?php foreach($facilitydata as $list2){ ?>
								  <option value="<?php echo $active_op=$list2['name']; ?>"<?php if ($facility==$active_op){echo "selected";}?>><?php  echo $list2['name']; ?>
							  </option>
						 <?php } ?>
		           </select>
				   </div>
				   <div id="">
                      <label style="width:100%;">District: <span style="color:red">*</span></label> 
					       <select name="district" class="form-control select2" style="width:100%;">
                          <?php foreach($districtdata as $list1){ ?>
								  <option value="<?php echo $active_op=$list1['name']; ?>"<?php if ($district==$active_op){echo "selected";}?>><?php  echo $list1['name']; ?>
							  </option>
						  <?php } ?>
		           </select>
				   </div>
				   	   <div id="">
                      <label style="width:100%;">Department: <span style="color:red">*</span></label> 
					   <select name="Department" class="form-control select2" style="width:100%;">
					   <option value="<?php echo '%'; ?>"><?php  echo 'All'; ?></option>
						 <?php foreach($departmentdata as $list2){ ?>
							
							  <option value="<?php echo $active_op=$list2['name']; ?>"<?php if ($department==$active_op){echo "selected";}?>><?php  echo $list2['name']; ?>
							  </option>
						 <?php } ?>
		           </select>
				   </div>
				</div>
			       <div id="footer-buttons" style="clear:both; margin-top:20px; margin-bottom:4px;">
                     <button  class="btn btn-primary"  type="submit" ><span class="glyphicon glyphicon-edit"></span>Update Employee</button>
                     </form>
				   </div>	  
                                         </div>
                                      </div>
                                    </div>
             </div>
					   </td>
					</tr>
					<?php }	?>
                    </tbody>
                    <tfoot>
                    </tfoot>
    </table>
</div>
<div class="col-md-4">			 
</div>
<div class="col-md-4">
</div>
</div>
