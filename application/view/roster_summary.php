
</style>
	  
        <div class="row">
            <div class="col-md-8" style="padding-bottom:0.5em;">
			    <form class="form-horizontal" style="padding-bottom: 2em;" action="<?php echo base_url(); ?>index.php/Attendance/summaryReport" method="post">
					<div class="col-md-3">
						<div class="control-group">
						<input type="hidden" id="month" value="<?php if(isset($_POST['month'])){ echo $month=$_POST['month']; } else { echo $month=date('m'); }  ?>">

							<select class="form-control" name="month" onchange="this.form.submit()" >
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
					<div class="col-md-3">
						<div class="control-group">
						<input type="hidden" id="month" value="<?php if(isset($_POST['year'])){ echo $year=$_POST['year']; } else { echo $year=date('Y'); }  ?>">
							
							<select class="form-control" name="year" onchange="this.form.submit()">
								<option><?php echo $year; ?></option>
								<?php for($i=-5;$i<=25;$i++){  ?>
								<option><?php echo 2017+$i; ?></option>
								<?php }  ?>	
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="control-group">
							<input type="submit" name="" value="Load Month" class="btn btn-success">
						</div>
					</div>
				</form>
			</div>
<div class="col-md-4">
			    <?php 
				?>
			
				</a> <?php //} ?>
			</div>
<div class="dashtwo-order-area" style="margin: 15px; min-height: 35em;">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
				<div class="panel">
					<div class="panel-header">
			<?php 
			?>
						<a href="<?php echo base_url(); ?>index.php/Attendance/bundleCsv/<?php echo $year."-".$month; ?>" style="margin-top:1em; margin-left:1em;" class="btn btn-success btn-sm"><i class="fa fa-file"></i> Export CSV</a>
			<?php //} ?>
					</div>
					<div class="panel-body">
            <?php 
            $sums=$data['sums'];
			//print_r($sums);   //raw data
			?>
		
			<div class="col-md-9" style="border-right: 0; border-left: 0; border-top: 0;">
					<h4>
			<?php 
			if(count($sums)<1)
			{
			echo "<font color='red'> No Schedule Data</font>";
			}
			else{
			?>
				SCHEDULES SUMMARY
					<?php
					 echo " - ".$sums[0]['facility']."<br>"; 
					echo "              ".date('F, Y',strtotime($year."-".$month));
					?>
			<?php } ?>
				</h4>
			</div>
			<table id="mydata" class="table table-bordered table-responsive"> 
            <thead>
			<tr>
			    <th class=""># <b id="name"></b></th>
			    <th class=" ">Name</th>
				<th class=" ">Day </th>
				<th class=" ">Off</th>
				<th class=" ">Annual</th>
				<th class=" ">Study</th>
				<th class=" ">Maternity</th>
			   <th class=" ">Other</th>
			</tr>
            </thead>
			<tbody>
			<?php 
			$no=1;
			foreach($sums as $sum) {?>
			<tr>
			    <td> <?php echo $no++; ?></td>
			    <td><?php echo $sum['person']; ?></td>
				<td class=" " data-label="D"><?php echo $sum['D'];?></td>
				<td class=" " data-label="O"><?php echo $sum['O'];?></td>
				<td class=" " data-label="A"><?php echo $sum['A'];?></td>
				<td class=" " data-label="S"><?php echo $sum['S'];?></td>
				<td class=" " data-label="M"><?php echo $sum['M'];?></td>
				<td class=" " data-label="Z"><?php echo $sum['Z'];?></td>
			</tr>
			<?php
			
			} ?>
			</tbody>
			</table>
			</div></div>
			</div><!--col 12-->
            </div>
  </div>
  </div>

  
 <?php 
?>
<script type="text/javascript">
var url=window.location.href;
if(url=='<?php echo base_url(); ?>index.php/Attendance/summaryReport'){
	$('.sidebar-mini').addClass('sidebar-collapse');
}
$('.csv').click(function(e){
    e.preventDefault();
    $.ajax({
        url:'<?php echo base_url(); ?>index.php/Attendance/bundleCsv',
        success:function(res){
            console.log(res);
        }
    })
})
</script>
