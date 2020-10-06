<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("booking_model");

	}


	public function add_booking(){

		$is_user_logged_in =  $this->is_user_logged_in();

		$response = array();

		if (!$is_user_logged_in) {

			$response['error'] = $this->lang->line('your_payment_is_pending');

		}else{

			$action = $this->input->post("action");

			if ($action == "regular_class") {

				$current_date = date("Y-m-d");

				$ticket = $this->crud_model->get_data("tickets",array("student_id"=>get_user_id(),"end_date >"=>$current_date),true,array("pricing_plans"=>"pricing_plans.plan_id=tickets.plan_id"));

				$extra_classes = false;

				$events = json_decode($this->input->post("events"));

				if (empty($ticket)) {

					$response['error'] = $this->lang->line('your_payment_is_pending');

				}else{

					if ($current_date > $ticket->end_date || $ticket->remaining_classes <= 0 ) {
						
						if ($ticket->remaining_extra_classes <= 0) {

							$response['error'] =  $this->lang->line('your_ticket_expire');

						}elseif($ticket->remaining_extra_classes < count($events)){

							$response['error'] = $this->lang->line('your_ticket_is_expire')." {$ticket->remaining_extra_classes} ".$this->lang->line('extra_classes');


						}elseif($ticket->remaining_extra_classes >= count($events)){

							$extra_classes = true;

						}
					}

					if (!isset($response['error'])) {
						
						$weeks = array();

						for ($i=1; $i < 54; $i++) { 

							$weeks['week'.$i] = 0;
						}

						foreach ($events as $key => $value) {

							$ddate = $value->date;
							$date = new DateTime($ddate);
							$week = intval($date->format("W"));
							$weeks['week'.$week]++;
						}

						$prev_classes = $this->crud_model->get_data("classes",array("student_id"=>get_user_id()),'',array("availability"=>"availability.id=classes.availability_id"));

						foreach ($prev_classes as $key => $value) {

							$date_ar = explode("T", $value->start);
							$ddate = $date_ar[0];
							$date = new DateTime($ddate);
							$week = intval($date->format("W"));
							$weeks['week'.$week]++;
						}

						$classes_in_month = 12;

						foreach ($weeks as $key => $value) {

							if ($value >= $classes_in_month) {

								$response['error'] = $this->lang->line('you_are_not_allowed_to_take_more_than')." {$classes_in_month} ".$this->lang->line('classes_in_a_month');

							}
						}
					}


				}
				


				if (!isset($response['error'])) {

					foreach ($events as $key => $value) {
						
						$insert_data['student_id'] = get_user_id();
						$insert_data['ticket_id'] = $ticket->ticket_id;
						$insert_data['availability_id'] = $value->availability_id;

						$class_add = $this->crud_model->add_data("classes",$insert_data);

						if ($class_add) {
							
							$this->crud_model->update_data("availability",array("id"=>$value->availability_id),array("booked"=>1));

							$this->notify_booking($value->availability_id,'Class');


						}
					}

					if ($class_add) {

						if ($extra_classes) {

							$update_ticket['remaining_extra_classes'] = $ticket->remaining_extra_classes-=count($events);

						}else{

							$update_ticket['remaining_classes'] = $ticket->remaining_classes-=count($events);
						}
						

						$res = $this->crud_model->update_data("tickets",array("ticket_id"=>$ticket->ticket_id),$update_ticket);



					}

				}



			}else{

				$level_test = $this->crud_model->get_data("classes",array("student_id"=>get_user_id(),"ticket_id"=>"level_test"),true);

				if (empty($level_test)) {
					$data['availability_id'] = $_POST['events'];
					$data['student_id'] = get_user_id();
					$data['ticket_id'] = "level_test";

					$result = $this->crud_model->add_data("classes",$data);


					if ($result) {

						$this->crud_model->update_data("availability",array("id"=>$data['availability_id']),array("booked"=>1));

						$this->notify_booking($data['availability_id'],'Level Test');



						$response['success'] = true;
					}else{

						$response['error'] = $this->lang->line('error_while_adding_level_test');
					}
				}else{

					$response['error'] = $this->lang->line('cant_take_more_than_one');
				}


			}



		}


		echo json_encode($response);

	}


	public function confirm_booking(){

		$this->load->view("home/confirm_booking.php");
	}

	public function change_class_status(){

		$response = array();

		$status = $this->input->post("status");
		$class_id = $this->input->post("class_id");
		$memo = $this->input->post("memo");
		$student_id = $this->input->post("student_id");
		$now = Date("Y-m-d");

		$res = $this->crud_model->update_data("classes",array("class_id"=>$class_id),array("class_status"=>$status,"completed_date"=>$now));

		$where['student_id'] = $student_id;
		$check = $this->crud_model->get_data("memos",$where,true);
		if(empty($check))
		{
			$memo = $this->crud_model->add_data("memos",array("student_id"=>$student_id,'memo'=>$memo));
		}
		else
		{
			$memo = $this->crud_model->update_data("memos",array("student_id"=>$student_id),array("memo"=>$memo));
		}

		

		if ($res) {

			$class = $this->crud_model->get_data("classes",array("class_id"=>$class_id),true,array("availability"=>"availability.id=classes.availability_id"));

			$notify_data['sender_id'] = get_user_id();
			$notify_data['receiver_id'] = $class->student_id;
			$notify_data['title'] = "Class Status Changed";

			$start_arr = explode("T", $class->start);

			$class_status = get_class_status($status); 

			$notify_data['description'] = "Status of your class at <b>Date:</b> ".array_shift($start_arr)." and <b>Time:</b> ".array_shift($start_arr)." has been changed to {$class_status} ";

			$this->crud_model->add_data("notifications",$notify_data);

			$response['msg'] = "Successfully Updated";
		}else{
			$response['msg'] = "Error while Updating";
		}

		echo json_encode($response);
	}


	public function add_level_test_result($student_id,$class_id){


		$join['availability'] = "availability.id=classes.availability_id";
		$join['users su'] = "su.id=classes.student_id";
		$join['users tu'] = "tu.id=availability.available_user";

		$data['class_info'] = $this->crud_model->get_data("classes",array("class_id"=>$class_id),true,$join,'','*,su.full_name as student_name,tu.full_name as teacher_name,tu.id as teacher_id');


		$data['title'] = "Level Test Result";
		$data['class_id'] = $class_id;
		$data['student_id'] = $student_id;
		$data['teacher_id'] = $data['class_info']->teacher_id;


		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('booking/level_test_result',$data);
		$this->load->view('footer',$data);
	}

	public function record_level_test_result(){


		$class_status = $this->input->post("class_status");
		$class_id = $this->input->post("class_id");
		$reason_for_uncompleted = $this->input->post("reason_for_uncompleted");

		$update_data['class_status'] = $class_status;

		if ($class_status == 3) {
			$update_data['reason_for_uncompleted'] = $reason_for_uncompleted;
		}else{
			$update_data['reason_for_uncompleted'] = "";
		}

		$res = $this->crud_model->update_data("classes",array("class_id"=>$class_id),$update_data);
		
		if ($res && $class_status == 2) {
			$data = $this->input->post();

			unset($data['class_status']);
			unset($data['reason_for_uncompleted']);
		
			$res = $this->crud_model->add_data("level_test_result",$data);


			$data1['completed_date'] = Date("Y-m-d");
			$where['class_id'] = $class_id;
			$this->crud_model->update_data("classes",$where,$data1);

			if ($res) {
				
				$notify_data['sender_id'] = get_user_id();
				$notify_data['receiver_id'] = $data['student_id'];
				$notify_data['title'] = "Level Test Result";

				$notify_data['description'] = "Result for level test class has been published <a class='level_test_result' data-result_id='{$res}'>Click Here</a> to view your results";


				$this->crud_model->add_data("notifications",$notify_data);

				redirect(base_url()."schedule");
			}
		}	
	}

	public function get_level_test_result(){

		if ($_POST['result_id'] != "") {
			$join['users su'] = "su.id=level_test_result.student_id";
			$join['users tu'] = "tu.id=level_test_result.teacher_id";
			$join['classes'] = "classes.class_id=level_test_result.class_id";
			$join['availability'] = "availability.id=classes.availability_id";

			$data['result'] = $this->crud_model->get_data("level_test_result",array("result_id"=>$_POST['result_id']),true,$join,'','*,su.full_name as student_name,tu.full_name as teacher_name,level_test_result.created as result_date');

			$level_test_result = $this->load->view('booking/level_test_result_view',$data,true);
		}else{

			$level_test_result = "No Result Found";

		}

		

		echo $level_test_result;
	}

	public function view_level_test_result(){

		$data['title'] = $this->lang->line('result');

		$data['result'] = $this->crud_model->get_data("level_test_result",array("student_id"=>get_user_id()),true,'','','result_id');


		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('booking/view_result',$data);
		$this->load->view('footer',$data);
	}


	public function notify_booking($availability_id,$class){

		$availability = $this->crud_model->get_data("availability",array("availability.id"=>$availability_id),true,array("users"=>"users.id=availability.available_user"),'','*,users.id as teacher_id');

		$notify_data['sender_id'] = get_user_id();
		$notify_data['receiver_id'] = $availability->teacher_id;
		$notify_data['title'] = "{$class} Booking";

		$start_arr = explode("T", $availability->start);

		$start_date = array_shift($start_arr) . " " . array_shift($start_arr);

		$end_arr = explode("T", $availability->end);

		$end_date = array_shift($end_arr) . " " . array_shift($end_arr);

		$notify_data['description'] = "You have been booked by a student for a class. Class schedule is as follows: <br> <b>Start Date/Time:</b> {$start_date} <br> <b>End Date/Time:</b> {$end_date}";

		$this->crud_model->add_data("notifications",$notify_data);

	}


}