<?php

class Booking_model extends CI_Model{

	public function __construct() {
		parent::__construct();

	}


	public function add_booking($data){

		$result = $this->db->insert("booking",$data);

		return $result;


	}


	public function get_booking($where){

		$this->db->where($where);

		$result = $this->db->get("booking")->result;

		return $result;
	}


	


}


?>