<?php 
include("db_connector/mysqli_conn.php");
?>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mydata");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
 //Date picker
$.fn.datepicker.defaults.format = "yyyy/mm/dd";
$('.datepicker').datepicker({
});
</script>
 
<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
			  <li class=""><a href="dashboard.php?action=rosta1">Schedule Participants <p style="font-size:8; color:red;">(By Calendar Format)</p></a></li>
				 
				  <li class="active"><a href="dashboard.php?action=rosta">Schedule Participants <p style="font-size:8; color:red;">(By Multiple Selection grouping by date)</p></a></li>
				  		  
                 </ul>
				</div>
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } 
	?>

	

           

<?php
$myfacility=$line->facility;
if(isset($_GET['msg'])){
$print_msg=$_GET['msg'];



echo'<div class="alert alert-success alert-dismissable">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>'.$print_msg.'</strong>
                  </div>';
	
}
'<button  class="btn btn btn-default"  onclick="newDoc()"  ><span class="glyphicon glyphicon-eye-open"></span>Rosta Preview</button>';
	
?>

<div class="input-group" style="margin-bottom:3px; width:30%; float:right;"> 

	 
 </div>

 
<form   class="form-horizontal" action="universal_funcs/madd.php" id="rostad" method="post">
     <div class="box-header with-border">
					 <label>Schedule Type:</label>
                  <select name="schedule" class="form-control select2" id="myselect">
                            <?php 
							//schedule type
							$sql = mysqli_query($dbcon,"SELECT schedule_id,schedule,letter FROM schedules");
		                      $i=0;
							  while ($list=mysqli_fetch_array($sql))
							  {
							  ?>
							  <option value="<?php echo $list['letter']; ?>"><?php  echo $list['schedule']; ?>
							  </option>
		               <?php
                 // Employee acility
					   } ?>
		           </select>
 <input type="hidden" value="<?php echo $myfacility; ?>" name="facility">
				  <div class="input-group date" data-provide="datepicker">
					<label><span style="color:">Day:</span></label> 
                      <input name="schedule_date"  type="text" id="test1"   class="form-control" value="<?php ?>" required>
                      <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                     </div>
			        </div></b>
                </div>
<div class="col-md-12 offset-2" style="width:100%; overflow:auto; margin:0 auto">
<hr style="border:1px solid rgb(140, 141, 137);"/> 

<input type="hidden" name="table" value="rosta">


  

	<button name="add_schedule" id="add_schedule" type="submit" class="btn btn-primary"  style="margin-left:5px;"><span class="glyphicon glyphicon-ok-circle"></span>Schedule</button>
<br/>
<div class="input-group" style="margin-right:2px;; width:30%; float:right;"> 
     <label>Advanced Search</label>
      <input type="text"  class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search by NIN" title="NIN">                                 
</div>
<br/>	
  
	 <table id="mydata" class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
                        <th style="width:10px;">No</th>					  
                        <th style="width:15px;">Select</th>	
                        <th>IPPS</th>						
                        <th style="display:none">ID</th>						
                        <th>National ID NO</th>						
						<th>Name</th>
						<th>Position</th>
						
                      </tr>
                    </thead>
                    <tbody id="myUL">
				
					<?php 
					$sql="SELECT Surname,emp_id,national_id,Firstname, Othername, Position FROM employee_details WHERE flag=1 LIMIT 20";
					$result = mysqli_query($dbcon,$sql);
					$i=1;
					while($row = mysqli_fetch_array($result)) 
                   {
					     if ($row['national_id']!=""){
							 $id=$row['national_id'];
						 }
						 else{
					      $id=$row['emp_id'];
						 }
                    ?>
					
				   <tr >
				        <td><?php echo  $i++; ?></td>
					  <td>
					
				   
					  <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id; ?>">
					
					 </td>
					  <td> <?php  echo $row['emp_id'];?></td>
					  <td style="display:none"> <?php  echo $id;?></td>
					  <td> <?php  echo $row['national_id'];?></td>
					  <td><?php echo $myname=$row['Surname']." ".$row['Firstname']." ".$row['Othername'];?></td>   				  
					  <td> <?php  echo $row['Position'];?></td>
					 
					 
	
				   
				   </tr >
				   <?php }?>
                    </tbody>
                    <tfoot>
                    </tfoot>
					
    </table>
	<input type="hidden" name="return" value="dashboard.php?action=rosta">
    </form>	
</div>
  <script>
$('#rostad').submit(function(e){
	
	e.preventDefault();
	var url=$(this).attr('action');
	var data=$(this).serialize();
	//alert(data);
	
	
	$.ajax({method:'post',
	data:data,
	url:url,
	success:function(response){
alert(response);
	}
	});
});




</script>
			
<div class="col-md-4">			 

</div>
<div class="col-md-4">

</div>
