  <style type="text/css">
	.panel-group .panel+.panel {
     margin-top: 10px !important;
  
}
.panel-default{
-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.30) !important;
-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.30) !important;
 box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.30) !important;
     border-radius: 5px !important;
}
.panel-heading{
      border-radius: 5px !important;
}

.unread .panel-heading {
    background-color: #e2dede !important;
}
</style>
<div class="">

	<?php
	$user_role = get_user_role();

	?>
	<div class="row mb30">
		<div class="col-md-8 col-xs-7 pr0">
       
			<?php
			if (!empty($notifications)) {

        echo " <a class='btn btn-info btn-padding selectAll' href='#'>".$this->lang->line('select_all')."</a>";
        echo " <a class='btn btn-success btn-padding deselectAll' href='#'>".$this->lang->line('unckech_all')."</a>";
				
				echo "<a class='btn btn-danger btn-padding delete' href='#'>".$this->lang->line('mass_delete')."</a>";
			}
			?>
		
		</div>

		<?php
		if ($user_role == "admin" || $user_role == "student") {
			?>
			<div class="col-md-4 col-xs-5  text-right pl0">
				<a class='btn btn-success btn-padding' href='<?php echo base_url() ?>notifications/manage_notification_view'><?php echo $this->lang->line('add_notification'); ?></a>
			</div>
			<?php
		}

		?>
	</div>


 <?php if($this->session->flashdata('success'))
 { ?> 
   <script>
    $(document).ready(function(){
      toasterOptions();
      toastr.success("<?php echo $this->session->userdata('success'); ?>","<?php echo $this->lang->line('notifications'); ?>");


    });

  </script>
  <?php  
}
?>

	
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

 <?php

 if(empty($notifications))
 {
   ?>

   <div class="alert alert-danger">
    <strong>!</strong> <?php echo $this->lang->line('there_is_no_notofications'); ?>
  </div>

   <?php 
 }

 foreach ($notifications as $key => $value) { 





  ?>


  <div class="panel panel-default <?php  echo ($value->read_status == 0)?'unread':''; ?>">

    <div class="panel-heading" role="tab" id="headingTwo">
    	<div class="md-checkbox " style="float: left; margin-bottom: 4px;">
    		<input type="checkbox" name="notifications[]" id="checkbox<?php echo $value->notify_id; ?>" value="<?php echo $value->notify_id; ?>" class="md-check">
    		<label for="checkbox<?php echo $value->notify_id; ?>">
    			<span class="inc"></span>
    			<span class="check"></span>
    			<span class="box"></span>  
    		</label>
    	</div>
    	
      <div class="panel-title" data-toggle="collapse" data-notify-id = "<?php echo $value->notify_id;  ?>" data-parent="#accordion" href="#accordion<?php echo $value->notify_id; ?>"> 

      	                                                   
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"  aria-expanded="false" aria-controls="collapseTwo">

           <?php
            if($value->title == "Level Test Result")
            {
              echo $this->lang->line('level_test_result');
            }
            elseif($value->title == "Level Test Booking")
            {
              echo $this->lang->line('level_test_booking');
            }
            elseif($value->title == "Class Status Changed")
            {
              echo $this->lang->line('class_status_change');
            }
            elseif($value->title == "Class Booking")
            {
              echo $this->lang->line('class_booking');
            }
            elseif($value->title == "Ticket Issue")
            {
              echo $this->lang->line('ticket_issue');
            }
            elseif($value->title == "Payment status of booking")
            {
              echo $this->lang->line('payment_status_book');
            }
            else
            {
              echo $value->title;
            }

            // echo " (".$value->receiver.")";

            if($value->public_type == 1)
            {
              $pub_status = "Announcement";
            }
            elseif($value->public_type == 2)
            {
              $pub_status = "Faq";
            }
            elseif($value->public_type == 3)
            {
              $pub_status = "Q&A";
            }
            elseif($value->public_type == 4)
            {
              $pub_status = "Review";
            }
            else
            {
              $pub_status = "Notification";
            }



            ?>
        </a>
        <a class="float-right-md"><span class="label label-success"><?php echo $this->lang->line('date'); ?> :  <?php echo $value->notify_time ?> </span></a> <div style="float: right;"><span class="label label-success"><?php echo $pub_status; ?></span></div>
 
      </div>

    </div>

    <div id="accordion<?php echo $value->notify_id; ?>" class="panel-collapse collapse" role="tabpanel"  aria-labelledby="headingTwo">
      <div class="panel-body">
      	<div class="col-md-10">
         
      		<?php echo  $value->description; ?><br>
          <?php if(!empty( $value->n_answer)){ ?>
          <h5>Answer: </h5><br>
          <?php echo  $value->n_answer; } ?>
        <!--   
            <?php if ($user_role != "teacher") { ?>
          <div class="">
            <?php echo  "<h5 style='font-weight: bold'>".$this->lang->line('name')." : ".$value->full_name ."<br> ".$this->lang->line('email')." : ".$value->email."<br> ".$this->lang->line('contact_no')." : ".$value->contact_number ."<h5>"?>
          </div>
        <?php } ?> -->

	     </div>

      	<div class="col-md-2">
      		<center>
      		<?php
      			if ($user_role == "admin" || $value->sender_id == get_user_id()) {
					echo "&nbsp; <a class='btn btn-primary btn-sm' href='".base_url()."notifications/manage_notification_view?id=".$value->notify_id."'>Edit</a> &nbsp; <a href='".base_url()."notifications/delete_notification?id=".$value->notify_id."' class='btn btn-danger btn-sm delete-btn'>Delete</a>";
				} 
      		?>
      	</center>
      		<center style="margin-top: 20px;"><span class="label label-info"> <?php echo $this->lang->line('sender'); ?>:  <?php echo $value->sender_name ?> </span></center>

      	</div>

        
      </div>
    </div>

  </div>

<?php } ?>

</div>


</div>

<script type="text/javascript">
  $(document).ready(function() {

    $(".panel-title").on("click",function(){

       var notify_id = $(this).attr('data-notify-id');

        $.ajax({
              type: "POST",
              url: base_url+'notifications/read_notification',
              data:'id='+notify_id,
              dataType:'json',
              success: function(data)
              {
                
              }
            });
    });
  });
</script>
