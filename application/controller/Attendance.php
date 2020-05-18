<?php
		require_once(__DIR__.'/../model/EmployeeModel.php');
		require_once(__DIR__.'/../model/AttendanceModel.php');
		require_once(__DIR__.'/../../core/AndreController.php');

class Attendance extends AndreController {
	public  function __construct(){
		$this->EmpData=new EmployeeModel();	
		$this->AttData=new AttendanceModel();	
	}
   public function getWidgetData(){
		$widgets=$this->AttData->widget_data();
		return $widgets;
	}
	public function roster(){	
			ini_set('memory_limit','128M');
			$data['schedules']=$this->AttData->getSchedules();
			$data['duties']=$this->AttData->fetch_tabs();
			$data['matches']=$this->AttData->matches();
			$data['tab_schedules']=$this->AttData->tab_matches();
			$data['facilities']=$this->EmpData->getFacilities();
			$data['template']='rosta';
		//	print_r($data['schedules']);
	   $this->load_view('main',$data);		
	}
	public function reports(){	
		$data['template']='home_reports';
	$this->load_view('main',$data);
}
	Public function schedulesReport(){
			$data['schedules']=$this->AttData->getSchedules();
			$data['duties']=$this->AttData->fetch_tabs();
			$data['matches']=$this->AttData->matches();
			$data['tab_schedules']=$this->AttData->tab_matches();
			$data['facilities']=$this->EmpData->getFacilities();
			$data['template']="roster_report";
			$this->load_view('main',$data);
	}
	Public function summaryReport(){
			$data['sums']=$this->AttData->fetchReport();
			$data['facilities']=$this->EmpData->getFacilities();
			$data['template']='roster_summary';
			$this->load_view('main',$data);
}
	Public function addRoster()
	{
			$result=$this->AttData->addRoster();
	return $result;
	}
	Public function updateRoster()
	{
			$result=$this->AttData->updateRoster();
	return $result;
	}
	
   public function staffList(){	
			$data['employees']=$this->EmpData->viewEmpoyees();
			$data['template']='employee_list';
//	print_r($data['$data']);
	$this->load_view('main',$data);		
}
public function bundleCsv($valid_range){
			$sums=$this->AttData->csvreport($valid_range);
			$fp = fopen('php://memory', 'w'); 
			$heading=array('person' =>"Names" ,'D'=>"Day Duty", 'O' =>"Off Duty", 'A' => "Annual Leave", 'S' => "Study Leave", 'M' => "Maternity Leave", 'Z' =>"Other Leave");
			array_unshift($sums,$heading);
			//print_r($sums);
			foreach ($sums as $sumrow) {
			fputcsv($fp, $sumrow);
			}
			$filename=$valid_range."_summary_report.csv";
			fseek($fp, 0);
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename="'.$filename.'";');
			fpassthru($fp);
			fclose($fp);
}	
}
