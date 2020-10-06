<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends Ice_Controller {


	public $table = "tickets";

	public function __construct() {
		parent::__construct();

		// $is_user_logged_in =  $this->is_user_logged_in();

		// if (!$is_user_logged_in) {
		// 	$redirect_url = base_url()."Login";
		// 	redirect($redirect_url);
		// }

	}


	public function index(){


		$user_role = get_user_role();

		if ($user_role == "admin") {
			
			$data['title'] = "Tickets";


			$join['users'] = "tickets.student_id=users.id";

			$join['pricing_plans'] = "tickets.plan_id=pricing_plans.plan_id";


			$data['tickets'] = $this->crud_model->get_data($this->table,'','',$join);



			$this->load->view('top',$data);
			$this->load->view('header',$data);
			$this->load->view('tickets/view_tickets',$data);
			$this->load->view('footer',$data);
		}else{

			$this->load->view("page_404");
		}

	}

	public function delete_ticket(){

		$response = array();
		$user_role = get_user_role();

		if ($user_role == "admin") {

			$where['ticket_id'] = $this->input->get("id");

			$result = $this->crud_model->delete_data($this->table,$where);

			if ($result) {

			$response['status'] = true;
			echo json_encode($response);

				//redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->load->view('page_404');
		}


	}


	public function manage_ticket(){
		$user_role = get_user_role();

		if ($user_role == "admin") {

			$data = $this->input->post();

			$ticket_id = $data['ticket_id'];

			unset($data['ticket_id']);

			if ($ticket_id != "") {

				$where['ticket_id'] = $ticket_id;


				$ticket = $this->crud_model->get_data($this->table,$where,true);

				$remaining_extra_classes = $ticket->remaining_extra_classes;

				$remaining_extra_classes += $data['extra_classes']-$ticket->extra_classes;

				$data['remaining_extra_classes'] = $remaining_extra_classes;


				$this->crud_model->update_data($this->table,$where,$data);
				
			}else{

				$current_date = date("Y-m-d");

				$student_ticket = $this->crud_model->get_data("tickets",array("student_id"=>$data['student_id'],"end_date >"=>$current_date),true);


				if (empty($student_ticket)) {
					$data['remaining_extra_classes'] = $data['extra_classes'];

					$plan = $this->crud_model->get_data("pricing_plans",array("plan_id"=>$data['plan_id']),true);

					$data['remaining_classes'] = $plan->total_classes;
					$data['start_date'] = date("Y-m-d");
					$data['end_date'] = date('Y-m-d', strtotime("+{$plan->duration_in_months} months", strtotime($data['start_date'])));

					$res = $this->crud_model->add_data($this->table,$data);

					if ($res) {
						$notify_data['sender_id'] = get_user_id();
						$notify_data['receiver_id'] = $data['student_id'];
						$notify_data['title'] = "Ticket Issue";
						$notify_data['description'] = "You have been assigned a ticket with ticket no. {$data['ticket_number']} for package {$plan->plan_name} with {$data['extra_classes']} extra classes";

						$this->crud_model->add_data("notifications",$notify_data);
					}

				}else{

					$this->session->set_flashdata("error_message","Ticket not created, This user already have a ticket");

					redirect($_SERVER['HTTP_REFERER']);
				}

			}


			redirect(base_url()."tickets");

		}else{

			$this->load->view("page_404");
		}


	}


	public function manage_ticket_view(){


		$user_role = get_user_role();

		if ($user_role == "admin") {
			
			$data['title'] = "Tickets";

			$data['plans'] = $this->crud_model->get_data("pricing_plans");

			$data['students'] = $this->crud_model->get_data("users", array('role' => "student"));

			if ($this->input->get("id")) {

				$where['ticket_id'] = $this->input->get("id");

				$data['ticket'] = $this->crud_model->get_data($this->table,$where,true);


			}



			$this->load->view('top',$data);
			$this->load->view('header',$data);
			$this->load->view('tickets/manage_ticket',$data);
			$this->load->view('footer',$data);
		}else{

			$this->load->view("page_404");
		}

	}

	public function mass_delete()
	{

		$data = $this->input->post("arr");

		$res =	$this->crud_model->delete_data($this->table,'ticket_id',true,$data);
			
		if ($res) {
				
				$response['success'] = true;
		}else{

			$response['error'] = true;
		}	

		echo json_encode($response);

	}



}