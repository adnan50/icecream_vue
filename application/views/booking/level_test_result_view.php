<div class="row_pop">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<?php echo $this->lang->line('summry'); ?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<colgroup>
							<col width="145px;">
							<col>
							<col width="145px;">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<th><?php echo $this->lang->line('class_name'); ?></th>
								<td><?php echo $this->lang->line('level_test'); ?></td>
								<th><?php echo $this->lang->line('class_time'); ?></th>
								<td><?php
								$class_start = explode("T", $result->start);

								echo array_shift($class_start);
								echo " ".array_shift($class_start);

								?></td>
							</tr>
							<tr>
								<th><?php echo $this->lang->line('teacher_name'); ?></th>
								<td><?=$result->teacher_name?></td>
								<th><?php echo $this->lang->line('student_name'); ?></th>
								<td><?=$result->student_name?></td>
							</tr>
							<tr>
								<th><?php echo $this->lang->line('final_score'); ?></th>
								<td><?=$result->total_points?></td>
								<th><?php echo $this->lang->line('level'); ?></th>
								<td><?=$result->level?></td>
							</tr>
							<tr>
								<th style="width:145px;"><?php echo $this->lang->line('teacher_remarks'); ?></th>
								<td colspan="3">
									<?=$result->teachers_remarks ?>
								</td>
							</tr>

						</tbody>
					</table>

				</div>
				<table style="width:100%">
					<colgroup>
						<col width="50%">
						<col width="50%">
					</colgroup>
					<tbody><tr>
						<td style="text-align:left;"><?php echo $this->lang->line('evualted_by'); ?> : <?=$result->teacher_name?></td>
						<td style="text-align:right;">
							<?php echo $this->lang->line('date'); ?> : <span id="spDate"><?=$result->result_date?></span>
						</td>
					</tr>
				</tbody></table>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
</div>
<div class="row">

		<div class="col-md-6 panel-info">
		<div class="panel-heading">A. <?php echo $this->lang->line('grammer'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->describe_the_picture?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->describe_the_picture_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-6 panel-info">
		<div class="panel-heading">B. <?php echo $this->lang->line('vocablry'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->use_the_word?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->use_the_word_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-6 panel-info">
		<div class="panel-heading">C. <?php echo $this->lang->line('punction'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->answer_the_questions?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->answer_the_questions_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>





	<div class="col-md-6 panel-info">
		<div class="panel-heading">D. <?php echo $this->lang->line('fluency'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->getting_know_you?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->getting_know_you_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-6 panel-info">
		<div class="panel-heading">E. <?php echo $this->lang->line('comprehension'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->what_the_word?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->what_the_word_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	


	

	<div class="col-md-6 panel-info">
		<div class="panel-heading">F.  <?php echo $this->lang->line('listning'); ?> (5 <?php echo $this->lang->line('points'); ?>)</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Remarks</b></td>
						<td><?=$result->comprehension_questions?></td>
					</tr>
					<tr>
						<td><b>Marks</b></td>
						<td><?=$result->comprehension_questions_points?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>

