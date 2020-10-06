<style type="text/css">
.form-control{
	margin: 10px;
}

</style>

  <?php
  if (isset($ticket) && !empty($ticket)) {
    ?>
    <script type="text/javascript">


      $(document).ready(function(){

      	$(".student_id").attr("disabled",true);
      	$(".plan_id").attr("disabled",true);
      	
        <?php
        foreach ($ticket as $key => $value) {

         ?>
         var key = "<?php echo $key ?>";
    

          $("."+key+"").val("<?php echo $value ?>");

          <?php
      }

      ?>
    });
  </script>
  <?php
}

?>


<div class="row div-center">
	<?php

	if ($this->session->flashdata("error_message") != "") {
		?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata("error_message"); ?>
		</div>

		<?php
	}

	?>


	<div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
		
		<form method="POST" action="<?php echo base_url() ?>tickets/manage_ticket">

  		<div class="form-group row">
		    <label for="Ticket-No" class=" col-sm-4 col-form-label">Ticket No.</label>
		    <div class=" col-sm-8">
		     <?php
							$ticket_number =  "ITO".random_string('alnum', 12);
							?>
							<input class="form-control ticket_number m0" disabled="" type="text" value="<?php echo (isset($ticket_number)? $ticket_number : ''); ?>"> 

							<input type="hidden" class="ticket_number m0" name="ticket_number" value="<?php echo (isset($ticket_number)? $ticket_number : ''); ?>">
		    </div>
 		 </div>
 


			<div class="form-group row">
				<label class=" col-sm-4 control-label">Select Package
				</label>
				<div class=" col-sm-8">

					<select name="plan_id" class="form-control plan_id m0">
						<?php
						foreach ($plans as $key => $value) {

							echo "<option value='".$value->plan_id."' >".$value->plan_name."</option>";
						}

						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class=" col-sm-4 control-label">Select Student
				</label>
				<div class=" col-sm-8">

					<select name="student_id" class="select2 form-control student_id m0">
						<?php
						foreach ($students as $key => $value) {

							echo "<option value='".$value->id."' >".$value->full_name."</option>";
						}

						?>
					</select>
				</div>
			</div>



			<div class="form-group row">
				<label class=" col-sm-4 control-label">Total Extra classes
				</label>
				<div class="col-sm-8">
					<input type="number" value="0" name="extra_classes" class="form-control extra_classes m0">
				</div>
			</div>

			<?php
			if (isset($ticket) && !empty($ticket)) {
				?>

				<div class="form-group row">
					<label class=" col-sm-4control-label">Remaining Extra classes
					</label>
					<div class="col-sm-8>
						<input class="form-control remaining_extra_classes m0" disabled="" type="text" value=""> 
					</div>
				</div>


				<div class="form-group row">
					<label class=" col-sm-4 control-label">Used Extra classes
					</label>
					<div class="col-sm-8">
						<input class="form-control m0" disabled="" type="text" value="<?php echo $ticket->extra_classes-$ticket->remaining_extra_classes ?>"> 
					</div>
				</div>

				<?php
			}

			?>



			<div class="text-center">
				<input type="hidden" name="ticket_id" class="ticket_id">
				<button type="submit" class="btn blue">Submit
				</button>
			</div>
			
		</form>


	</div>
</div>