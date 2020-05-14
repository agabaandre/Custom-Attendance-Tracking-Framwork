<?php
require_once(__DIR__.'/../../core/AndreModel.php');
class AttendanceModel extends AndreModel{
	function __contruct(){
		parent::__construct();
	}
	public function getSchedules(){
	    $rows=$this->get('array',"SELECT * FROM schedules");
	    return $rows;
	}
	public function widget_data(){
			$query1=$this->get('object',"select count(schedules.id) as schedules from schedules ");
			$schedules=$query1[0]->schedules;
			$query3=$this->get('object',"select count(employee_details.emp_id) as staff from employee_details");
			$staff=$query3[0]->staff;
			$date=date('Y-m');  
			//number  of all employees who worked
			$query4=$this->get('object',"select count(distinct dutyreport.emp_id) as duty from dutyreport where  duty_date like '$date%'");
			$scheduled=$query4[0]->duty;
			$result=array("schedules"=>$schedules,"users"=>$users,"staff"=>$staff,"duty"=>$scheduled);
		return $result;
	}
	Public function tab_matches(){	
			$results=$this->get("array","Select id,letter from schedules");
			$sql="Select * from schedules";
            $ro=$this->num_rows($sql);
			$schedules=array();
			for($i=0;$i<$ro;$i++) {
				$schedules["'".$results[$i]['letter']."'"]=$results[$i]['id'];
		}
	return $schedules;
}
	Public function matches(){	
			$results=$this->get("array","Select dutyreport.emp_id,dutyreport.id,dutyreport.duty_date,schedules.letter from dutyreport,schedules where schedules.id=dutyreport.schedule_id");
			$matches=array();
			$ros="SELECT * from schedules";
             $ro=$this->num_rows($ros);
			for($i=0;$i<$ro;$i++){
			$matches[$results[$i]['duty_date'].$results[$i]['emp_id']]=$results[$i]['letter'];
			}
			return $matches;
		}
		Public function fetch_tabs(){	
			$month=$this->inputpost('month');
			$year=$this->inputpost('year');
			$date_range=$year."-".$month;
			if(empty($month))
			{
				$year=date("Y");
				$month=date("m");
				$date=$year."-".$month;
				$valid_range=$date;
			}
			else{
				$valid_range=$date_range;
			}
			//check if there schedules to pass
			$res="select entry_id from duty_rosta where duty_date like'$valid_range%'";
			$rowno=$this->num_rows($res);
			if($rowno<1){
			$data=$this->get("array","select distinct employee_details.emp_id,Surname as fullname,Position from schedules,employee_details");
			}
			else{  
			$rows=$this->get('array',"select distinct employee_details.emp_id from employee_details,dutyreport");
			$data=array();
			foreach($rows as $row){
			$id=$row['emp_id'];
			$query=$this->get('array',"SELECT employee_details.emp_id,dutyreport.duty_date, schedules.name,dutyreport.entry_id,schedules.name,Position,facility,concat(Surname,' ',Firstname) as fullname,max(dutyreport.day1) as day1,max(dutyreport.day2)as day2,max(dutyreport.day3)as day3,max(dutyreport.day4)as day4,max(dutyreport.day5)as day5,max(dutyreport.day6)as day6,max(dutyreport.day7)as day7,max(dutyreport.day8)as day8,max(dutyreport.day9)as day9,max(dutyreport.day10)as day10,
			max(dutyreport.day11)as day11,max(dutyreport.day12)as day12,max(dutyreport.day13)as day13,max(dutyreport.day14)as day14,max(dutyreport.day15)as day15,max(dutyreport.day16)as day16,max(dutyreport.day17)as day17,max(dutyreport.day18)as day18,max(dutyreport.day19)as day19,
			max(dutyreport.day20)as day20,max(dutyreport.day21)as day21,max(dutyreport.day22)as day22,max(dutyreport.day23)as day23,max(dutyreport.day24)as day24,max(dutyreport.day25)as day25,max(dutyreport.day26)as day26,max(dutyreport.day27)as day27,max(dutyreport.day28)as day28,max(dutyreport.day29)as day29,max(dutyreport.day30)as day30,max(dutyreport.day31)as day31 from dutyreport,schedules,employee_details WHERE( dutyreport.duty_date like '$valid_range%' and
			dutyreport.schedule_id=schedules.id  and  employee_details.emp_id='$id')");
			$rowdata=$query;
			array_push($data,$rowdata[0]);
		}}
			return $data;
		}
		Public function addRoster(){
			$start =$this->inputpost('start'); // or your date as well
			$enddate = date('Y-m-d',strtotime($start . "+1 days")); 
			$entry=$start.'ID'.$this->inputpost('hpid');
			$person=$this->inputpost('hpid');
			$duty=$this->inputpost('duty');
			$color=$this->inputpost('color');
			$data=$this->inputpost();
			$done=$this->insert('duty_rosta',$data);
			if($done){
				 $rows=$this->affected_rows();
			}
			else if(!$done){
				$rows=0;
			}
			return $rows;
		}
		//report
			public function fetchsums(){	
			$month=$this->inputpost('month');
			$year=$this->inputpost('year');
			$date_range=$year."-".$month;
			if(empty($month))
			{
				$year=date("Y");
				$month=date("m");
				$date=$year."-".$month;
				$valid_range=$date;
			}
			else{
				$valid_range=$date_range;
			}
			$schs=$this->get('array',"select letter,id from schedules");
			$rows=$this->get('array',"select distinct emp_id,concat(employee_details.surname,' ',employee_details.firstname) as fullname from employee_details ");
	
			$data=array();

			$mydata=array();
			
			$i=0;
			foreach($rows as $row){
				$emp_id=$row['emp_id'];
			$mydata["person"]=$row['fullname'];
				foreach($schs as $sc){
			$i++;
				$s_id=$sc['id'];
			$rowdata=$this->get("array","SELECT surname,letter,duty_rosta.emp_id,count(duty_rosta.schedule_id) as days from duty_rosta,employee_details,schedules where duty_rosta.emp_id=$emp_id and duty_date like'$valid_range%'and duty_rosta.schedule_id=$s_id and employee_details.emp_id=duty_rosta.emp_id and duty_rosta.schedule_id=schedules.id");
			$rows=$this->affected_rows();
		     		$mydata[$rowdata[0]['letter']]=$rowdata[0]['days'];
			
			}
			array_push($data,$mydata);
				}
			return $data;
			}
			public function csvreport($csv=NULL){	
				if(empty($csv))
				{
					$year=date("Y");
					$month=date("m");
					$date=$year."-".$month;
					$valid_range=$date;
				}
				else{
					$valid_range=$csv;
				}
				$schs=$this->get('array',"select letter,id from schedules");
				$rows=$this->get('array',"select distinct emp_id,concat(employee_details.surname,' ',employee_details.firstname) as fullname from employee_details ");
		
				$data=array();
	
				$mydata=array();
				
				$i=0;
				foreach($rows as $row){
					$emp_id=$row['emp_id'];
				$mydata["person"]=$row['fullname'];
					foreach($schs as $sc){
				$i++;
					$s_id=$sc['id'];
				$rowdata=$this->get("array","SELECT surname,letter,duty_rosta.emp_id,count(duty_rosta.schedule_id) as days from duty_rosta,employee_details,schedules where duty_rosta.emp_id=$emp_id and duty_date like'$valid_range%'and duty_rosta.schedule_id=$s_id and employee_details.emp_id=duty_rosta.emp_id and duty_rosta.schedule_id=schedules.id");
				$rows=$this->affected_rows();
						 $mydata[$rowdata[0]['letter']]=$rowdata[0]['days'];
				
				}
				array_push($data,$mydata);
					}
				return $data;
				}
		
}