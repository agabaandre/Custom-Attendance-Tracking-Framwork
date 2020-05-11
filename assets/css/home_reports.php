<?php
if($action=="clock_data")
								include_once("modules/reports/attendance_data_by_clock_data.php");
?>								
<div class="col-md-12" style=" background:white; border-radius: 5px;">
<div id="sys_reports">               
                <div class="box-header with-border">
                  <h5 class="box-title">Reports</h5>
                </div>
<div class="col-md-12">
           <div class="box-header with-border">
                 <p class="box-title"><strong>Monthly Attendance Reports</strong></p>
           </div>
                    <ol>
                      <li><a href="dashboard.php?action=attendance_summary2">Unverified HRIS attendance Report</a><p> - Generated from Clockin with considering the number of hours worked</p></li>
                      <li><a href="dashboard.php?action=clock_data">Attendance Report by Clock Data</a><p> - Generated from clock and Clockout Logs without considering the number of working hours</p></li>
                      <li><a href="dashboard.php?action=employee_schedule_faci">Duty Rosta</a><p>Facility Employee Work Schedule</p></li>
                      <li><a href="dashboard.php?action=employee_schedule_dist">Duty Rosta</a><p>District Employee Work Schedule</p></li>
					 
					 
                     			
				   </ol>
    </div>
</div>
</div>