<?php

class Logout extends CI_Controller {


	function __construct() {
        parent::__construct();
        
    }

    public function logout(){




    	$redirect_url = base_url().get_user_role()."/login";        	
        $this->session->unset_userdata("user_session");
        $this->session->unset_userdata("language");
		redirect($redirect_url);


     }       
 
 }   