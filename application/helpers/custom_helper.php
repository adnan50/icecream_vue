<?php

function get_user_role(){


	$ci = &get_instance();

	$user=$ci->session->userdata("user_session");
  if(!empty($user))
  {
    return $user->role;
  }
  else
  {
     return false;
  }

 

}



function get_user_id(){


	$ci = &get_instance();

	$user=$ci->session->userdata("user_session");

  return $user->id;

}

function get_user_name(){


  $ci = &get_instance();

  $user=$ci->session->userdata("user_session");

  return $user->full_name;

}

function is_user_logged_in(){

  $ci = &get_instance();

  if (!empty($ci->session->userdata('user_session'))) {

   return true;
 }
 return false;
}

function format_gender($key){

  if ($key == 1) {

    return "Male";
  }

  return "Female";
}    

function get_total_classes_bystatus($ticket_id,$status){

  $ci = &get_instance();

  $res =  $ci->crud_model->get_data("classes",array("ticket_id"=>$ticket_id,"class_status"=>$status));
  return count($res);
}

function get_class_status($status){

  switch ($status) {
    case '1':
    $class_status = "Teacher is Ready";
    break;
    case '2':
    $class_status = "Completed";
    break;
    case '3':
    $class_status = "Uncompleted";
    break;
    case '4':
    $class_status = "AbsentStudent";
    break;
    default:
    $class_status = "No Status";
    break;
  }

  return $class_status;
}

//junaid

function get_user_image(){


  $ci = &get_instance();
  $user=$ci->session->userdata("user_session");
  $user_id =  $user->id;
  $ci->load->model('crud_model');
  $where['user_id'] = $user_id;
  $where['meta_key'] = 'profile_image';
  $result = $ci->crud_model->get_data("usermeta",$where,true);
  if(!empty($result))
  {
      return $result->meta_value;
  }

  return "";


}

function get_status($status)
{
    if($status == 0)
    {
        $status_show = '<span class="label label-primary"> Open </span>';
        
    }
    if($status == 1)
    {
        $status_show = '<span class="label label-success"> Waiting For Reply </span>'; 
        
    }
    if($status == 2)
    {
        $status_show = '<span class="label label-warning"> Answered </span>';
          
    }
    if($status == 3)
    {
        $status_show = '<span class="label label-danger"> Close </span>';
       
    }

    return $status_show;
}


function all_languages()
{
  $ci = &get_instance();
  $ci->load->model('crud_model');
  $result = $ci->crud_model->get_data("language");
  if(!empty($result))
  {
      return $result;
  }

}


function get_ticket_memo($id){


  $ci = &get_instance();
  $ci->load->model('crud_model');
  $where['ticket_id'] = $id;
  $result = $ci->crud_model->get_data("memos",$where,true);
  if(!empty($result))
  {
      return $result;
  }

}

  // function get_classes_per_month($id)
  // {
  //   $ci = &get_instance();
  //   $ci->load->model('crud_model');
  //   $where['plan_id'] = $id;
  //   $result = $ci->crud_model->get_data("pricing_plans",$where,true);
  //   if(!empty($result))
  //   {
  //     return $result->classes_per_week;
  //   }
  // }

  // function get_student_plan($id)
  // {
  //   $ci = &get_instance();
  //   $ci->load->model('crud_model');
  //   $where['student_id'] = $id;
  //   $result = $ci->crud_model->get_data("tickets",$where,true);
  //   if(!empty($result))
  //   {
  //     return $result;
  //   }
  // }

   function get_user_role_via_id($id)
   {
     $ci = &get_instance();
     $ci->load->model('crud_model');
     $where["id"] = $id;
     $result = $ci->crud_model->get_data("users",$where,true);
     if(!empty($result))
     {
       return $result->role;
     }
   }



function check_review($id){


  $ci = &get_instance();
  $ci->load->model('crud_model');
  $where['notify_id'] = $id;
  $result = $ci->crud_model->get_data("notifications_reply",$where,true);
  if(!empty($result))
  {
      return $result;
  }
    
    
}
function get_author($id){


  $ci = &get_instance();
  $ci->load->model('crud_model');
  $where['id'] = $id;
  $result = $ci->crud_model->get_data("users",$where,true);
  if(!empty($result))
  {
      return $result;
  }
    
    
}

function get_replys_data($id){


  $ci = &get_instance();
  $ci->load->model('crud_model');
  $where['notify_id'] = $id;
  $result = $ci->crud_model->get_data("notifications_reply",$where);
  if(!empty($result))
  {
      return $result;
  }
    
    
}





