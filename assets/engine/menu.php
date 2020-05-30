<?php if (in_array($data['template'],array('rosta'))){ echo'<body class="hold-transition skin-red sidebar-collapse sidebar-mini" id="index" onload="startTime()">';} 
 else { echo'<body class="hold-transition skin-red sidebar-mini" id="index" onload="startTime()">';} ?>
    <div class="wrapper">

      <header class="main-header static-top" >
        <a href="" class="logo"  style="background:#7b9f0e url(<?php echo base_url(); ?>.'assets/images/header_title.png') 0 0 repeat-x; color:white;">
          <span class="logo-lg"><b>ESS</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation" style="background-image:url('assets/images/header_bg.png') 0 0; background-color:#7b9f0e; color:white;">
          <a href="#" class="" data-toggle="offcanvas">
            <span class="" style="background:#003248 no-repeat; width:40px; height:40px; float:left; margin-left:2px; margin-top:7px;"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu" style="background:#003248;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/login.png" class="user-image" alt="">
                  <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                  <p>
                        <small><?php echo date('jF,Y H:i:s');?></small>
                        <span id="txt1"></span>
                  
                          </br></br>
                          <?php echo $_SESSION['usertype'];?>
                  </p>
                  </li>
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                    <form class="form-inline" action="" method="post">
                    <select class="form-control" name="language" onchange='this.form.submit()' >
                    <option>Select Language</option>
                    <option value="en_us.php">English</option>
                    <option value="fr_fr.php">French</option>
                    </select>
                    </form>
          </div>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url();?>index.php/Users/newPwd" class="btn btn-default">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>index.php/Auth/logout" class="btn btn-default">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel" style="font-size:0.9em; font-weight:bold; color:#FFFFFF; z-index:2;">
              <!-- <p style="text-align:center;">Attendance Tracker</p> -->
          </div>
          <ul class="sidebar-menu">
		   <?php if (in_array($data['template'],array('home'))){
            echo'<li class="active treeview">';
			}
		   else{
		 echo'<li class="treeview">';
		   }?>
              <a href="<?php echo base_url()?>index.php/Auth/home">
              <i class="glyphicon glyphicon-home" style="color:lightblue;"></i><span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              </li>
			<?php if (in_array($data['template'],array('rosta'))){
            echo'<li class="active treeview">';
			}
		     else{
			echo'<li class="treeview">';
		     }?>
			<?php  if  ($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='hr')
		    	 { ?>
              <a href="<?php echo base_url();?>index.php/Attendance/roster">
               <i class="glyphicon glyphicon-refresh" style="color:lightblue;"></i>
               <span>Schedule Employees</span>
               <span class="label label-primary pull-right"></span>
              </a>
            </li>

			   <?php }
			?>	
            <?php if (in_array($data['template'],array('add_employee','view_employee'))){
            echo'<li class="active treeview">';
			}
		     else{
			  echo'<li class="treeview">';
		     }?>
              <a href="dashboard.php?action=view_employee">
                <i class="glyphicon glyphicon-th-list" style="color:lightblue;"></i>
                <span>Employee</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url();?>index.php/Employee/addEmployee">Register New Employee</a></li>
			        	<li class=""><a href="<?php echo base_url();?>index.php/Employee/viewEmployee">Employee List</a></li>
              </ul>
            </li>
         			  
		    <?php if (in_array($data['template'],array('import'))){
          echo'<li class="active treeview">';
	   		}
		      else{
		    	echo'<li class="treeview">';
		     }?>
			   	<?php 
      
           if  	($_SESSION['usertype'] =='admin')
		      { ?>
              <a href="<?php echo base_url();?>index.php/Employee/import">
                <i class="glyphicon glyphicon-upload" style="color:lightblue;"></i>
                <span>Upload Multiple Employees</span>
                <span class="label label-primary pull-right"></span>
              </a>
             </li>
		       <?php  } ?>
			
			   <?php if (in_array($data['reports'],array('reports'))){
            echo'<li class="active treeview">';
			}
		     else{
			    echo'<li class="treeview">';
		          }?>
              <a href="<?php echo base_url();?>index.php/Attendance/reports">
              <i class="glyphicon glyphicon-th-list" style="color:lightblue;"></i>
              <span>Reports</span>
              <span class="label label-primary pull-right"></span>
              </a>
            </li>
			<?php if ( in_array($data['template'],array('manage_district','manage_departments','manage_job','manage_facility','manage_users'))){
                 echo'<li class="active treeview">';
		          	}
		           else{
			echo'<li class="treeview">';
		           }?>
              <a href="">
                   <i class="glyphicon glyphicon-cog" style="color:lightblue;"></i>
                  <span class="">System Settings</span>
                   <span class="label label-primary pull-right"></span>
                  </a>
              <ul class="treeview-menu">
              <?php  if  	($_SESSION['usertype'] =='admin')
		             { ?>  
                <li><a href="<?php echo base_url();?>index.php/Users/getUsers"><i class="fa fa-circle-o"></i>Manage Users</a></li>
		             <li><a href="<?php echo base_url();?>index.php/Employee/viewData/job/manage_job"><i class="fa fa-circle-o"></i>Manage Jobs</a></li>
                <li><a href="<?php echo base_url();?>index.php/Employee/viewData/departments/manage_departments"><i class="fa fa-circle-o"></i>Manage Departments</a></li>
                <li><a href="<?php echo base_url();?>index.php/Employee/viewData/facility/manage_facility"><i class="fa fa-circle-o"></i>Manage Facilities</a></li>
                <li><a href="<?php echo base_url();?>index.php/Employee/viewData/district/manage_district"><i class="fa fa-circle-o"></i>Manage Districts</a></li>
                <li><a href="<?php echo base_url();?>index.php/Employee/addData/schedules/manage_schedules"><i class="fa fa-circle-o"></i>Manage Schedules</a></li>';
                <?php } 
			  	else{ ?>
                <li><a href="<?php echo base_url();?>index.php/Employee/viewData/departments/manage_departments"><i class="fa fa-circle-o"></i>Manage Jobs</a></li>
                <li><a href="<?php echo base_url();?>index.php/Employee/viewData/departments/manage_departments"><i class="fa fa-circle-o"></i>Manage Departments</a></li>';
			    <?php	}
				?>
				
           </ul>
            </li>
				   <?php if (in_array($data['template'],array('change_password'))){
            echo'<li class="active treeview">';
		        	}
		       else{
			echo'<li class="treeview">';
		           }?>
              <a href="<?php echo base_url();?>index.php/Users/newPwd">
                <i class="glyphicon glyphicon-lock" style="color:lightblue;"></i>
               <span>Change Password</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
           </ul>
        </section>
      </aside>