<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
				  <li class="active"><a href="dashboard.php?action=import">Import Employee Records</a></li>
				  <li class=""><a href="dashboard.php?action=register">Register New Employee</a></li>
                  <li class=""><a href="dashboard.php?action=passport">Add Passport size Photo</a></li>
                   
              </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h3 class="box-title">Import Multiple Employee Records</h3>
                </div>
<div class="col-md-6">
  <style type="text/css">
    #importFrm{margin-bottom:;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
   
	<p> Supported file Format .csv</p>
    <div class="panel panel-default">
        <div class="panel-heading">
            <label>The file has Headers</label><input type="checkbox" class="btn btn-primary" name="fileheaders" checked>
            <a href="javascript:void(0);" class="btn btn-default" onclick="$('#importFrm').slideToggle();">Import Employees</a>
        </div>
        <div class="panel-body">
            <form action="modules/import/importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                
            </form>
	    </div>
	</div>
</div>
<div class="col-md-6">
</div>
<?php
include '../../db_connector/mysqli_conn.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                $prevQuery = "SELECT id FROM employee_details WHERE emp_id = '".$line[0]."' AND national_id = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update data
                    $db->query("UPDATE employee_details SET Surname = '".$line[2]."', Firstname = '".$line[3]."', Othername = '".$line[4]."', Position = '".$line[5]."', Department = '".$line[6]."', district = '".$line[7]."', facility = '".$line[8]."' WHERE emp_id = '".$line[0]."' AND national_id = '".$line[1]."'");
                }else{
                    //insert member data into database
                    $db->query("INSERT INTO employee_details (emp_id, national_id, Surname, Firstname, Othername, Contact, Position, Department, district, facility, flag) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."')");
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the employee_details page
header("Location:../../dashboard.php?action=view_employee&".$qstring);
          