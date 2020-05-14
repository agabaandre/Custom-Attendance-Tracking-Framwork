<?php
require_once(__DIR__.'/../model/EmployeeModel.php');
require_once(__DIR__.'/../model/AttendanceModel.php');
require_once(__DIR__.'/../../core/AndreController.php');
class Employee extends AndreController{
	function __construct(){
        $this->EmpData=new EmployeeModel();
        $this->AttData=new AttendanceModel();
	}
	public function addEmployee(){
    $data['template']='add_employee';
    $data['dist']=$this->EmpData->getDistricts();
    $data['fac']=$this->EmpData->getFacilities();
    $data['depart']=$this->EmpData->getDeparts();
    $data['job']=$this->EmpData->getJobs();
	return	$this->load_view('main',$data);
    }
    public function insertEmployee(){
        $employee=$this->inputpost();
        $data['template']='add_employee';
        $this->EmpData->saveEmployee($employee);
        $data['dist']=$this->EmpData->getDistricts();
        $data['fac']=$this->EmpData->getFacilities();
        $data['depart']=$this->EmpData->getDeparts();
        $data['job']=$this->EmpData->getJobs();
	return	$this->load_view('main',$data);
    }
    public function updateData($template,$table){
        $employee=$this->inputpost();
        $data['template']=$template;
        $data['msg']=$this->EmpData->updateData($table);
        $data['schedules']=$this->AttData->getSchedules();
        $data['employees']=$this->EmpData->viewEmpoyees();
        $data['dist']=$this->EmpData->getDistricts();
        $data['fac']=$this->EmpData->getFacilities();
        $data['depart']=$this->EmpData->getDeparts();
        $data['job']=$this->EmpData->getJobs();

	return	$this->load_view('main',$data);
    }
	public function viewEmployee(){
        $data['template']='view_employee';
        $data['employees']=$this->EmpData->viewEmpoyees();
        $data['dist']=$this->EmpData->getDistricts();
        $data['fac']=$this->EmpData->getFacilities();
        $data['depart']=$this->EmpData->getDeparts();
        $data['job']=$this->EmpData->getJobs();
   return	$this->load_view('main',$data);
    }
    //department
    public function viewData($table,$template){
        $data['template']=$template;
        $data['dbset']=$this->EmpData->viewData($table);
   return	$this->load_view('main',$data);
    }
    public function addData($table,$template){
        $sdata=$this->inputpost();
        $data['template']=$template;
        if(!empty($this->inputpost())){
        $data['msg']=$this->EmpData->addData($table,$sdata);
        }
        $data['dbset']=$this->EmpData->viewData($table);
   return	$this->load_view('main',$data);
    }
    public function deleteData($table,$template){
        $id=$this->inputpost();
        $data['template']=$template;
        $data['msg']=$this->EmpData->deleteData($table,$id);
        $data['dbset']=$this->EmpData->viewData($table);
        $data['dist']=$this->EmpData->getDistricts();
        $data['fac']=$this->EmpData->getFacilities();
        $data['depart']=$this->UserData->getDeparts();
        $data['job']=$this->UserData->getJobs();
   return	$this->load_view('main',$data);
    }
    public function import(){
            $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    fgetcsv($csvFile);
                     while(($line = fgetcsv($csvFile)) !== FALSE){
                     $this->raw_insert("INSERT INTO employee_details (emp_id, national_id, Surname, Firstname, Othername, Contact, Position, Department, district, facility, flag) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."')");
                     }
                      fclose($csvFile);
                     }
                     else
                     {
                    $data['msg'] = 'Success';
                      }
                    }
                     else
                     {
                    $data['msg']= 'Check File';
                     }
                     $data['template']='import_employees';
            return	$this->load_view('main',$data);
        }
}
?>