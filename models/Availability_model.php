<?php


class Availability_model extends CI_Model{

	public function __construct() {
		parent::__construct();

	}


	public  function get_availability($where = array()){

	

		$this->db->where($where);

		$result = $this->db->get('availability')->result();

		return $result;

	}




	public  function exist_availability($start,$end,$user_id){


		$query = "select id from availability where start = '".$start."' and end = '".$end."' and available_user = '".$user_id."'";

		$result = $this->db->query($query)->row();

		return $result;

	}


	public function delete_availability($id){

		$this->db->where('id', $id);
		$result  = $this->db->delete('availability');

		return $result;
	}


	public function add_availability($data){

		$result = $this->db->insert("availability",$data);

		return $result;
	}


}