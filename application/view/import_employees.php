<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class=""><a href="<?php echo base_url();?>index.php/Employee/addEmployee">Register New Employee</a></li>
				<li class="active"><a href="<?php echo base_url();?>index.php/Employee/import">Import Employee</a></li>
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
            <form action="" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Import CSV">
            </form>
	    </div>
	</div>
</div>
<div class="col-md-6">
</div>
