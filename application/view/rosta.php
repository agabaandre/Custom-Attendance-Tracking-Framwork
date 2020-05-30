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
					<?php echo $schedule['letter']." = ".$schedule['name'].", "; ?>
						<?php endforeach; ?>
						</p>
               			 </div>

                <div class="panel-body" style="overflow-x: scroll;">
                	<form class="form-horizontal" style="padding-bottom: 2em;" action="<?php echo base_url(); ?>index.php/Attendance/roster" method="post">
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
						
						<div class="col-lg-12" style="text-align:center;">
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
						   <tr>
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
							<input type="text" style="padding:2px; text-align: center; border-radius:4px; border:1px #f1ecec solid;" class="update duty" id="<?php echo $year."-".$month."-".$d.$singleduty['emp_id']; ?>"  day="<?php echo $i; ?>" pid="<?php echo $singleduty['emp_id']; ?>"
							pattern="[A-Za-z]+" size="1px" maxlength="1" title="Letters only for Duty" value="<?php echo $matches[$singleduty['day'.$i].$singleduty['emp_id']]; ?>">
								<?php }
								else{
									?>
							<input type="text" size="1px"  class="new duty" id="<?php echo $singleduty['emp_id']; ?>"  day="<?php echo $i; ?>" style="padding:1px; text-align: center; border-radius:4px; border:1px #f1ecec solid;"  pattern="[A-Za-z]+" maxlength="1" pid="<?php echo $singleduty['emp_id']; ?>" name='day<?php echo $no; ?>' title="Letters only for Duty" >
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
<script type="text/javascript">
var url=window.location.href;
if(url=='<?php echo base_url(); ?>index.php/Attendance/roster'){
	$('.fixed-top').addClass('mini-navbar');
}
	$('.new').keyup(function(event){
	if (event.keyCode == 13) {
        textboxes = $("input.duty");
        currentBoxNumber = textboxes.index(this);
        if (textboxes[currentBoxNumber + 1] != null) {
            nextBox = textboxes[currentBoxNumber + 1];
            nextBox.focus();
            nextBox.select();
        }
event.preventDefault();
return false;
 } //if enter key is pressed
    else{ //if not enter key
var letter=$(this).val(); //input letter
if(letter!==""){
var hpid=$(this).attr('id');// person_id
var day=$(this).attr('day');//day date e.g 3rd; 3
var schedules=<?php echo json_encode($tab_schedules); ?>;
//check if letter is a valid schedule
letter=letter.replace(/\s/g, '');//remove spaces
letter=letter.toUpperCase();//converte to upper case
var duty=schedules["'"+letter+"'"];  // get the schedule id
console.log(duty);
if( typeof duty=="undefined"){  // if letter is not defined as shift lettter
	$.notify("Warning: That letter doesn't represent any schedule", "warn");
	$(this).val('');
}
else{
var color=pickColor(duty);  // get corresponding color for calendar rota
if(day<10){
	day="0"+day;
}
var month=$('#month').val();
var year=$('#year').val();
var start=year+"-"+month+"-"+day;  //full duty date
var entry=start+hpid;//entry id
var startDate = new Date(start);
// seconds * minutes * hours * milliseconds = 1 day 
var end = new Date();
	 end.setDate(startDate.getDate() + 1); 
console.log(end);
$(this).val(letter);
$.post('<?php echo base_url(); ?>index.php/Attendance/addRoster', {
	entry_id:entry,
	emp_id: hpid,
	schedule_id: duty,
	color: color,
	duty_date: start,
	end: end.getFullYear() + "-"+ (end.getMonth()+1) + "-" + end.getDate()
}, function(result){
	console.log(result);
$(this).prop('id',entry);
$(this).addClass('update');
$(this).removeClass('new');
$.notify("Scheduled Saved", "success");
                 })
        }// else for letter undefined
    }//if letter is not empty
}//end if not enter key
})
$('.update').keyup(function(event){
if (event.keyCode == 13) {
textboxes = $("input.duty");
currentBoxNumber = textboxes.index(this);
if (textboxes[currentBoxNumber + 1] != null) {
	nextBox = textboxes[currentBoxNumber + 1];
	nextBox.focus();
	nextBox.select();
}
 event.preventDefault();
            return false;
    } //if enter key is pressed
    else{ //if not enter key
var letter=$(this).val(); //input letter
if(letter!==""){
var id=$(this).attr('id');// entry_id
var hpid=$(this).attr('pid');// person_id
var schedules=<?php echo json_encode($tab_schedules); ?>;
//console.log(schedules);
//check if letter is a valid schedule
letter=letter.replace(/\s/g, '');//remove spaces
letter=letter.toUpperCase();//converte to upper case
var duty=schedules["'"+letter+"'"];  // get the schedule id
if( typeof duty=="undefined"){  // if letter is not defined as shift lettter
$.notify("Warning: That letter doesn't represent any schedule", "warn");
	$(this).val('');
}
else{
var color=pickColor(duty);  //run update
   $(this).val(letter);
   //cl
            $.post('<?php echo base_url(); ?>index.php/Attendance/updateRoster', {
                id:id,
                hpid: hpid,
                duty:duty,
				color: color
            }, function(result){
                console.log(result);
                $.notify("Update Finished", "info");
            });//end post
        }// else for letter undefined
    }//if letter is not empty
}//if not enter key
        })
function pickColor(duty){
if(duty=='14'){
    var kala='#d1a110';
}
else
    if(duty=='15'){
//even
    var kala='#49b229';
}
else
//night
if(duty=='16'){
    var kala='#29b299';
}
else
//off
if(duty=='17'){
    var kala='#297bb2';
}
else
//annual leave
if(duty=='18'){
    var kala='#603e1f';
}
else
//study leave
if(duty=='19'){
    var kala='#052942';
}
else
//maternity leave
if(duty=='20'){
    var kala='#280542';
}
else
//other
if(duty=='21'){
    var kala='#420524';
}
return kala;
}
</script>
