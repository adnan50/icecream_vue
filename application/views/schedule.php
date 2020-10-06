
<div class="">

	<?php
	$role = get_user_role();  

	if ($role == "admin") {


		?>

		<div class="row">



			<div class="col-md-4">
				<b>Teachers</b>
				<select class="form-control users_schedule_select teacher select2" data-role="teacher">
					<option>Select Teacher</option>
					<?php
					foreach ($teachers as $key => $value) {

						echo "<option value='".$value->id."'>".$value->full_name."</option>";
					}
					?>
				</select>
			</div>	

			<div class="col-md-4">
				<b>Students</b>
				<select class="form-control users_schedule_select student select2" data-role="student" >
					<option>Select Student</option>
					<?php
					foreach ($students as $key => $value) {

						echo "<option value='".$value->id."'>".$value->full_name."</option>";
					}
					?>
				</select>
			</div>	


		</div>

		<?php
	}

	?>
	<br>

	<div class="row">
		<div class="col-md-12">
			<div id="schedule_calendar"></div>

		</div>

	</div>

</div>


<div>
	
</div>

<style type="text/css">
	.fc-day-header{
		cursor: pointer;
	}
</style>


<script type="text/javascript">

	$(document).ready(function(){



		var userID = "";

		var userRole = "";

		if ($('.users_schedule_select').length) {

			$(".users_schedule_select").change(function(){

				userID = $(this).val();
				userRole = $(this).attr("data-role");

			})
		}else{
			userID = "<?php echo get_user_id() ?>";

			userRole = "<?php echo get_user_role() ?>";
		}


		$(".fc-button").click(function(){

			fc_date_click();

		})

		function fc_date_click(){

			$("#schedule_calendar").find(".fc-day-header").click(function(){

				if (userID != "" && userRole != "") {
					var date = $(this).attr("data-date");

				window.location.href = base_url+"schedule/day_schedule/"+userID+"/"+userRole+"/"+date;
			}else{

				alert("No User Selected");
			}

				

			})

		}

		fc_date_click();
	})
</script>