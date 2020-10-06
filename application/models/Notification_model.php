<?php

class Notification_model extends CI_Model{

	public function __construct() {
		parent::__construct();

	}


	public function get_users()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("role !=","admin");
		$res = $this->db->get()->result();
		return $res;
	}

	


}


?>