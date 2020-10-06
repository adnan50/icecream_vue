<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Ice_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->model('users_model');

		$is_user_logged_in =  $this->is_user_logged_in();

       if ($is_user_logged_in) {
       $redirect_url = base_url()."availability";
        
           redirect($redirect_url);
  }

	}

	function _remap($method){

		if (method_exists($this,$method)) {
			$this->$method();
		} else {
			$this->index($method);
		}


	}


	public function index($user_type){

        if($user_type == "student" || $user_type == "admin" || $user_type == "teacher")
        {
            $data['user_type'] = $user_type;
            $this->load->view('login/login',$data);
        }else
        {
             $this->load->view('404');
        }
		


	}


	public function add_user(){

		$data= $this->input->post();

      unset($data['submit']);
      $meta_data = $data['meta'];
      unset($data['meta']);

        $user_id = $this->users_model->register_user($data);
        if($user_id){
        $this->users_model->manage_user_meta($meta_data,$user_id);
        $msg =  "Thank you. You may now log-in.";
        $this->session->set_flashdata('success_login',$msg);
        redirect($_SERVER['HTTP_REFERER']);

        }
	}

	public function login_auth(){


		$data= $this->input->post();
        unset($data['submit']);


        $result = $this->users_model->login_user($data);
        // print_r($result); exit();

        if($result){

            if($result->user_status == 0)
            {
                $msg =  "Your Account Is Blocked";
                $this->session->set_flashdata('error',$msg);
                redirect($_SERVER['HTTP_REFERER']);
            }
   
            $this->session->set_userdata("user_session",$result);

            if ($result->role == "student") {
                $redirect_student = base_url()."schedule";
                redirect($redirect_student);

            }else{

            $redirect_url = base_url()."availability";
    
             redirect($redirect_url);
            }

            
        
        }else{

         $this->session->set_flashdata('error','Invalid Email or Password');
         $redirect_url = base_url().$data['user_type']."/login";
         redirect($redirect_url);

        }
		
	}



}