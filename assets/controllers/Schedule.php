<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("schedule_model");
		$this->load->model("users_model");
	}



	public function index(){

		$data['title'] = $this->lang->line('lessons');
		$data['teachers'] = $this->crud_model->get_data("users",array("role"=>"teacher"));
		$data['students'] = $this->crud_model->get_data("users",array("role"=>"student"));

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('schedule',$data);
		$this->load->view('footer',$data);
	}

	public function get_calendar_schedule(){

		$schedule = array();

		if (isset($_POST['user_id']) && $_POST['user_id'] != "") {
			
			$user_id = $_POST['user_id'];
		}else{

			$user_id = get_user_id();
		}


		if (isset($_POST['role']) && $_POST['role'] != "") {
			
			$role = $_POST['role'];
		}else{

			$role = get_user_role();
		}

		if ($role == "student") {

			$where['student_id'] = $user_id;

		}elseif ($role == "teacher"){

			$where['availability.available_user'] = $user_id;

		}


		$classes = $this->crud_model->get_data("classes",$where,'',array('availability'=>'availability.id=classes.availability_id'));

		foreach ($classes as $key => $value) {

			$data['event_id'] = $value->id;
			if ($value->ticket_id == "level_test") {
				$data['title'] = $this->lang->line('level_test');;
			}
			else
			{

				$data['title'] = $this->lang->line('class');;
			}

			if($value->class_status == 2)
			{
				$data['color'] = "#5092D0";
			}
			elseif($value->class_status == 3)
			{
				$data['color'] = "#864ede";
			}
			elseif($value->class_status == 4)
			{
				$data['color'] = "#ff0101";
			}else
			{
				$data['color'] = "#92D050";
			}
			
			$data['start'] = $value->start;
			$data['end'] = $value->end;

			array_push($schedule, $data);
		}


		echo json_encode($schedule);

	}


	public function day_schedule($user_id,$role,$date){

		$data['title'] = $this->lang->line('lessons');
		$data['user_id'] = $user_id;
		$data['role'] = $role;
		$data['date'] = $date;

		if ($role == "student") {

			$where['classes.student_id'] = $user_id;

		}elseif ($role == "teacher") {

			$where['availability.available_user'] = $user_id;
			
		}

		$join['availability'] = "availability.id=classes.availability_id";
		$join['users'] = "users.id=classes.student_id";

		$like['availability.start'] = $date;

		$data['classes'] = $this->crud_model->get_data("classes",$where,'',$join,$like);
		// echo $this->db->last_query();
		// exit();


		foreach ($data['classes'] as $key => $value) {
			if ($value->ticket_id != "level_test") {
				
			$tickets = $this->crud_model->get_data("tickets",array("ticket_id"=>$value->ticket_id),true,array("pricing_plans"=>"pricing_plans.plan_id=tickets.plan_id"));

			$value = (object) array_merge((array) $value, (array) $tickets);

			$level_test = $this->crud_model->get_data("level_test_result",array("student_id"=>$value->student_id),true);

			 $value->level_test = $level_test;
			}

			$where_meta['user_id'] = $value->student_id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['classes'][$key] = $this->users_model->format_user_data($value,$user_meta);


		}

		// echo "<pre>";
		// print_r($data['classes']);
		// die;
		

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('schedule/day_schedule',$data);
		$this->load->view('footer',$data);


	}

}