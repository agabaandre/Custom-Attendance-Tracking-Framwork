<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
                 <li class="btn btn-sm btn-default"><a href="<?php echo base_url();?>index.php/Attendance/reports">Back</a></li>			  
             
            		<li class="active"><a href="<?php echo base_url();?>index.php/Attendance/staffList">Employee List</a></li>
                       </ul>
				</div>
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
          
<div class="col-md-12 offset-2" style="width:100%; overflow:auto; margin:0 auto;">
<button type="button"  class="btn btn-sm btn-default" onclick="printDiv('printableArea')">Web Print</button>
<div id="printableArea">
<hr style="border:1px solid rgb(140, 141, 137);">
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
<div class="col-md-4">			 
</div>
<div class="col-md-4">
</div>
</div>
