<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
                 </ul>
		  </div>                              
               <div class="box-header with-border">
                 <h5 class="box-title"><strong>Attendance Tracking System</strong></h5>
                </div>
        <div class="col-md-12">
           <?php $widgets=$data['widgets'];
                 print_r($widgets);
                 $employees=$data['employees'];
           ?>
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $widgets['staff']; ?></h3>

              <p>Total Staff</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?php echo $widgets['staff']; ?></h3>
              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?php echo $widgets['staff']; ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          </div>
       
    
      <!-- /.row -->
      <!-- Main row -->
      <div class="col-md-12">
         <div class="col-lg-6">
			<p>Welcome</p>
			<menu><p>You can:</p><li>Schedule Employees Work Days and Leave Days</li>
			      <li>Generate work schedules of employees to follow</li>
				  <li>View and share reports from the system by printing and electronic share methods</li>
			<?php  ?>
        	</div>	
        </div>
        <div class="col-lg-6">

        <table id="mydata" class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
					   <th>Employee ID</th>
                        <th>National ID</th>
						<th>Work ID NO</th>											
						<th>Name</th>
						<th>Contact</th>
						<th>Position</th>
						<th>Department</th>
						
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
                            <td> <?php echo $myname=$row['Surname']." ".$row['Firstname']." ".$row['Othername'];?></td>
                            <td> <?php echo $row['contact'];?></td>
                            <td> <?php echo $job=$row['Position'];?></td>
                            <td> <?php  echo $department=$row['Department'];
                            $facility=$row['facility'];
                            $district=$row['district'];
					  ?></td>
					  
					</tr>
					<?php }	?>
                    </tbody>
                    <tfoot>
                    </tfoot>
    </table>
    </div>
        </div>
    </div>
</div>