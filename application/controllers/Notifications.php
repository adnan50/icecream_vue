<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends Ice_Controller {

	public $table = "notifications";

	public function __construct() {
		parent::__construct();
		$this->load->model("Notification_model","notification");
		$is_user_logged_in =  $this->is_user_logged_in();

		if (!$is_user_logged_in) {
			$redirect_url = base_url()."student/login";
			redirect($redirect_url);
		}

		$this->load->model("availability_model");
	}


	public function index(){

		$user_role = get_user_role();


		$data['title'] = $this->lang->line('notifications');

		$join['users su'] = "notifications.sender_id=su.id";
		$join['users ru'] = "notifications.receiver_id=ru.id";

		$where = array();

		if ($user_role != "admin") {
			
			$where['receiver_id'] = get_user_id();
			$or_where['sender_id'] = get_user_id();
			$data['notifications'] = $this->crud_model->get_data($this->table,$where,'',$join,'','*,su.full_name as sender_name,notifications.created as notify_time',$or_where,"","notify_id");

		}
		else
		{
			$data['notifications'] = $this->crud_model->get_data($this->table,$where,'',$join,'','*,su.full_name as sender_name,notifications.created as notify_time',"","","notify_id");

		}

		
		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('notifications/view_notifications',$data);
		$this->load->view('footer',$data);
		
	}

	public function manage_notification_view(){


		$user_role = get_user_role();

		if ($user_role == "admin" || $user_role == "student") {
			
			$data['title'] = "Notifications";

			$data['users'] = $this->crud_model->get_data("users", array('role !=' => "admin"));

			$teacher_where['role'] = "teacher";
			$data['teachers'] = $this->crud_model->get_data("users",$teacher_where);

			$student_where['role'] = "student";
			$data['students'] = $this->crud_model->get_data("users",$student_where);




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

		if ($user_role == "admin" || $user_role == "student") 
		{

			$data = $this->input->post();
			unset($data['files']);
		
			if(isset($data['userflag']) && !empty($data['userflag']) && empty($data['notify_id']))
			{
				unset($data['notify_id'],$data['userflag']);
				
				$data['notify_status'] = 1;
				$data['sender_id'] = get_user_id();
                
				$this->crud_model->add_data($this->table,$data);
				$msg =  "Your Query has been sent";
				$this->session->set_flashdata('success',$msg);

				redirect(base_url()."notifications");
				exit();
			}
	
			$notify_id = $data['notify_id'];
			

			if ($notify_id != "") 
			{
			
				unset($data['notify_id'],$data['userflag']);
				$where['notify_id'] = $notify_id;
				$this->crud_model->update_data($this->table,$where,$data);
				$msg =  "Notification has been Updated";
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();
				
			}

	
			if($data['receiver'] == 'public')
			{
				unset($data['notify_id']);
				$data['notify_status'] = 1;
				$data['sender_id'] = get_user_id();

				$this->crud_model->add_data($this->table,$data);
				$msg =  "New Notification has been sent";
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();
				
			}

			if($data['receiver'] == 'private')
			{
				unset($data['notify_id']);
				unset($data['receiver_id']);
				$all_users = $this->notification->get_users();

				foreach ($all_users as $user) 
				{
					$data['sender_id'] = get_user_id();
					$data['receiver_id'] = $user->id;
					$this->crud_model->add_data($this->table,$data);
				}

				$msg =  "New Notification has been sent";
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();

				
			}


			if($data['receiver'] == 'teachers')
			{
				unset($data['notify_id']);
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
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();
				
			}



			if($data['receiver'] == 'students')
			{
				unset($data['notify_id']);
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
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();
				
			}


			 if(is_numeric($data['receiver_id']))
			 {
			 	unset($data['notify_id']);
			 	$data['sender_id'] = get_user_id();
				$res  = $this->crud_model->add_data($this->table,$data);
				
				if (!$res)
				{

					$this->session->set_flashdata("error_message","Error while adding notification");
					redirect($_SERVER['HTTP_REFERER']);
				}
				$msg =  "New Notification has been send";
				$this->session->set_flashdata('success',$msg);

			redirect(base_url()."notifications");
			exit();
			 }

			

			
			

		}
		else
		{

			$this->load->view("page_404");
		}


	}
	public function uploadsummerfile(){
	    $res = $this->crud_model->upload_file($_FILES["file"],"file","assets/images/");
	    echo base_url()."assets/images/".$res;
	}


	function answer()
	{
	    
	   // print_r($_POST); die;
		$answer = $this->input->post('n_answer');
		$data = array("n_answer"=>$answer,
		"reply_date"=> date('Y-m-d'),
		"notify_id" => $this->input->post('notify_id'),
		"sender" => $this->input->post('sender'),
		"role" => $this->input->post('role'));
		
		$res = $this->crud_model->add_data('notifications_reply',$data);
		if($res)
		{
			$msg =  "Send";
			$this->session->set_flashdata('success',$msg);
		}
		else
		{
			$msg =  "Not Send";
			$this->session->set_flashdata('danger',$msg);
		}

		redirect($_SERVER['HTTP_REFERER']);

		
	}

	public function delete_notification(){

		$user_role = get_user_role();

		if ($user_role == "admin" || $user_role == "student") {

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
				
				$response['status'] = true;
		}else{

			$response['status'] = true;
		}	

		echo json_encode($response);
		exit();

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


	function public_notification()
	{
		$where['notify_status'] = 1;
		$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data($this->table,$where,"",$join);
		$this->load->view('home/faqq',$data);
		
	}


	function private_notification()
	{
		$login = is_user_logged_in();
		if($login)
		{
		$where['notify_status'] = 0;
		$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data($this->table,$where,"",$join);
		$this->load->view('home/faqq',$data);
	}
	else
	{
		
		$this->load->view('page_404');
	}
	}
}