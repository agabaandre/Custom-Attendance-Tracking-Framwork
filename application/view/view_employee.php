

<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
             <li class=""><a href="<?php echo base_url();?>index.php/Employee/addEmployee">Register New Employee</a></li>
				<li class="active"><a href="<?php echo base_url();?>index.php/Employee/viewEmployee">Employee List</a></li>
                  <li class=""><a href="dashboard.php?action=passport">Add a Passport Photo</a></li>
                  <li class=""><a href="dashboard.php?action=update_passport">Update Passport Photo</a></li>				  
                 </ul>
				</div>

<div class="col-md-12 offset-2" style="width:100%; overflow:auto; margin:0 auto;">
<hr style="border:1px solid rgb(140, 141, 137);">
	 <table id="mydata" class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
					   <th>Emloyee ID</th>
                        <th>National ID</th>
						<th>Photo</th>							
						<th>iHRIS ID</th>							
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
					  <td><img src="images/no_pic.png" href="dashboard.php?action=passport" class="img img-thumbnail" style="width:25px; height:25px;"/></td>';
                       
                       <td> <?php echo $myname=$row['Surname']." ".$row['Firstname']." ".$row['Othername'];?></td>
                       <td> <?php echo $row['contact'];?></td>
                       <td> <?php echo $position=$row['Position'];?></td>
					  <td> <?php  echo $department=$row['Department'];?></td>
			
					  <td>
					  <?php
                       //Flag Raiser
					  $status=$row['flag'];
				   $space="----|";
					  if ($status==0){
						  echo "<form action='' method='post'>
						  <input type='hidden' value='1' name='flag'>
						  <input type='hidden' value='$id' name='emp_id'>
						  <input type='hidden' value='$myname Attendance Access Re-activated' name='msg'>
						 <button type='submit'  class='btn btn-sm btn-primary' name='status'><span class='glyphicon glyphicon-ok'></span>Activate</button>
						        </form>";
					  }
					  else {
						 echo "<form action='' method='post'>
						  <input type='hidden' value='0' name='flag'>
						  <input type='hidden' value='$id' name='emp_id'>
						  <input type='hidden' value='$myname Attendance Access De-activated' name='msg'>
						 <button type='submit' name='change_flag' class='btn btn-sm btn-danger' name='status'><span class='glyphicon glyphicon-remove'></span>De-activate</button>
						 </form>";   
					  }
					  
				     
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
			
				<form name="" id="data_form" method="post" action="">
		        	<div id="">
                      <label>IPPS NUMBER:  <span style="color:red">*</span></label> 
                      <input style="width:100%;" class="form-control" name="emp_id" id="studid" value="<?php echo $row['emp_id'];?>" type="number" readonly>
					</div>
					<div id="">
                      <label>iHRIS ID:  <span style="color:red"></span></label> 
                      <input style="width:100%;" class="form-control" name="ihris_id" id="ihris_id" value="<?php echo $row['hris_pid'];?>" type="number">
					</div>
					<div id="">
                      <label>National ID:  <span style="color:red"></span></label> 
                      <input style="width:100%;" class="form-control" name="nin" id="studid" value="<?php echo $row['national_id'];?>" type="text">
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
                      <input style="width:100%;" class="form-control" name="oname" id="othername" value="<?php echo $row['Othername'];?>" placeholder="Other Name"type="text">
				   </div>
				    <div id="">
                      <label>Mobile Contact:  <span style="color:red"></span></label>
				      <input  style="width:100%;" class="form-control" name="Contact" id="Contact" value="<?php echo $row['contact'];?>" placeholder="Contact" type="tel"/>
			       </div>	

					<div id="">
                      <label>Position:  <span style="color:red">*</span></label>
                    <select style="width:100%;" name="position" class="form-control select2" id="">
                            <?php 
						
							  $i++; ?>
							  <option value="<?php echo $list['position']; ?>"><?php  echo $list['position']; ?>
							  </option>
		              
		           </select>
			       </div>
			
				   <div id="">
                      <label>Department: <span style="color:red">*</span></label> 
                       <select style="width:100%;" name="department" class="form-control select2">
                            <?php 
							
							  $i1++; ?>
							  <option value="<?php echo $list1['department']; ?>"><?php  echo $list1['department']; ?>
							  </option>
		               
		           </select>
				   </div>
				   
			       <div id="footer-buttons" style="clear:both; margin-top:20px; margin-bottom:4px;">
                     <button  class="btn btn-primary" name="update_employee" type="submit" ><span class="glyphicon glyphicon-edit"></span>Update Employee</button>
					
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
