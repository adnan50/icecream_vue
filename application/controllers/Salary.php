<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("users_model");
	}


	public function index(){

		$user_role = get_user_role();

		$data['user_role'] = $user_role;

		$salaries = array();




		if ($this->input->post("teacher_id") != "" && $user_role == "admin") {
			
			$teacher_id = $this->input->post("teacher_id");

		}elseif ($user_role == "teacher") {

			$teacher_id = get_user_id();

		}elseif ($user_role != "admin"){

			$this->load->view("page_404");
			die;
		}


		if ($this->input->post("month_year") == "") {
			
			$month = date('n');

			$year = date('Y');
		}else{

			$month_year = explode("/", $this->input->post("month_year"));

			$month = array_shift($month_year);

			$year = array_shift($month_year);

		}
		// echo "<pre>";
		$data['title'] = $this->lang->line('salary');

		$data['teachers'] = $this->crud_model->get_data("users",array("role"=>"teacher"));

		if (isset($teacher_id)) {
			

			$first_day_of_month = date("Y-m-d",mktime(0,0,0,$month,1,$year)); 
			$fifteen_day_of_month = date("Y-m-d",mktime(0,0,0,$month,15,$year)); 
			$last_day_of_month = date("Y-m-d",mktime(0,0,0,$month,30,$year)); 


			$join_class['availability'] = "availability.id=classes.availability_id";
			$join_class['tickets'] = "tickets.ticket_id=classes.ticket_id";
			$join_class['pricing_plans'] = "pricing_plans.plan_id=tickets.plan_id";
			$join_class['users'] = "users.id=classes.student_id";

			//$where_class['classes.class_status'] = 2;
			$where_class['availability.available_user'] = $teacher_id;
			$where_class['classes.completed_date >='] = $first_day_of_month;
			$where_class['classes.completed_date <='] = $last_day_of_month;
			$where_in['classes.class_status'] = array(2,4);
			$where_class['classes.ticket_id !='] ="level_test";
			$complete_classes = $this->crud_model->get_data("classes",$where_class,'',$join_class,"","","",$where_in);



			$join_level_test_class['availability'] = "availability.id=classes.availability_id";
			$join_level_test_class['users'] = "users.id=classes.student_id";
			$where_level_test_class['classes.class_status'] = 2;
			$where_level_test_class['availability.available_user'] = $teacher_id;	
			$where_level_test_class['classes.completed_date >='] = $first_day_of_month;
			$where_level_test_class['classes.completed_date <='] = $last_day_of_month;
			$where_level_test_class['classes.ticket_id'] = "level_test";
			$level_test_classes = $this->crud_model->get_data("classes",$where_level_test_class,'',$join_level_test_class);
			// $data['classes_data']->class_duration_in_mins = 25;

			//echo $this->db->last_query();
			
			$data['classes_data']  = array_merge($level_test_classes,$complete_classes);

			// echo "<pre>";
			// print_r($data['classes_data']);
			// exit();

			$teacher_rate = $this->users_model->get_user_meta("per_hour_rate",$teacher_id);
		

			foreach ($data['classes_data'] as $key => $value) {
				if ($value->ticket_id == "level_test") {
					$value->class_duration_in_mins  = 25;
				}
				
				$classStatus = $value->class_status;
				$salaries[$value->student_id]['student_name'] = $value->full_name;
				$salaries[$value->student_id]['work_hours_15'] = 0;
				$salaries[$value->student_id]['work_hours_30'] = 0;


				if (!isset($salaries[$value->student_id]['work_mins'])) {
					

					if($classStatus == 4)
					{
						$salaries[$value->student_id]['work_mins'] = $value->class_duration_in_mins/2; 
					}else{
						$salaries[$value->student_id]['work_mins'] = $value->class_duration_in_mins; 
					}

				}else{
					
					if($classStatus == 4)
					{
						$salaries[$value->student_id]['work_mins'] += $value->class_duration_in_mins/2; 
					}else{
						$salaries[$value->student_id]['work_mins'] += $value->class_duration_in_mins; 
					}
				}

				if (!isset($salaries[$value->student_id]['total_classes'])) {

					$salaries[$value->student_id]['total_classes'] = 1; 
				}else{
					$salaries[$value->student_id]['total_classes'] += 1; 
				}  


				$hour = $salaries[$value->student_id]['work_mins'] / 60;

				$salaries[$value->student_id]['work_hours'] = number_format($hour,2);



				if ($value->completed_date <= $fifteen_day_of_month) {

					if (!isset($salaries[$value->student_id]['work_mins_15'])) {

						
						if($classStatus == 4)
						{
							$salaries[$value->student_id]['work_mins_15'] = $value->class_duration_in_mins/2; 
						}else{
							$salaries[$value->student_id]['work_mins_15'] = $value->class_duration_in_mins; 
						}
					}else{
						
						if($classStatus == 4)
						{
							$salaries[$value->student_id]['work_mins_15'] += $value->class_duration_in_mins/2; 
						}else{
							$salaries[$value->student_id]['work_mins_15'] += $value->class_duration_in_mins; 
						}
					} 

					
				}elseif ($value->completed_date > $fifteen_day_of_month && $value->completed_date <= $last_day_of_month) {
					if (!isset($salaries[$value->student_id]['work_mins_30'])) {
						
						if($classStatus == 4)
						{
							$salaries[$value->student_id]['work_mins_30'] = $value->class_duration_in_mins/2;
						}else{
							$salaries[$value->student_id]['work_mins_30'] = $value->class_duration_in_mins;
						} 
					}else{
						
						if($classStatus == 4)
						{
							$salaries[$value->student_id]['work_mins_30'] += $value->class_duration_in_mins/2;
						}else{
							$salaries[$value->student_id]['work_mins_30'] += $value->class_duration_in_mins;
						} 
					} 
					
				}

				if (isset($salaries[$value->student_id]['work_mins_15'])) {

					$hour_15 = (float)$salaries[$value->student_id]['work_mins_15'] / 60;

					$salaries[$value->student_id]['work_hours_15'] = number_format($hour_15,4);
				}

				if (isset($salaries[$value->student_id]['work_mins_30'])) {
					$hour_30 = (float)$salaries[$value->student_id]['work_mins_30'] / 60;

					$salaries[$value->student_id]['work_hours_30'] = number_format($hour_30,4);
				}

				
					$salaries[$value->student_id]['salary_15'] = (float)$teacher_rate*(float)$salaries[$value->student_id]['work_hours_15'];
				
					$salaries[$value->student_id]['salary_30'] = (float)$teacher_rate*(float)$salaries[$value->student_id]['work_hours_30'];
				



			}
			

		}


		$data['salaries'] = $salaries;
		// print_r($data);
		// exit();
	


		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('salary/view_salary',$data);
		$this->load->view('footer',$data);
		
	}

}