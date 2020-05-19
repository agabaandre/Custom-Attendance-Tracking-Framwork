<?php 
require_once(__DIR__.'/../../core/AndreModel.php');
class EmployeeModel extends AndreModel{
	function __contruct(){
		parent::__construct();
	}
	function saveEmployee($data){
        $query=$this->insert('employee_details',$data);
        if($this->affected_rows()>1){
          return $this->inputpost('Surname'). 'Added';
        }
        else{
          return 'Failed';
        }
    }
	function viewEmpoyees(){
		return $this->get('array','select * from employee_details');
    }
    function viewEmpoyee($id=FALSE){
		return $this->get('array','select* from employee_details where employee.id=$id');
	}
	 function deleteEmmployee($id){
       $query= $this->delete('employee_details',$id);
       if($query)
       {
       return 'Success';
       }
       else{
        return 'Failed';
       }
    }
    public function viewData($table){
    return	$this->get("array","SELECT * FROM `$table`");
    }
    function addData($table,$sdata){
     $query=$this->insert($table,$sdata);
     if($query)
    {
    return 'Success';
    }
    else{
      return 'Failed';
    }
    }
    function updateData($table){
       $data=$this->inputpost();
      if ($table=='employee_details'){
        $where=array('emp_id'=>$this->inputpost('emp_id'));
      }
      else{
        $where=array('id'=>$this->inputpost('id'));
      }
      $query=$this->update($table,$data,$where);
      if($query)
     {
     return 'Success';
     }
     else{
       return 'Failed';
     }

     }
    function deleteData($table,$id){
     $query=$this->delete($table,$id);
      if($query)
     {
     return 'Success';
     }
     else{
       return 'Failed';
     }
     }
    public function getFacilities(){
    $list=$this->get("array","SELECT * from facility");
    return $list;
    }
    public function getDistricts(){
      $list=$this->get("array","SELECT * from district");
    return $list;
    }
    public function getDeparts(){
      $list=$this->get("array","SELECT * from departments");
    return $list;
     }
     public function getJobs(){
      $list=$this->get("array","SELECT * from job");
    return $list;
     }
}
 ?>