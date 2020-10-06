<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("users_model");
		$this->load->model("Notification_model","notification");

	}



	public function index(){
   
		$data = [];
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}



		// $this->load->view("public/top",$data);
		 $this->load->view("home/header",$data);
		// $this->load->view("public/footer",$data);



	}

	public function format($value='')
	{
		$this->load->view("public/page");
	}


	public function notification($param="")
	{	
	    
		if($param=='reviews')
		{
		    $data['qa'] = "reviews";
			$where_notify['public_type'] = 4;
		}

		elseif($param=='announcements')
		{
			$where_notify['public_type'] = 1;
		}

		elseif($param=='qa')
		{
		    $data['qa'] = "student";
			$where_notify['public_type'] = 3;
		}

		else
		{
			$where_notify['public_type'] = 2;
		}
		
		if(!empty($_GET['notify_id'])){
            $where['notify_id'] = $_GET['notify_id'];
	        $data['notify_rec'] = $this->crud_model->get_data("notifications",$where,true);
		}
		
		
		$where_notify['notify_status'] = 1;
		//$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data("notifications",$where_notify);
		// $this->load->view("public/top",$data);
		$this->load->view('home/faq',$data);
		// $this->load->view("public/footer",$data);
	}

	public function faq(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}
		$where_notify['notify_status'] = 1;
		$where_notify['public_type'] = 2;
		$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data("notifications",$where_notify,"",$join);
	
		// $this->load->view("public/top",$data);
		$this->load->view('home/faq',$data);
		//$this->load->view("public/footer",$data);
	}


	public function QA(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}
		$where_notify['notify_status'] = 1;
		$where_notify['public_type'] = 3;
		$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data("notifications",$where_notify,"",$join);
	
		$this->load->view("public/top",$data);
		$this->load->view('home/faq',$data);
		$this->load->view("public/footer",$data);
	}


	public function announcement(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}
		$where_notify['notify_status'] = 1;
		$where_notify['public_type'] = 1;
		$join['users'] = "users.id = notifications.sender_id";
		$data['notifications'] = $this->crud_model->get_data("notifications",$where_notify,"",$join);
	
		$this->load->view("public/top",$data);
		$this->load->view('home/faq',$data);
		$this->load->view("public/footer",$data);
	}

	public function advertisement(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}

		$this->load->view("public/top",$data);
		//$this->load->view("public/header",$data);
		$this->load->view('home/advertisement.php');
		$this->load->view("public/footer",$data);
	}


		public function noticeboard(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}

		$this->load->view("public/top",$data);
		//$this->load->view("public/header",$data);
		$this->load->view('home/noticeboard.php');
		$this->load->view("public/footer",$data);
	}
	
		public function get_calendar_data(){
	    $this->load->model("availability_model");
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
	
	public function readstatus(){
	   $notyid = $this->input->post('id');
	   $where['notify_id'] = $notyid;
	   $user_meta = $this->crud_model->update_data_views('notifications', $where);
	   
	   echo json_decode($user_meta);
	   //echo $user_meta;
	   
	}


}