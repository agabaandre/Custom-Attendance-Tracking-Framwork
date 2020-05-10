<?php

require_once(__DIR__.'/../model/EmployeeModel.php');
require_once(__DIR__.'/../../core/AndreController.php');


class Employee extends AndreController{

	function __construct(){
        $this->EmpData=new EmployeeModel();
	}
	public function addEmployee(){
    $data['template']='add_employee';
	return	$this->load_view('main',$data);
    }

    public function insertEmployee(){
        $employee=$this->inputpost();
        $data['template']='add_employee';
        $this->EmpData->saveEmployee($employee);
        
	return	$this->load_view('main',$data);
    }
    
	public function viewEmployee(){
        $data['template']='view_employee';
        $data['employees']=$this->EmpData->viewEmpoyees();
        
   return	$this->load_view('main',$data);

    }
    


}

	



?>