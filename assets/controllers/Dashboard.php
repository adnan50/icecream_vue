<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Ice_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index()
	{

		$data['title'] = "Availabilty";

		$this->load->view('top',$data);
		$this->load->view('header',$data);
		$this->load->view('dashboard_view',$data);
		$this->load->view('footer',$data);
	}

	public function add_availability(){


		


		$date = $_POST['date'];
		$start_time =  date("H:i", strtotime($_POST['time']));
		$end_time =  date("H:i", strtotime($_POST['time'])+ 30*60);


		$start_date = $date."T".$start_time;
		$end_date = $date."T".$end_time;

		$exist_availability = $this->exist_availability($start_date,$end_date);



		if (!$exist_availability) {
			$data = array('start' => $start_date,'end'=>$end_date );
			$add_availability = $this->db->insert('availability', $data);



		}else{

			$data = array('error' => "You are already availabile at this time and date" );


		}

		echo json_encode($data);

	}



	public  function get_calendar_data(){

		$availability  = array();

		$result = $this->db->get('availability')->result();

		foreach ($result as $key => $value) {

			$data['event_id'] = $value->id;
			$data['color'] = "#92D050";
			$data['start'] = $value->start;
			$data['end'] = $value->end;

			array_push($availability, $data);
		}

		echo json_encode($availability);

	}

	public function exist_availability($start_date,$end_date){

		$query = "select id from availability where start = '".$start_date."' and end = '".$end_date."'";

		$result = $this->db->query($query)->result();

		if (empty($result)) {

			return false;
		}

		return true;
	}



	public function save_availability_calendar(){

		if (isset($_POST['events_remove'])) {
			$events_remove = $_POST['events_remove'];

			foreach ($events_remove as $key => $id) {
				$this->db->where('id', $id);
				$this->db->delete('availability');
			}
		}


		if (isset($_POST['add_events'])) {
			$add_events = $_POST['add_events'];
			foreach ($add_events as $key => $value) {
				unset($value['temp_id']);
				$this->db->insert("availability",$value);
			}

		}

		echo "Successfully change your availabilty";
	}


	public function language_set()
	{
		$language = $this->input->post('lang');
	
		$this->session->set_userdata("language",$language);
		$this->session->set_flashdata('success',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
