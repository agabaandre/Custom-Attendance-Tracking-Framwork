<!DOCTYPE html>
<html>
<?php 
			include_once("assets/engine/header.php");
?>
 <?php if ($action=="rosta1"){ echo'<body class="hold-transition skin-red sidebar-collapse sidebar-mini" id="index" onload="startTime()">';} 
 else { echo'<body class="hold-transition skin-red sidebar-mini" id="index" onload="startTime()">';} ?>
    <div class="wrapper">

      <header class="main-header static-top" >
        <!-- Logo -->
        <a href="" class="logo"  style="background:#7b9f0e url(images/header_title.png) 0 0 repeat-x; color:white;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ATT</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background:url(images/header_bg.png) 0 0; background-color:#7b9f0e; color:white;">
          <!-- Sidebar toggle button-->
          <a href="#" class="" data-toggle="offcanvas">
            <span class="" style="background: url(images/scale.png) no-repeat; width:40px; height:40px; float:left; margin-left:2px; margin-top:7px;"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/login.png" class="user-image" alt="">
                  <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
					<?php
					    $date = date('d/m/Y H:i:s');
						$q=10;
						$s=86400;
						$r=$q*$s;
						$timestamp=time('H:i:s'); //current timestamp
						$tm=$timestamp; // Will add 2 days to the $timestamp*/
						$da=date("d/m/Y", $timestamp);
						$today_mysql=date("Y/m/d", $timestamp);
						$thisyear=date("Y", $timestamp);

						?>
                      <small><?php echo $da;?></small>
					  <span id="txt1"></span>
			
</br></br>
       <?php echo $fu=$line->fname; echo " "; echo $fu=$line->lname;?>
                    </p>
                  </li>
                  <!-- Menu Body -->
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
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?action=change_pwd" class="btn btn-default">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>index.php/Auth/logout" class="btn btn-default">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel" style="font-size:0.9em; font-weight:bold; color:#FFFFFF; z-index:2;">
              <p style="text-align:center;">Attendance Tracker</p>
          </div>
          <ul class="sidebar-menu">
		   <?php if (in_array($data['template'],array('home'))){
            echo'<li class="active treeview">';
			}
		   else{
		 echo'<li class="treeview">';
		   }?>
              <a href="<?php echo base_url()?>/index.php/Auth/home">
              <i class="glyphicon glyphicon-home" style="color:lightblue;"></i><span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
			<?php if ($action=="verify"){
            echo'<li class="active treeview">';
			}
		     else{
			echo'<li class="treeview">';
		     }?>
			<?php  if  ($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='hr')
			 {
              echo'<a href="?action=rosta">
                <i class="glyphicon glyphicon-refresh" style="color:lightblue;"></i>
               <span>Schedule Employees</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>';
			  }
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
              <a href="?action=reports">
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
		        { ?><li><a href="<?php echo base_url();?>index.php/Users/getUsers"><i class="fa fa-circle-o"></i>Manage Users</a></li>
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
              <a href="?action=change_pwd">
                <i class="glyphicon glyphicon-lock" style="color:lightblue;"></i>
               <span>Change Password</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
           </ul>
        </section>
        <!-- End of side .sidebar menu -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		</section>
        <!-- Main content -->
		  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

        <section class="content" >
		<style>
        .content{
	     min-height:640px;
	     background:#FEFFFF;
	     width:98%;
         overflow:auto;
          }
		  .noborder{
			 border:hidden;
			 font:1.5em;
			 
			 
		  }
     </style>
        <?php
        $viewname=$data['template'];
				include($viewname.'.php');						
				?>	
								
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer"style="background:url(images/header_bg.png) 0 0 repeat-x; color:white;background-color:#003248; font-size:10px; margin-bottom:0px;">
        <strong>Copyright &copy; Agaba Andrew  <?php echo date("Y")." "; ?> <a href="http://takenet.net" target="blank"> </a> TEL: 070278688</strong> All rights reserved <version style="float:right;">Developed by Agaba Andrew</version>
      </footer>
  </body>
</html>
