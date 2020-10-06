<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availability extends Ice_Controller {

	public $table = "availability";

	public function __construct() {
		parent::__construct();

		$is_user_logged_in =  $this->is_user_logged_in();

		if (!$is_user_logged_in) {
			$redirect_url = base_url()."student/login";
			redirect($redirect_url);
		}

		$this->load->model("availability_model");


	}
	function _remap($method){

		if (method_exists($this,$method)) {
			$this->$method();
		} else {
			$this->index($method);
		}


	}

	public function index($teacher_id="")
	{

		$data['teacher_id'] = $teacher_id;
		$data['teachers'] = $this->crud_model->get_data("users",array("role"=>"teacher"));

		$data['title'] = $this->lang->line('availability');

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('availability/view_availabilities',$data);
		$this->load->view('footer',$data);
	}

	public function get_calendar_data(){
	    
		$availability  = array();

		$where['booked'] = 0;

		if (isset($_POST['user_id']) && $_POST['user_id'] != "") {
			$where['available_user'] = $_POST['user_id'];
		}else{

			$where['available_user'] = get_user_id();

		}

		$result =  $this->availability_model->get_availability($where);

		foreach ($result as $key => $value) {

			$data['event_id'] = $value->id;
			$data['color'] = "#92D050";
			$data['start'] = $value->start;
			$data['end'] = $value->end;

			array_push($availability, $data);
		}

		echo json_encode($availability);

	}

	public function exist_availability(){


		extract($_POST);

		if ($user_id == "") {
			
			$user_id = get_user_id();
		}



		$result =  $this->availability_model->exist_availability($start,$end,$user_id);

		if (empty($result)) {

			$responce['status'] = TRUE;

		}else{

			$responce['status'] = FALSE;
			$responce['event_slot'] = $result->id; 
	
		}

		echo json_encode($responce);
		exit();

	}

  


	public function save_availability_calendar(){


		if (isset($_POST['events_remove'])) {
			$events_remove = $_POST['events_remove'];

			foreach ($events_remove as $key => $id) {

			$result =  $this->crud_model->delete_data($this->table,array("id"=>$id));

			}
		}
		
		
	
		

		
			if (isset($_POST['add_events'])) {
				$add_events = $_POST['add_events'];
					
			$insert_data= [];
				foreach ($add_events as $key => $value) {
				
					
					if ($_POST['user_id'] == "") {

						$_POST['user_id'] = get_user_id();
					}
					$data['available_user'] = $_POST['user_id'];

					if(isset($value['status']))
					{
						$startString =  $value['start'];
						$endString = $value['end'];
						$date = $value['date'];
						$intervels = $this->get_time($startString,$endString,"00:30:00");


						for($i = 0; $i < sizeof($intervels)-1; $i++)
						{

							$start_time = $date."T".$intervels[$i].":00";
							$end_time = $date."T".$intervels[$i+1].":00";

							$data['end'] = $end_time;
							$data['start'] = $start_time;


							$availability =  $this->availability_model->exist_availability($start_time,$end_time,$data['available_user']);

							if (!$availability) 
							{
								
								array_push($insert_data, $data);
								
							}
							else{
								
							}
							
						}
						
					}
					else
					{
						unset($value['temp_id']);
						$value['available_user'] = $_POST['user_id'];

						$availability =  $this->availability_model->exist_availability($value['start'],$value['end'],$value['available_user']);

						if (!$availability) 
						{
								
								$result =  $this->crud_model->add_data($this->table,$value);
								
						}
						
						
					}

							
					
				}

				if(!empty($insert_data))
				{
					$this->crud_model->insert_batch($this->table,$insert_data);
				}
				

			}


	
		echo "Your availability has been updated.";
	}


	public function view_availabilities(){

		$data['teachers'] = $this->crud_model->get_data("users",array("role"=>"teacher"));

		$data['title'] = "Availabilities";

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('availability/view_availabilities',$data);
		$this->load->view('footer',$data);

	}


	public function get_time($startString,$endString,$intervalString) 
	{
          $start = explode(":",$startString);
          $end = explode(":",$endString);
          $interval = explode(":",$intervalString);
          $startInMinutes = $start[0]*60+$start[1]*1;
          $endInMinutes = $end[0]*60+$end[1]*1;
          $intervalInMinutes = $interval[0]*60+$interval[1]*1;
          $times = [];

          for($i = $startInMinutes; $i <= $endInMinutes; $i+=$intervalInMinutes) {
            $hour = intval($i/60);
            $minute = $i%60;
            $minute = (strlen($minute) < 2) ? "0".$minute : $minute;
            $hour = (strlen($hour) < 2) ? "0".$hour : $hour;
            $interval =  $hour.":".$minute;
            array_push($times, $interval);
    		
          }

          return $times;
      
      
  		


     }




}
