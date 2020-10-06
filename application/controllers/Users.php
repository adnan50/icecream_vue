<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Ice_Controller {


	public $table = "users";

	public function __construct() {
		parent::__construct();

		$this->load->model("crud_model");
		$this->load->model("users_model");
		$this->load->library('image_lib');

	}

	function _remap($method,$param){

		if (method_exists($this,$method)) {
			$this->$method($param);
		} else {
			$this->index($method);
		}


	}



	public function index($role){

		$user_role = get_user_role();

		if ($user_role == "admin") {
			$where['role'] = $role;
			if($role == "student")
			{
				$join['tickets'] = 'tickets.student_id = users.id';
				$result = $this->crud_model->get_data($this->table,$where,"",$join);
			}
			else
			{
				$result = $this->crud_model->get_data($this->table,$where);
			}
		
			
			// echo $this->db->last_query();
			// exit();

			$data['users'] = $result;

			$data['role'] = $role;

			$data['title'] = ucfirst($role."s");

			$this->load->view('top',$data);
			$this->load->view('header',$data);
			$this->load->view('users/view_users',$data);
			$this->load->view('footer',$data);
		}
		else{
			$this->load->view('	');
		}

	

	}

	//junaid start

	public function dashboards(){

		$user_role = get_user_role();

		if ($user_role == "admin") 
		{
			redirect("availability/");
		}
		elseif($user_role == "teacher") 
		{
			redirect("availability/");
		}
		elseif($user_role == "student") 
		{
			redirect("schedule/");
		}

	}

	// end


	public function delete_user(){
		$response = array();

		$user_role = get_user_role();

		if ($user_role == "admin") {

		$this->db->trans_start();
	
		$del_user_role = get_user_role_via_id($this->input->get("id"));
		if($del_user_role == "student")
		{
			$booked_plans_where['student_id'] = $this->input->get("id");
			$this->crud_model->delete_data("booked_plans",$booked_plans_where);

			$level_test_where['student_id'] = $this->input->get("id");
			$this->crud_model->delete_data("level_test_result",$level_test_where);

			$tickets_where['student_id'] = $this->input->get("id");
			$this->crud_model->delete_data("tickets",$tickets_where);

		}
		if($del_user_role == "teacher")
		{
			$level_test_where['teacher_id'] = $this->input->get("id");
			$this->crud_model->delete_data("level_test_result",$level_test_where);

			$availability_where['available_user'] = $this->input->get("id");
			$this->crud_model->delete_data("availability",$availability_where); 
		}

	

		$message_where['user_id'] = $this->input->get("id");
		$this->crud_model->delete_data("message",$message_where);

		$notifications_where['sender_id'] = $this->input->get("id");
		$this->crud_model->delete_data("notifications",$notifications_where);

		$usermeta_where['user_id'] = $this->input->get("id");
		$this->crud_model->delete_data("usermeta",$usermeta_where);

		

		$where['id'] = $this->input->get("id");
		$this->crud_model->delete_data($this->table,$where);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->load->view('page_404');
		}else{

			$response['status'] = true;
			echo json_encode($response);
		}
		


	}
}



	public function manage_user()
	{


		$user_role = get_user_role();

		$user_id = get_user_id();

		$data = $this->input->post();

		unset($data['c_password']);
	
	// print_r($data);
	// 	exit();

		$access = false;

		if (!empty($data)) 
		{

			$access = true;

		}
		elseif ($user_role == "admin" || $user_id == $data['id']   ) 
		{

			$access = true;
		}

		if ($access) 
		{

			$data = $this->input->post();
			$role = $data['role'];	

			$meta_data = $data['meta'];
			unset($data['meta']);

			if(!empty($_FILES)){
			$profile_image = $this->crud_model->upload_file($_FILES['profile_image'],'profile_image',PROFILE_IMAGE_UPLOAD_PATH);
			}

			if (@$profile_image) 
			{

				$meta_data['profile_image'] = $profile_image;

			}
			elseif ($data['old_profile_image'] != "") 
			{

				$meta_data['profile_image'] = $data['old_profile_image'];
			}

			unset($data['old_profile_image']);
			if ($user_role == "admin") {

	
			$profile_video = $data['profile_video'];
			if ($data['profile_video'] != "") 
			{

				$meta_data['profile_video'] = $profile_video;

			}
			else
			{
				$meta_data['profile_video'] = $data['old_profile_video'];
			}
		}

			unset($data['profile_video']);
			unset($data['old_profile_video']);

	
	
			if ($data['id'] != "") 
			{
				$where['id'] = $data['id'];
				$user_id = $data['id'];
				unset($data['id']);
				unset($data['role']);
				unset($data['c_password']);

				$result = $this->crud_model->update_data($this->table,$where,$data);
				$this->users_model->manage_user_meta($meta_data,$user_id);
				
				redirect($_SERVER['HTTP_REFERER']);

			}
			else
			{

				unset($data['id']);

				$msg = " Profile Created ";
				unset($data['c_password']);
				$user_id = $this->crud_model->add_data($this->table,$data);
				$this->users_model->manage_user_meta($meta_data,$user_id);
			}


			

	
			$this->session->set_flashdata('success',$msg);
			redirect(base_url("users/").$data['role']);

			
		}
		else
		{

			$this->load->view("page_404");
		}

	}


	public function manage_user_view($role){

		$user_role = get_user_role();

		$user_id = get_user_id();



		if ($user_role == "admin" || $user_id == $this->input->get("id")  ) {
			
		$role = $role[0];

		$data['role'] = $role;
		if($role == "student")
		{
			$title = $this->lang->line('students');
		}
		else
		{
			$title = $role."s";
		}

		$data['title'] = ucfirst($title);

		if ($this->input->get("id")) {

			$where['id'] = $this->input->get("id");

			$user_data = $this->crud_model->get_data($this->table,$where,true);

			$where_meta['user_id'] = $this->input->get("id");

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['user'] = $this->users_model->format_user_data($user_data,$user_meta);

			
		}
		

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('users/manage_user',$data);
		$this->load->view('footer',$data);
		}else{

			$this->load->view("page_404");
		}


	}

	public function manage_status()
	{

		$response = array();
		$id = $_POST['id'];
		$status = $_POST['status'];
		$data = array('user_status'=>$status);
		$where['id'] = $id;
		$result = $this->crud_model->update_data($this->table,$where,$data);
		if($result)
		{
			$response['status'] = TRUE;
		}
		echo json_encode($response);
		exit();
	}

	public function mass_delete()
	{

		$data = $this->input->post("arr");

		$res =	$this->crud_model->delete_data($this->table,'id',true,$data);
			
		if ($res) {
				$this->crud_model->delete_data("usermeta",'user_id',true,$data);
				$response['status'] = true;
		}else{

			$response['status'] = false;
		}	

		echo json_encode($response);

	}



	public function image_upload()
	{
		$response = array();
		$response['status'] = false;
		if(!empty($_FILES))
		{
			$fileName = $_FILES['file']['name'];
			$tmp_name = $_FILES['file']['tmp_name'];
			$file_name = date('dmYHisu');
			$file_parts=explode(".", $fileName);
			$extension = end($file_parts);
			$full_filename = $file_name.uniqid().'.'.$extension;
			$img =  move_uploaded_file($tmp_name,PROFILE_VIDEO_UPLOAD_PATH.$full_filename);
			if($img)
			{
				$response['status'] = true;
				$response['data']=  $full_filename;
				
			}
			
		}
		echo json_encode($response);
		exit;

	}


	public function delete_image()
	{
		$response = array();

		$file = $_POST['name'];
		$path_to_file = PROFILE_VIDEO_UPLOAD_PATH.$file;
		if(unlink($path_to_file)) {
			$response['status'] = true;
			$response['message']='deleted successfully';
		}
		else {
			$response['status'] = false;
			$response['message']='errors occured';
		}

		echo json_encode($response);
		exit;
	}

public function get_project_images(){

    $where_meta['user_id'] = $_GET['user'];
	$user_meta = $this->crud_model->get_data('usermeta',$where_meta);
    echo json_encode($user_meta);
    exit();
 
    
}










}

?>