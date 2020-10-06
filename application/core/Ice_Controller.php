<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ice_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
    
        $this->load->helper('custom');
        if (!empty($this->session->userdata('user_session'))) 
        {
            $role = get_user_role();
            if($role == 'student')
            {

                $language = $this->session->userdata("language");
                if(!empty($language))
                {
                    $lang = $language;
                }
                else
                {
                    $lang = "korean";
                }
            }
            else
            {
                $lang = "english";
            }
        }
        else
        {
           $lang = "english";
        }

        $actual_link = "$_SERVER[REQUEST_URI]";
      
        if (strpos($actual_link, 'student/login') !== false) {
             $lang = "korean";
        }
         $this->lang->load("default", $lang);


    }


    public function is_user_logged_in(){

     if (!empty($this->session->userdata('user_session'))) {
           return true;
    }
    return false;
    }
}

