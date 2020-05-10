			

 
<!-- date picker ----------------------------------------------------->

<script>
$.fn.datepicker.defaults.format = "yyyy/mm/dd";
$('.datepicker').datepicker({
});

</script>	


<div class="col-md-12">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
             <li class="active"><a href="<?php echo base_url();?>index.php/Employee/addEmployee">Register New Employee</a></li>
				<li class=""><a href="<?php echo base_url();?>index.php/Employee/viewEmployee">Employee List</a></li>
       
                   
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Register Employee</h5>
                </div>
		        <?php
                   echo notification($data);  ?>			
			
<div class="col-md-4">
                    
				<form name="" id="data_form" method="post" action="<?php echo base_url();?>index.php/Employee/insertEmployee">
		        	<div id="">
                      <label>IPPS NUMBER:  <span style="color:red">*</span></label> 
                      <input class="form-control" name="emp_id" id="" value="<?php echo $emp_id;?>" type="number" required>
					</div>
					<div id="">
                      <label>iHRIS ID:  <span style="color:red"></span></label> 
                      <input class="form-control" name="hris_pid" id="hris_pid" value="<?php echo $ihris_id;?>" type="number">
					</div>
					<div id="">
                      <label>National ID:  <span style="color:red"></span></label> 
                      <input class="form-control" name="national_id" id="studid" value="<?php echo $nin;?>" type="text">
					</div>
				
				<div id="">
					  <label>Surname:  <span style="color:red">*</span></label>
                      <input class="form-control" name="Surname" id="Surname" value="<?php echo $Surname;?>" placeholder="Surname"type="text" required>
				   </div>
                   <div id="">
					 <label>First Name:  <span style="color:red">*</span></label> 
                      <input class="form-control" name="Firstname" id="Firstname" value="<?php echo $Firstname;?>" placeholder="First Name"type="text" required>
					</div>
					<div id="">
					  <label>Other Name: </label>
                      <input class="form-control" name="Othername" id="othername" value="<?php echo $oname;?>" placeholder="Other Name"type="text">
				   </div>
				    <div id="">
                      <label>Mobile Contact:  <span style="color:red"></span></label>
				      <input class="form-control" name="contact" id="Contact" value="<?php echo $Contact;?>" placeholder="Contact" type="tel"/>
			       </div>	
					
</div>
<div class="col-md-4">
		
					<div id="">
                      <label>Position:  <span style="color:red">*</span></label>
                    <select name="Position" class="form-control select2" id="myselect">
                            <?php 
							
							  
							  $i++; ?>
							  <option value="<?php echo $list['position']; ?>"><?php  echo $list['position']; ?>
							  </option>
		               <?php  ?>
		           </select>
			       </div>
			
				   <div id="">
                      <label>Department: <span style="color:red">*</span></label> 
                       <select name="Department" class="form-control select2">
                            <?php 
							 ?>
							  <option value="<?php echo $list1['department']; ?>"><?php  echo $list1['department']; ?>
							  </option>
		               <?php  ?>
		           </select>
				   </div>
				   	   <div id="">
                      <label>District: <span style="color:red">*</span></label> 
                       <select name="district" class="form-control select2">
                            <?php 
							
							?>
							  <option value="<?php echo $list1['name']; ?>"><?php  echo $list1['name']; ?>
							  </option>
		            
		           </select>
				   </div>
				   	   <div id="">
                      <label>Facility: <span style="color:red">*</span></label> 
                       <select name="facility" class="form-control select2">
                            <?php 
						    ?>
							  <option value="<?php echo $list1['facility_id']; ?>"><?php  echo $list1['name']; ?>
							  </option>
		             
		           </select>
				   </div>
                 				
                 
</div>
<div class="col-md-4">
			       <div id="footer-buttons" style="clear:both; margin-top:20px; margin-bottom:4px;">
                     <button  class="btn btn-primary" type="submit" ><span class="glyphicon glyphicon-plus"></span>Add Employee</button>
					 <button class="btn btn-danger"  type="reset" ><span class="glyphicon glyphicon-repeat"></span> Reset Form</button>
                     </form>
				   </div>	  
	    </div>
</div>
</div>
</div>