<div class="col-md-12" style=" background:white; border-radius: 5px;">
<?php	$i=1;
	//print_r($facilitydata);
?>      <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
			      <li class="active"><a href="<?php echo base_url();?>index.php/Users/getUsers">Manage Users</a></li>
			      <!-- <li class=""><a href="<?php echo base_url();?>index.php/Users/getLogs">User Logs</a></li>
				   -->
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Manage Users</h5>
                </div>
</div>
 <hr style="border:1px solid rgb(140, 141, 137);"/>
  <div class="col-md-4">
  					
      <p>Add Users</p>
	          <form method="post" action="" autocomplte="off">
	  	             <div id="">
					<label>Username: *</label>
                      <input class="form-control" name="username" id="title" value="" placeholder="Username" type="text" required>
				   </div>
                   <div id="">
					 <label>Password: *</label> 
                      <input class="form-control" name="password" id="" value="" placeholder="Password" type="password" required>
					</div>
					<div id="">
					  <label>User Type: *</label>
                      <select class="form-control" name="usertype" id="type" style="width:100%;">
					  <?php
                      $users = array("Administrator"=>"admin", "Supervisor"=>"hr", "Data Manager"=>"data", "No Access Granted"=>"access_0");

                      foreach($users as $key => $value) {
                     echo"<option value='$value'>".$key."</option>";
                            }
                       ?> 
					  
					  
					  </select>
				   </div>
				   <div id="">
					  <label>Name: *</label>
                      <input type="text" class="form-control" name="lname" id="" value="" placeholder="Surname" type="text"/ required>
				   </div>
				   
				  
				   
				     <div id="footer-buttons" style="clear:both; margin-top:20px; margin-bottom:4px;">
                     <button  class="btn btn-primary" name="add_user" type="submit" ><span class="add"></span>Add User</button>
                     </form>
				   </div>
   </div>

<div class="col-md-8"> 
<div id="CollapsiblePanel1" class="CollapsiblePanel" style="margin:0 auto; overflow-x:hidden; overflow-y:auto;">
  <div class="CollapsiblePanelTab" tabindex="0"><p>View System Users</p></div>
<div class="CollapsiblePanelContent"> 
      <table id="mydata" class="table table-bordered table-responsive">
                    <thead>
                      <tr>
					    <th style="width:2%;">No</th>
					   <th style="width:22%;">Username</th>
                        <th style="width:20%;">User Type</th>
						<th style="width:20%;">Name</th>							
												
						<th style="width:10%;">status</th>							
						<th style="width:10%;">Edit</th>
                      </tr>
                    </thead>
<tbody>       

<?php

	
$users=$data['users'];
    foreach($users as $row) {
    ?>
      <tr>  <td><?php echo $i++;?></td>
            <td><?php $uuid=$row['uuid'];?><?php echo $row['username'];?></td>
			<td><?php echo  $active_op=$row['usertype'];?></td>
			<td><?php echo $facility=$row['name'];?></td>
			
    
	    <td>
	<?php
                       //Flag Raiser
					  $status=$row['flag'];
				   $space="----|";
					  if ($status==0){
						  echo "<form action='' method='post'>
						  <input type='hidden' value='1' name='flag'>
						  <input type='hidden' value='$uuid' name='user_id'>
						  <input type='hidden' value='Activated' name='msg'>
						 <button type='submit'  class='btn btn-sm btn-danger' name='status'><span class='glyphicon glyphicon-circle-remove'></span>Not Active</button>
						        </form>";
					  }
					  else {
						 echo "<form action='' method='post'>
						  <input type='hidden' value='0' name='flag'>
						  <input type='hidden' value='$uuid' name='user_id'>
						  <input type='hidden' value='De-activated' name='msg'>
						 <button type='submit' name='change_flag' class='btn btn-sm btn-success' name='status'><span class='glyphicon glyphicon-ok'></span>Active</button>
						 </form>";   
					  }
					  
				     
					  ?>
		</td>
	<td>
	
    <button data-toggle="modal" data-target="#<?php echo $modalid='my'.$uuid;?>" title="Update User" class="btn btn-sm btn-info"><i class="edit"></i>Edit</button>
     
	<div class="col-md-12 offset-2">
	<div class="modal fade" id="<?php echo $modalid;?>" tabindex="-1" role="dialog" data-backdrop="static">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                              <h4 class="modal-title"><center><i class=""></i>Edit User Details</center></h4>
                                          </div>
                                          <div class="modal-body">
	            <form method="post" action="">
	  	           <div id="">
					<label>Username: *</label>
                      <input class="form-control" name="username" id="title" value="<?php echo $row['username'];?>" placeholder="Surname" type="text" style="width:100%;" readonly>
				  </div>
                  <div id="">
					 <label> NB: Leave blank to keep the previous password<br/>
				     New Password: *</label> 
                     <input class="form-control" name="password" id="" style="width:100%;" value="" placeholder="" type="password">
					 <input class="form-control" name="uuid"  value="<?php echo $uuid;?>" placeholder="" type="hidden">
				   </div>
				 
				   <div id="">
					  <label>User Type: *</label>
                      <select class="form-control" name="usertype" id="type" style="width:100%;">
					  <?php
			
                      $users = array("Administrator"=>"admin", "Supervisor"=>"hr", "Data Manager"=>"data", "No Access Granted"=>"access_0");

                      foreach($users as $key => $value) {
						  $selected="selected";?>
                    <option value="<?php echo $select_op=$value; ?>"<?php if ($select_op==$active_op){echo "selected";}?>><?php  echo $key; ?>
                        <?php   }
                       ?> 
					  
					  
					  </select>
				   </div>
				    <div id="">
					  <label>Name:</label>
                      <input class="form-control" style="width:100%;" name="lname" id="" value="<?php echo $row['name']?>" placeholder="" type="text">
				   </div>
				
			
				  
				     <div id="footer-buttons" style="clear:both; margin-top:20px; margin-bottom:4px;">
                     <button  class="btn btn-primary" name="" type="submit" ><span class="add"></span>Update User</button>
                   </form>
				   </div>
                                         </div>
                                      </div>
                                    </div>
             </div>
			 </td>
			 </tr>
    <?php	
    }
	
    ?>
	 </tbody>
        <tfoot>
      </tfoot>
    </table>
	</div>
</div>
</div>
</div>
	