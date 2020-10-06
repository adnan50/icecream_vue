<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends Ice_Controller {

	public $table = "pricing_plans";

	public function __construct() {
		parent::__construct();

		// $is_user_logged_in =  $this->is_user_logged_in();

		// if (!$is_user_logged_in) {
		// 	$redirect_url = base_url()."Login";
		// 	redirect($redirect_url);
		// }

	}


	public function book_plan_ajax(){

		$response = array();

		$is_user_logged_in =  $this->is_user_logged_in();

		if (!$is_user_logged_in) {

			$response['error'] =  "login_error";

		}else{

			$data['plan_id'] = $_POST['plan_id'];
			$data['student_id'] = get_user_id();

			$res = $this->crud_model->add_data("booked_plans",$data);

			if ($res) {
				$response['success'] =  true;
			}else{
				$response['error'] =  "booking_error";
			}


		}


		echo json_encode($response);

	}


	public function view_booking_requests(){

		$user_role = get_user_role();
		$data['title'] = $this->lang->line('requests');


		$where = array();
		if ($user_role == "student"){

			$where['booked_plans.student_id'] = get_user_id();

		}
		$join['users'] = "users.id=booked_plans.student_id";
		$join['pricing_plans'] = "pricing_plans.plan_id=booked_plans.plan_id";
		$data['booking_requests'] = $this->crud_model->get_data("booked_plans",$where,false,$join);

		$data['user_role'] = $user_role;



		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('booking/view_booking',$data);
		$this->load->view('footer',$data);

		


	}


	public function change_booking_status($payment_status){

		$user_role = get_user_role();

		if ($user_role == "admin" || $user_role == "student" ){

			$data['payment_status'] = $payment_status;
			$where['booking_id'] = $this->input->get("id");

			$res = $this->crud_model->update_data('booked_plans',$where,$data);

			if ($res) {
				
				$booking = $this->crud_model->get_data("booked_plans",$where,true,array("pricing_plans"=>"booked_plans.plan_id=pricing_plans.plan_id"));

				if ($payment_status == 2) {

					$notify_data['sender_id'] = get_user_id();

					$notify_data['title'] = "Payment Verification Request";


					$notify_data['description'] = get_user_name()." has requested for payment verification against package {$booking->plan_name}";

					$admins = $this->crud_model->get_data("users",array("role"=>"admin"));

					foreach ($admins as $key => $value) {
						$notify_data['receiver_id'] = $value->id;

						$this->crud_model->add_data("notifications",$notify_data);
					}
					
				}else{

					$notify_data['sender_id'] = get_user_id();
					$notify_data['receiver_id'] = $booking->student_id;
					$notify_data['title'] = "Payment status of booking";

					if ($payment_status == 0) {

						$payment_status = "disaproved";

					}else{

						$payment_status = "aproved";
					}

					$notify_data['description'] = "Your Payment status has been {$payment_status} for package {$booking->plan_name}";

					$this->crud_model->add_data("notifications",$notify_data);

				}

				


			}

			

			redirect($_SERVER['HTTP_REFERER']);


		}else{

			$this->load->view("page_404");
		}


	}






}