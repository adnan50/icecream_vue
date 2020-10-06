<style type="text/css">
.mg5{
	margin: 5px 0px;
}
.pl23{
	padding-left: 23px;
}
.class_report_btn{
	margin-top: 12px !important;
}
</style>
<div>
	
	<table class="table datatable">
		<thead> 
			<tr>
				<th><?php echo $this->lang->line('lesson_detail'); ?></th>
				<th><?php echo $this->lang->line('status'); ?></th>
				<th><?php echo $this->lang->line('report'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$table = "";
			$user_role = get_user_role();

			foreach ($classes as $key => $value) { ?>

				<input type="hidden" id="ticket_id" value="<?php echo $value->ticket_id ?>"> 

			<?php
		
				$start = explode("T", $value->start);

				// print_r($start);

				$start_date = $start[1];
				$format = date_create($start_date);
 				$formatted_date = date_format($format,'H:i');

 			
 					
 				
 			


 			// 	echo $formatted_date;

				// echo "</pre>";


				$table .=  "<tr>";

				$table .= "<td><div class='row mg5'><div class='col-md-12'><b>".$this->lang->line('lesson_time').": </b>";



				$table .= $formatted_date;

				if ($value->ticket_id != "level_test") {

					$table .= " (".$value->class_duration_in_mins."min)";
				}

				$table .= "</div></div>
				<div class='row mg5'>".$this->lang->line('teacher_name').": ".$value->teacher_full_name."</div>
				<div class='row mg5'><div class='col-md-12'><b>".$this->lang->line('student_bio').": </b>

				<div class='row mg5'>".$this->lang->line('name').": ".$value->full_name."</div>
				<div class='row mg5'>".$this->lang->line('gender').": ".format_gender($value->gender)."</div>

				<div class='row mg5'>".$this->lang->line('zoom_id').": ".$value->skype_id."</div>
				<div class='row mg5'>".$this->lang->line('mobile_number').": ".$value->contact_number."</div>";

				// if (isset($value->level_test) && $value->level_test != "") {
					
				// 	$table .= "<div class='row mg5'><button type='button' class='btn btn-success level_test_result' data-result_id='".$value->level_test->result_id."'>".$this->lang->line('level_test_result')."</button></div>";
				// }

				$table .= "</div></div>

				</td>";
				$table .= "<td>";

				if ($value->ticket_id != "level_test") {

					$completed_classes = get_total_classes_bystatus($value->ticket_id,"2");
					$uncompleted_classes = get_total_classes_bystatus($value->ticket_id,"3");
					$studentAbsent = get_total_classes_bystatus($value->ticket_id,"4");

					$table .= "<div class='row mg5'><b>".$this->lang->line('ticket_details')."</b></div>";
					$table .= "<div class='row mg5'>".$this->lang->line('start_date').": ".$value->start_date."</div>";
					$table .= "<div class='row mg5'>".$this->lang->line('end_date').": ".$value->end_date."</div>";
					

					$table .= "<div class='row mg5'>".$this->lang->line('completed').": ".$completed_classes."/".$value->total_classes."</div>";


					$table .= "<div class='row mg5'>".$this->lang->line('incompleted').": ".$uncompleted_classes."</div>";

					$table .= "<div class='row mg5'>".$this->lang->line('student_pospond').": </div>";
					$table .= "<div class='row mg5'>".$this->lang->line('student_absent').": ".$studentAbsent."</div>";
					
					


				}else{

					$table .= "<div class='row mg5'><b>".$this->lang->line('ticket_details')."</b></div>";

					$table .= "<div class='row mg5'>".$this->lang->line('start_date').": ".array_pop($start)."</div>";
					$end = explode("T", $value->end);
					$table .= "<div class='row mg5'>".$this->lang->line('end_date').": ".array_shift($end)."</div>";


				}

				$table .= "</td>";
				$table .= "<td>";

				if ($value->ticket_id != "level_test") {
						if ($user_role != "student") {
					$table .= "<div class='row mg5'>
					<select class='class_report'>
					<option ".($value->class_status == 0 ? 'selected' : '')." value='0'></option>
					<option  ".($value->class_status == 2 ? 'selected' : '')."  value='2'>".$this->lang->line('completed')."</option>
					<option  ".($value->class_status == 4 ? 'selected' : '')."  value='4'>".$this->lang->line('student_was_absent')."</option>
					<option  ".($value->class_status == 6 ? 'selected' : '')."  value='6'>".$this->lang->line('teacher_was_absent')."</option>
					
					
					<option  ".($value->class_status == 5 ? 'selected' : '')."  value='5'>".$this->lang->line('postpond_by_student')."</option>
					
					<option  ".($value->class_status == 7 ? 'selected' : '')."  value='7'>".$this->lang->line('postpone_by_teacher')."</option>
					<option  ".($value->class_status == 8 ? 'selected' : '')."  value='8'>".$this->lang->line('holiday')."</option>
					<option  ".($value->class_status == 3 ? 'selected' : '')."  value='3'>".$this->lang->line('incompleted')."</option>
				
					</select></div>";

					


					$table .= "<div class='row mg5 scroll'>
								</div><div class='row mg5' >

								<textarea class='form-control col-md-12' name='memo' rows='5'>";
									$memos = get_ticket_memo($value->ticket_id);
							if(!empty($memos))
							{
								$table.= $memos->memo;
							}	
					$table .= "</textarea>";

						
						$table .= "<button class='btn btn-primary class_report_btn' data-classID='".$value->class_id."' data-ticketID = '".$value->ticket_id."' >".$this->lang->line('submit')."</button></div >";
					}else if($user_role == "student"){
						$memos = get_ticket_memo($value->ticket_id);
					
					$table .= "<div class='row mg5 scroll'>
								</div><div class='row mg5' >Lesson Notes</div>
								<textarea class='form-control col-md-12' name='memo' rows='5'>";
							if(!empty($memos))
							{
								$table.= $memos->memo;
							}	
					$table .= "</textarea>";

					}




					
				}else{


					$table .= "<div class='row mg5'>Level Test Reservation</div>";

					$level_test = $this->crud_model->get_data("level_test_result",array("class_id"=>$value->class_id),true);

					

					if (!empty($level_test)) {
						$table .= "<div class='row mg5'><button type='button' class='btn btn-success level_test_result' data-result_id='".$level_test->result_id."'>".$this->lang->line('level_test_result')."</button></div>";

					}elseif($user_role != "student"){

						$table .= "<div class='row mg5 pl23'><a class='btn btn-primary' href='".base_url()."booking/add_level_test_result/".$value->student_id."/".$value->class_id."'>".$this->lang->line('report')."</a></div>";
					}
					

				}

				$table ."</td>";

				$table .= "</tr>";




			}
			echo $table;

			?>
		</tbody>
	</table>

</div>



<script type="text/javascript">
	$(document).ready(function(){

		let class_status = "";
		let memo = "";
		class_status = $(".class_report").val();
		memo = $("[name='memo']").val();

		$(".class_report").change(function(){
			class_status = $(this).val();
		})

		$("[name='memo']").keyup(function(){
			memo = $(this).val();
		})

		$(".class_report_btn").click(function(){

			var class_id = $(this).attr("data-classID");
			var ticket_id = $(this).attr("data-ticketID");

			$.ajax({

				url: base_url+"booking/change_class_status",
				data:{
					status: class_status,
					class_id: class_id,
					ticket_id : ticket_id,
					memo:memo
				},
				type: "post",
				success:function(res){

					res = JSON.parse(res);

					alert(res.msg);
					location.reload();
				}
			})
		})

	

	})
</script>
