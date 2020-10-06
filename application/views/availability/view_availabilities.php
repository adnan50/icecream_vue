<template>
		<div>
		<?php
		$role = get_user_role();
		if ($role == "admin") {
		?>
			<div class="row">
				<div class="col-md-4"> 
					<div class="form-group">
					    <label for="Teachers">Teachers</label>
					   <select class="form-control select2 " id="teachers_availablility_select" style="border: 2px solid #000;">
						<option class="ml0">Select Teacher</option>
						<?php
					foreach ($teachers as $key => $value) {


						
						echo "<option value='".$value->id."'>".$value->full_name."</option>";
					}
					?>
					</select>
					  </div>


					<!-- <b>Teachers</b>
					<select class="form-control select2" id="teachers_availablility_select" style="border: 2px solid #000;">
						<option>Select Teacher</option>
						<?php
					foreach ($teachers as $key => $value) {


						
						echo "<option value='".$value->id."'>".$value->full_name."</option>";
					}
					?>
					</select> -->
				</div>
			</div>
		<?php
		} ?>
			<div id="teachers_availablility_calendar"></div>
			<div>
				<button class="btn btn-primary inc-width btn-lg" id="save_availability">
					<?php echo $this->lang->line('save'); ?>
				</button>
			</div>


	</div>
</template>
<script>
	export default {
    name: 'Header',

 data () {
      return {
        items: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard' },
          { title: 'Availability', icon: 'mdi-image' },
          { title: 'Tutors', icon: 'mdi-human-child' },
          { title: 'Students', icon: 'mdi-account' },
          { title: 'Lessons', icon: 'mdi-book-open-variant' },
          { title: 'Requests', icon: 'mdi-help-box' },
          { title: 'Tickets', icon: 'mdi-ticket' },
          { title: 'Notifications', icon: 'mdi-alarm-note' },
          { title: 'Salary', icon: 'mdi-cash' },
          { title: 'Support', icon: 'mdi-account-question' },
          { title: 'Booking for Student', icon: 'mdi-account-box' },

        ],
        right: null,
      }
    },
     
  }
</script>
