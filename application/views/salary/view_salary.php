<style type="text/css">
.row_margin{
	margin: 0px -15px 40px -15px;
}
</style>

<div>

<!-- 	<div class="row row_margin">
		<div class="col-md-1 col-md-offset-10">
			<button class="btn btn-success"> Request a Payout</button>
		</div>
	</div> -->

	<form action="" method="post">
		<div class="row row_margin">
			<?php
			if ($user_role == "admin") {
				?>
				<div class="col-md-4">
					<label class="control-label"><b><?php echo $this->lang->line('teachers'); ?></b></label>
					<select class="form-control teacher_salary_select select2" name="teacher_id" data-role="teacher">
						<option><?php echo $this->lang->line('select_teacher'); ?></option>
						<?php
						foreach ($teachers as $key => $value) {

							echo "<option value='".$value->id."'>".$value->full_name."</option>";
						}
						?>
					</select>
				</div>
				<?php } ?>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label"><b><?php echo $this->lang->line('month_year'); ?></b></label>

						<input name="month_year" id="startDate" placeholder="Select Month/Year" class="date-picker form-control month_year" />
					</div>

				</div>
				<div class="col-md-2">
					<label class="control-label">&nbsp;</label>
					<button type="submit" name="filter" value="filer" class="btn btn-primary form-control"><?php echo $this->lang->line('filter'); ?></button>
				</div>
			</div>
		</form>


		<?php
		$access = true;

		if ($user_role == "admin" && $this->input->post("filter") == "") {

			$access = false;
		}
		if ($access) {
			?>
			<table class="table datatable">
				<thead>
					<tr>
						<th><?php echo $this->lang->line('serial_number'); ?></th>
						<th><?php echo $this->lang->line('student'); ?></th>
						<th><?php echo $this->lang->line('classes'); ?></th>
						<th><?php echo $this->lang->line('work_time'); ?> <br> (<?php echo $this->lang->line('hour'); ?>) </th>
						<th><?php echo $this->lang->line('payment'); ?> <br> (<?php echo $this->lang->line('1_15'); ?>)</th>
						<th><?php echo $this->lang->line('payment'); ?> <br> (<?php echo $this->lang->line('16_end'); ?>)</th>
						<th><?php echo $this->lang->line('payment'); ?> <br> (<?php echo $this->lang->line('base'); ?>)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					$total_classes = 0;
					$total_work_mins = 0;
					$total_work_hours = 0;
					$total_salary_15 = 0;
					$total_salary_30 = 0;
					$total_salary = 0;

					foreach ($salaries as $key => $value) {
						$value = (object) $value;
						$i++;


						$payment_base = $value->salary_30+$value->salary_15;

						echo "<tr>
						<td>".$i."</td>
						<td>".$value->student_name."</td>
						<td>".$value->total_classes."</td>
						<td>".$value->work_mins." <br> (".$value->work_hours.") </td>
						<td>".$value->salary_15."</td>
						<td>".$value->salary_30."</td>
						<td>".$payment_base."</td>

						</tr>";


						$total_classes += $value->total_classes;
						$total_work_mins += $value->work_mins;
						$total_work_hours += $value->work_hours;
						$total_salary_15 += $value->salary_15;
						$total_salary_30 += $value->salary_30;
						$total_salary += $payment_base;
					}

					?>
				</tbody>
				<tfoot>
					<tr>
						<th><?php echo $this->lang->line('total'); ?></th>
						<th><?php echo $this->lang->line('students'); ?>: <?=$i?> </th>
						<th><?=$total_classes?></th>
						<th><?=$total_work_mins?> <br> (<?=$total_work_hours?>) </th>
						<th><?=$total_salary_15?></th>
						<th><?=$total_salary_30?></th>
						<th><?=$total_salary?></th>
					</tr>
				</tfoot>
			</table>
			<?php } ?>



		</div>
		<script type="text/javascript">
			$(function() {
				$('.date-picker').datepicker( {
					changeMonth: true,
					changeYear: true,
					showButtonPanel: true,
					dateFormat: 'm/yy',
					onClose: function(dateText, inst) { 
						$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
					}
				}).datepicker("setDate", new Date());

				<?php 
				if ($this->input->post("teacher_id") != "") {
					?>

					$(".teacher_salary_select").val("<?php echo $this->input->post("teacher_id") ?>");
					<?php
				}
				?>

				<?php 
				if ($this->input->post("month_year") != "") {
					?>

					$(".month_year").val("<?php echo $this->input->post("month_year") ?>");
					<?php
				}
				?>
			});
		</script>
		<style>
		.ui-datepicker-calendar {
			display: none;
		}
	</style>
