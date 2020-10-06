<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_booking extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("booking_model");
		$this->load->helper("custom");
		$is_user_logged_in =  $this->is_user_logged_in();

		if (!$is_user_logged_in) {
			$redirect_url = base_url()."student/login";
			redirect($redirect_url);
		}

		$this->load->model("availability_model");

	}

	function _remap($method){

		if (method_exists($this,$method)) {
			$this->$method();
		} else {
			$this->index($method);
		}


	}

	function manage($teacher_id="")
	{
		$data['teacher_id'] = $teacher_id;
		$data['teachers'] = $this->crud_model->get_data("users",array("role"=>"teacher"));
		$data['students'] = $this->crud_model->get_data("users",array("role"=>"student"));
		$data['title'] = "Booking For Student";

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('student_booking/index',$data);
		$this->load->view('footer',$data);
	}


}

?>