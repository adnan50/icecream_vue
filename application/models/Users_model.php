<?php

class Users_model extends CI_Model{

	public function __construct() {
		parent::__construct();

		$this->load->model("crud_model");

	}


	public function register_user($data){

		extract($data);
		$data_array = array(
			'full_name' => $fullname,
			'email' => $email,
			'password' => $password,
			'contact_number' => $contact_number,
			'role' => $user_type
		);

		$result=$this->db->insert('users', $data_array);
		return $this->db->insert_id();
	}


	public function login_user($data){
		extract($data);


		$query = $this->db->get_where('users', array('email' => $email,'password' => $password,'role' => $user_type));
		if($query->num_rows()>0){
			
			$response =  $query->row();
			

			return $response;

		}
		else{
			
			return false;

		}


	}

	public function is_username_available($username){

		$response=array();
		if($username!=''){
			$username=$this->test_input($username);
			$query="SELECT * FROM `users` WHERE username='$username' ";
			$result= $this->db->query($query);

			if($result->num_rows()>0){
				$response['error']='Not Available';
				return $response;
			}
			else{
				$response['success']='Username Available';
				return $response;

			}
		}

		else{
			$response['error'] = " username required";
			


		}

		
		return $response;


	}


	public function get_users($where = array()){

     $query = $this->db->get_where('users', $where)->result();

     return $query;
		
	}


	public function manage_user_meta($meta_data,$user_id){


		$where['user_id'] = $user_id;

		foreach ($meta_data as $key => $value) {
			
			$where['meta_key'] = $key;

			$res = $this->crud_model->get_data("usermeta",$where,true);

			$data['meta_key'] = $key;
			$data['meta_value']  = $value;
			$data['user_id'] = $user_id;


			if ($res) {

				$where_meta['umeta_id'] = $res->umeta_id;

				$res = $this->crud_model->update_data("usermeta",$where_meta,$data);

				
			}else{
	
				$res = $this->crud_model->add_data("usermeta",$data);


			}


		}


	}


	public function format_user_data ($user_data,$user_meta){


		foreach ($user_meta as $key => $value) {
			
			$user_data->{$value->meta_key} = $value->meta_value;
		}

		return $user_data;
	}


	public function get_user_meta($meta_key,$user_id){


		$this->db->where(array("meta_key"=>$meta_key,"user_id"=>$user_id));

		$this->db->from("usermeta");
		
		$res =  $this->db->get()->row();

		$value = "";

		if (isset($res->meta_value)) {
			$value = $res->meta_value;
		}

		return $value;

		
	}




}