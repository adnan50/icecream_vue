<?php

class Users extends CI_Model{

	public function __construct() {
		parent::__construct();

	}


	public function register_user($data){

		extract($data);
		$data_array = array(
			'full_name' => $fullname,
			'username' => $username_r,
			'email' => $email,
			'password' => $password,
			'contact_number' => $contact_number,
			'role' => $user_type
		);

		$result=$this->db->insert('users', $data_array);
		if($result){
			return true;
		}
		else{
			return false;
		}
	}


	public function login_user($data){
		extract($data);


		$query = $this->db->get_where('users', array('username' => $username,'password' => $password,'role' => $user_type));
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




}