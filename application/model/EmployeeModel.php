<?php 

require_once(__DIR__.'/../../core/AndreModel.php');

class EmployeeModel extends AndreModel{

	function __contruct(){
		parent::__construct();
	}
    
	function saveEmployee($data){

      return  $query=$this->insert('employee_details',$data);
    //return $this->notify($query);
    }

	function viewEmpoyees(){

    

		return $this->get('array','select * from employee_details');
    }
    function viewEmpoyee($id=FALSE){

		return $this->get('array','select* from employee_details where employee.id=$id');
	}
	 function deleteEmmployee($id){
       $query= $this->delete('employee_details',$id);

     return $this->notify($query);
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
    }
    function deleteData($table,$id){
    
      $query=$this->delete($table,$id);
      if($query)
     {
     return 'Success';
     }
     }
    // function importCSV($csvFile)
    // {
    //   while(($line = fgetcsv($csvFile)) !== FALSE){
    //     $sql=$this->raw_insert("INSERT INTO employee_details (emp_id, national_id, Surname, Firstname, Othername, Contact, Position, Department, district, facility, flag) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."')");
    //     }
    //      fclose($csvFile);
    //      if($sql){
    //     $data['msg'] = 'Success';
    //      }
  
    //    else{
    //   $data['msg']= 'Check File';
    //     }
       
    // }
}
 ?>