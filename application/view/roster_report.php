<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/rosta.css">
<div class="dashtwo-order-area" style="padding-top: 10px;">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Work Schedules </h2>
					<p style="text-align:left; font:14 px; margin-top:5px;font-weight:bold;">
						<?php 
						
						$schedules=$data['schedules'];
						foreach($schedules as $schedule): ?>
					<?php echo $schedule['letter']."=".$schedule['name']; ?>
						<?php endforeach; ?>
						</p>
               			 </div>

                <div class="panel-body" style="overflow-x: scroll;">
                	<form class="form-horizontal" style="padding-bottom: 2em;" action="<?php echo base_url();?>index.php/Attendance/schedulesReport" method="post">
							<div class="col-md-4">
								<div class="control-group">
								<input type="hidden" id="month" value="<?php if(isset($_POST['month'])){ echo $month=$_POST['month']; } else { echo $month=date('m'); }  ?>">
									<select class="form-control" name="month"  onchange="this.form.submit()">
										<option value="<?php echo $month; ?>"><?php echo strtoupper(date('F', mktime(0, 0, 0, $month, 10)))."(Showing below)"; ?></option>
										<option value="01">JANUARY</option>
										<option value="02">FEBRUARY</option>
										<option value="03">MARCH</option>
										<option value="04">APRIL</option>
										<option value="05">MAY</option>
										<option value="06">JUNE</option>
										<option value="07">JULY</option>
										<option value="08">AUGUST</option>
										<option value="09">SEPTEMBER</option>
										<option value="10">OCTOBER</option>
										<option value="11">NOVEMBER</option>
										<option value="12">DECEMBER</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="control-group">
									<input type="hidden" id="year" value="<?php if(isset($_POST['year'])){ echo $year=$_POST['year']; } else { echo $year=date('Y'); }  ?>">
									<select class="form-control" name="year" onchange="this.form.submit()">
											<option><?php echo $year; ?></option>
											<?php for($i=-5;$i<=25;$i++){  ?>
											<option><?php echo 2017+$i; ?></option>
											<?php }  ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="control-group">
									<input type="submit" name="" value="Load Month" class="btn btn-success">
								</div>
							</div>
						</form>
						<div class="col-lg-12">
						<script>
						function printDiv(printableDiv){
						
										var printContents =document.getElementById(printableDiv).innerHTML;
										var originalContents= document.body.innerHTML;
										document.body.innerHTML = printContents;
										window.print();
										document.body.innerHTML = originalContents;
										}
						</script>
						<style>
						@media print {
							input::-webkit-outer-spin-button,  
								input::-webkit-inner-spin-button {
								-webkit-appearance: none;
							}
						}
						</style>
								
							<button type="button"  class="btn btn-sm btn-default" onclick="printDiv('printableArea')">Web Print</button>
					
						<div class="col-lg-12" id="printableArea" style="text-align:center;">
						<p style="text-align:center; font-weight:bold; font:14rem;"></p>
							<?php 
						   //	print_r($data);
							$duties=$data['duties'];
							$matches=$data['matches'];
							$tab_schedules=$data['tab_schedules'];
							//print_r($tab_schedules);
							//print_r($duties);   //carries report data
							//print_r($matches);  //carries person's day's duty letter
							// ?>
						 <table id="mydata" class="minimalistBlack"> 
							 <thead>
							<tr>
							    <th class="cell tbprimary"># <b id="name"></b></th>
							    <th class="cell name">Name</th>
							     <th class="cell">Job</th>
							<?php
								if (!empty($_POST['month']))
								{
										$month=$_POST['month'];
										$year=$_POST['year'];
								}
								else{
										$month=date('m');
										$year=date('Y');
								}
								$monthdays = cal_days_in_month(CAL_GREGORIAN, $month, $year); // get days in a month
								for($i=1;$i<($monthdays+1);$i++)
								{
									?>
								<th><?php echo $i; ?></th>
								<?php }?>
							</tr>
							</thead>
                   			 <tbody>
							<?php 
								$no=0;
							foreach($duties as $singleduty) { 
								$no++;
								?>
						   <tr style="padding:4px;">
							<td><?php echo $no;?>
							</td>
							<td><?php echo $singleduty['fullname'];?></td>
							<td><?php $words=explode(" ",$singleduty['Position']);
								$letters="";
								foreach ($words as $word) {
									$letters.=$word[0];
								}
								echo $letters;
								?>
							</td>
								<?php 
								for($i=1;$i<($monthdays+1);$i++)
								{
									?>
								<td>
									<?php if($singleduty['day'.$i]!='')
								{
									$d=$i;
							if($d<10){
								$d="0".$d;
							}
									?>
							<?php echo $matches[$singleduty['day'.$i].$singleduty['emp_id']]; ?>
								<?php }
								else{
									?>
							<?php 
								}
								;?>
								</td>
								<?php } // end for , one that loops tds ?>	
						</tr>
						<?php }
						 ?>
						 </tbody>
						</table>
						</div>
              </div>
          </div>
      </div>
    </div>
</div>

