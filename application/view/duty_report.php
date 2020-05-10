<?php 
include("db_connector/mysqli_conn.php");
?>
<div class="col-md-12" style=" background:white; border-radius: 5px;"> 
<div class="nav-tabs-custom"> 
    <ul class="nav nav-tabs">
				  <li class="btn btn-sm btn-default"><a href="dashboard.php?action=reports">Back</a></li>			  
               
				   </ul>
				</div>
<div class="col-md-12">
<?php include("src/export.php");?>
<script>
 function printDiv(printableDiv){
   
                var printContents =document.getElementById(printableDiv).innerHTML;
				var originalContents= document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
				}
</script>
<button type="button"  class="btn btn-sm btn-default" onclick="printDiv('printableArea')">Web Print</button>
<hr style="border:1px solid rgb(140, 141, 137);"/>


<!--Filters-->

<p style="font-weight:bold;">Select Month and Year</p>
<form action="" class="form form-inline" method="POST" style="width:30%;" class="form-inline">
<div class="form-group">
  <label for="month_end">Month</label>
  <?php if(isset($_POST['apply_limits'])){
	  
	  
	  $myday=$_POST['month'];					
      $myyear=$_POST['year'];
	  echo $final_date=$myyear.'-'.$myday;	
	
  }
  else{
	  $final_date=date("Y-m");
  }
  ?>
 <select id="month" name="month" class="form-control select2">
					  <?php
			          $select_op=$_POST['month'];
					  
                      $month = array("January"=>"01", "February"=>"02", "March"=>"03", "April"=>"04", "May"=>"05", "June"=>"06", "July"=>"07", "August"=>"08", "September"=>"09", "October"=>"10", "November"=>"11", "December"=>"12");

                      foreach($month as $key => $value) {
						  $selected="selected";?>
                    <option value="<?php echo $select_op=$value; ?>"<?php if ($select_op==$active_op){echo "selected";}?>><?php  echo $key; ?>
                        <?php   }
                   ?> 
					  
					  
 </select>
  <label for="year">Year</label>
 
 <select id="month" name="year" class="form-control select2">
					  <?php
			           $select_ops=$_POST['year'];
                      $year = array("2017"=>"2017", "2018"=>"2018", "2019"=>"2019", "2020"=>"2020");

                      foreach($year as $keys => $values) {
						  $selected="selected";?>
                    <option value="<?php echo $select_ops=$values; ?>"<?php if ($select_ops==$active_ops){echo "selected";}?>><?php  echo $keys; ?>
                        <?php   }
      ?> 
					  
					  
 </select>     

  <p></p>
  <button   type="submit" class="btn btn btn-default" name="apply_limits"><span class="glyphicon glyphicon-ok"></span>Apply Limits</button>
</div>
</form>

<div id="printableArea">                            
                <div class="box-header with-border">
                  <h5 class="box-title">Duty Rosta</h5>
				  </div>
					<table id="mydata" class="table table-hover table-responsive table-bordered">
                    <thead>
                      <tr>
					   <th>#</th>
					   <th>Year and Month</th>
					    <th>National ID</th>
					    <th>Name</th>
					    <th>Position</th>
					    <th>D</th>
						<th>E</th>
						<th>N</th>
						<th>O</th>
						<th>A</th>
						<th>S</th>
						<th>M</th>
						<th>Z</th>
						
					
						
						
                    
                    </thead>
					</tr>
                    <tbody>
					
				  <tr>
				  <?php
                  $i=1;
				  $sql="SELECT  DISTINCT rosta.nin, employee_details.surname, employee_details.firstname,employee_details.othername,employee_details.position FROM rosta,employee_details WHERE employee_details.national_id=rosta.nin OR employee_details.emp_id=rosta.nin AND schedule_date LIKE'$final_date%%%'";
					
					
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) 
						
						{
				  ?>
				  <td><?php echo $i++; ?></td>
				  <td><?php echo $final_date; ?></td>
				   <td><?php echo $nin=$row['nin']; ?></td>
				  <td><?php echo $row['surname']." ".$row['firstname']." ".$row['othername']; ?></td>
				  <td><?php echo $row['position'];?></td>
				 
				   <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqlb="SELECT count(schedule) as day FROM rosta WHERE schedule='D' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resultb = mysql_query($sqlb);
					while($rowb = mysql_fetch_assoc($resultb)){ 
					echo $rowb['day']; }
					?>
					</td>
				  <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqlb="SELECT count(schedule) as evening FROM rosta WHERE schedule='E' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resultb = mysql_query($sqlb);
					while($rowb = mysql_fetch_assoc($resultb)) {
					echo $rowb['evening']; }
					?></td>
				  <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqln="SELECT count(schedule) as night FROM rosta WHERE schedule='N' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resultn = mysql_query($sqln);
					while($rown = mysql_fetch_assoc($resultn)) {
						echo $rown['night']; }
					?></td>
				  <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqlo="SELECT count(schedule) as off FROM rosta WHERE schedule='O' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resulto = mysql_query($sqlo);
					while($rowo = mysql_fetch_assoc($resulto)) {
					echo $rowo['off']; }
					?></td>
				   <td>
				   <?php 
					 //Night
					$nin=$row['nin'];
					$sqla="SELECT count(schedule) as annual FROM rosta WHERE schedule='A' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resulta = mysql_query($sqla);
					while($rowa = mysql_fetch_assoc($resulta)) {
					echo $rowa['annual']; }
					?></td>
				    <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqls="SELECT count(schedule) as study FROM rosta WHERE schedule='S' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$results = mysql_query($sqls);
					while($rows = mysql_fetch_assoc($results)) {
					echo $rows['study']; }
					?>
				    </td> 
				   <td><?php 
					 //Night
					$nin=$row['nin'];
					$sqlm="SELECT count(schedule) as maternity FROM rosta WHERE schedule='M' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resultm = mysql_query($sqlm);
					while($rowm = mysql_fetch_assoc($resultm)) {
					echo $rowm['maternity']; }
					?>
				   </td> 
				   <td>
				   <?php 
					 //Night
					$nin=$row['nin'];
					$sqlo="SELECT count(schedule) as other FROM rosta WHERE schedule='Z' AND nin='$nin' AND schedule_date LIKE'$final_date%%%'";
					$resulto = mysql_query($sqlo);
					while($rowo = mysql_fetch_assoc($resulto)) {
					echo $rowo['other']; }
					?></td> 
				  
                  </tr>
				  <?php } ?>	
                    </tbody>
                    <tfoot>
					
					
                    </tfoot>

	<b style="color:#000; text-decoration:underline; font-weight:bold;">Year and Month: <?php echo $final_date; ?></b><br/>
	<b style="color:#000; text-decoration:underline; font-weight:bold;">Legend</b>
	<tr>            
					<p style="color:red;">D: Day shift E: Evening shift N: Night shift O: Off-duty S: Study leave M:Maternity leave Z: Other preauthorised leave A: Annual leave</p>
	</tr>
	</table>		
   

   </div>
</div>
</div>

