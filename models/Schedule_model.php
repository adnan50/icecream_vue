<?php


class Schedule_model extends CI_Model{

	public function __construct() {
		parent::__construct();

	}





	public function get_user_schedule($where){

		$this->db->select("*");
		$this->db->from("booking b");
		$this->db->join("availability a","a.id=b.availability_id");
		$this->db->where($where);

		$res = $this->db->get()->result();

		return $res;

	}





}



?>