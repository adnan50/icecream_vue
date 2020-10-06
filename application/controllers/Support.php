<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends Ice_Controller {


	public $table = "message";

	public function __construct() {
		parent::__construct();

		$this->load->model("crud_model");
		$this->load->model("Support_model","message");
		$this->load->model("Reply_model","reply");
	}

	public function index(){



		$role = 'teacher';
		$user_id = get_user_id();
		$where['id'] = $user_id;

		$result = $this->crud_model->get_data('users',$where);

		$data['users'] = $result;

		$data['role'] = $role;

		$data['title'] = ucfirst($this->lang->line('contact_us'));

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('support/form',$data);
		$this->load->view('footer',$data);
		

	}

	public function manage_message()
	{
		$data = $this->input->post();
		$data['user_id'] = get_user_id();
		$message_file = $this->crud_model->upload_file($_FILES['image'],'image',MESSAGE_IMAGE_PATH);
		$data['image'] = $message_file;
		$insert = $this->crud_model->add_data($this->table,$data);
		if($insert)
		{
			$msg = "Thank you for submitting the query, we will soon update you .";
			$this->session->set_flashdata('success',$msg);
			redirect(base_url("support/open_all"));
		}
	}

	public function open_all()
	{
		
		$role = 'teacher';
		$user_id = get_user_id();
		$join['users'] = "users.id=message.user_id";
		$where['user_id'] = $user_id;
		$result = $this->crud_model->get_data($this->table,$where,"",$join);
		$data['messages'] = $result;
		$data['role'] = $role;
		$data['title'] = ucfirst($this->lang->line('all_queries'));

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('support/all_questions',$data);
		$this->load->view('footer',$data);
		
	}


	public function close_message()
	{
		$response = array();
		$id = $_POST['id'];
		$data = array('status'=>3);
		$where['m_id'] = $id;
		$result = $this->crud_model->update_data($this->table,$where,$data);
		if($result)
		{
			$response['status'] = TRUE;
			$response['message'] = "Status Changed";

		}
		echo json_encode($response);
		exit();
	}

	public function view_messages($id)
	{

		$role = 'teacher';

		$user_id = get_user_id();

		$data['role'] = $role;

		$where['m_id'] = $id;

		$result = $this->crud_model->get_data($this->table,$where,true);
		$reply = $this->crud_model->get_data('reply',$where,true);
		$title = $result->title;

		$data['messages'] = $result;
		$data['reply'] = $reply;

		$data['title'] = ucfirst($title);

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('support/view_message',$data);
		$this->load->view('footer',$data);



	}


	public function get_notification()
	{
		$user_role = get_user_role();

		if($user_role == "admin")
		{
			$join['users'] = "users.id=message.user_id";
	
		$result = $this->crud_model->get_data($this->table,"","",$join);
		$data['messages'] = $result;
		$data['title'] = ucfirst('All Queries');


		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('support/all_questions',$data);
		$this->load->view('footer',$data);
		}
		else
		{
			$this->load->view('page_404');
		}
	}


	public function reply()
	{
		$data = $this->input->post();
		$this->crud_model->add_data("reply",$data);
		$where['m_id'] = $data['m_id'];
		$data = array('status'=>2);
		$result = $this->crud_model->update_data($this->table,$where,$data);
		if($result)
		{
			$msg =  "Ticket Answered";
			$this->session->set_flashdata('success',$msg);
			redirect(base_url()."support/get_notification");
		}
	}

	
	public function mass_delete()
	{

		$data = $this->input->post("arr");

		$res =	$this->crud_model->delete_data($this->table,'m_id',true,$data);
			
		if ($res) {
				
				$response['success'] = true;
		}else{

			$response['error'] = true;
		}	

		echo json_encode($response);

	}


}

?>