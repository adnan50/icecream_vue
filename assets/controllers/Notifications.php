<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends Ice_Controller {

	public $table = "notifications";

	public function __construct() {
		parent::__construct();
		$this->load->model("Notification_model","notification");
	}


	public function index(){

		$user_role = get_user_role();


		$data['title'] = $this->lang->line('notifications');

		$join['users su'] = "notifications.sender_id=su.id";
		$join['users ru'] = "notifications.receiver_id=ru.id";

		$where = array();

		if ($user_role != "admin") {
			
			$where['receiver_id'] = get_user_id();
		}

		$data['notifications'] = $this->crud_model->get_data($this->table,$where,'',$join,'','*,su.full_name as sender_name,notifications.created as notify_time',"","","notify_id");

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('notifications/view_notifications',$data);
		$this->load->view('footer',$data);
		
	}

	public function manage_notification_view(){


		$user_role = get_user_role();

		if ($user_role == "admin") {
			
			$data['title'] = "Notifications";

			$data['users'] = $this->crud_model->get_data("users", array('role !=' => "admin"));




			if ($this->input->get("id")) {

				$where['notify_id'] = $this->input->get("id");

				$data['notification'] = $this->crud_model->get_data($this->table,$where,true);


			}



			$this->load->view('top',$data);
			$this->load->view('header',$data);
			$this->load->view('notifications/manage_notification',$data);
			$this->load->view('footer',$data);
		}else{

			$this->load->view("page_404");
		}

	}

	public function manage_notification(){
		$user_role = get_user_role();

		if ($user_role == "admin") 
		{

			$data = $this->input->post();
			$notify_id = $data['notify_id'];
			if($data['receiver_id'] == 'private')
			{
				unset($data['receiver_id']);
				$all_users = $this->notification->get_users();
				foreach ($all_users as $user) 
				{
					$data['sender_id'] = get_user_id();
					$data['receiver_id'] = $user->id;
					$this->crud_model->add_data($this->table,$data);
				}

				$msg =  "New Notification has been sent";
				
			}

			elseif($data['receiver_id'] == 'allTeachers')
			{
				unset($data['receiver_id']);
				$where['role'] = "teacher";
				$all_teachers = $this->crud_model->get_data('users',$where);
				foreach ($all_teachers as $teacher) 
				{
					$data['sender_id'] = get_user_id();
					$data['receiver_id'] = $teacher->id;
					$this->crud_model->add_data($this->table,$data);
				}

				$msg =  "New Notification has been sent";
				
			}

			elseif($data['receiver_id'] == 'allStudents')
			{
				unset($data['receiver_id']);
				$where['role'] = "student";
				$all_students = $this->crud_model->get_data('users',$where);
				foreach ($all_students as $student) 
				{
					$data['sender_id'] = get_user_id();
					$data['receiver_id'] = $student->id;
					$this->crud_model->add_data($this->table,$data);
				}

				$msg =  "New Notification has been sent";
				
			}
			elseif($data['receiver_id'] == 'public')
			{
				unset($data['notify_id']);
				$data['notify_status'] = 1;
	
				$this->crud_model->add_data($this->table,$data);
				$msg =  "New Notification has been sent";
				
			}

			if ($notify_id != "") 
			{
			
				unset($data['notify_id']);
				$where['notify_id'] = $notify_id;
				$this->crud_model->update_data($this->table,$where,$data);
				$msg =  "Notification has been Updated";
				
			}
			else
			{
				$data['sender_id'] = get_user_id();
				$res  = $this->crud_model->add_data($this->table,$data);
				
				if (!$res)
				{

					$this->session->set_flashdata("error_message","Error while adding notification");
					redirect($_SERVER['HTTP_REFERER']);
				}
				$msg =  "New Notification has been send";

			}

			
			$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");

		}
		else
		{

			$this->load->view("page_404");
		}


	}


	public function delete_notification(){

		$user_role = get_user_role();

		if ($user_role == "admin") {

			$where['notify_id'] = $this->input->get("id");

			$result = $this->crud_model->delete_data($this->table,$where);

			if ($result) {

				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->load->view('page_404');
		}


	}

	public function view_single_notification($notify_id){

		$data['title'] = "Notifications";

		$join['users su'] = "notifications.sender_id=su.id";
		$join['users ru'] = "notifications.receiver_id=ru.id";

		$data['notify'] = $this->crud_model->get_data($this->table,array("notify_id"=>$notify_id),true,$join,'','*,su.full_name as sender_name,ru.full_name as receiver_name');


		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('notifications/single_notification',$data);
		$this->load->view('footer',$data);
	}


	public function mass_delete(){

		$data = $this->input->post("arr");

		$res =	$this->crud_model->delete_data($this->table,'notify_id',true,$data);
			
		if ($res) {
				
				$response['success'] = true;
		}else{

			$response['error'] = true;
		}	

		echo json_encode($response);

	}

	public function read_notification($value='')
	{
		$notify_id = $_POST['id'];

		$where['notify_id'] = $notify_id;
		$res =	$this->crud_model->get_data($this->table,$where,true);
			
		if ($res) {
				
			$status = $res->read_status;
			if($status == 0)
			{
				$this->crud_model->update_data($this->table,array("notify_id"=>$notify_id),array("read_status"=>1));
				$response['error'] = true;
			}

		echo json_encode($response);
		
	}
	exit();
	}
}