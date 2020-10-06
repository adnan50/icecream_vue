<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Ice_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("users_model");

	}



	public function index(){


		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}


		$this->load->view("public/top",$data);
		$this->load->view("home/header",$data);
		$this->load->view("public/footer",$data);



	}

	public function format($value='')
	{
		$this->load->view("public/page");
	}
	public function faq(){
		$where['role'] = "teacher";

		$user_data = $this->crud_model->get_data("users",$where);

		foreach ($user_data as $key => $value) {

			$where_meta['user_id'] = $value->id;

			$user_meta = $this->crud_model->get_data('usermeta',$where_meta);

			$data['teachers'][] = $this->users_model->format_user_data($value,$user_meta);

		}

		$this->load->view("public/top",$data);
		$this->load->view("public/header",$data);
		$this->load->view('home/faqq.php');
		$this->load->view("public/footer",$data);
	}

}