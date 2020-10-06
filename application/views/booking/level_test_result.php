<style type="text/css">
.mt25{
	margin-top: 25px;
}
.mb25{
	margin-bottom: 25px;
}
.mt10{
	margin-top: 10px;
}
.mb10{
	margin-bottom: 10px;
}
.umcomplete_reason{
	display: none;
}
</style>


<div>
	


	<div class="row">

		<div class="col-md-12">
			Class Name: Level Test
		</div>
	</div>

	<div class="row">

		<div class="col-md-12">
			Class Time : <?php $class_time =   explode("T", $class_info->start); echo array_shift($class_time); echo "/".array_shift($class_time);   ?>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12">
			Teacher Name : <?php echo $class_info->teacher_name;   ?>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12">
			Student Name : <?php echo $class_info->student_name;   ?>
		</div>
	</div>

	<hr>
<form method="post" action="<?php echo base_url() ?>booking/record_level_test_result">
	

	<div class="mt-radio-list">
		<label class="mt-radio">
			<input type="radio" name="class_status" value="4" > 
			Student was absent
			<span></span>
		</label>
		<label class="mt-radio">
			<input type="radio" name="class_status" value="2" checked=""> Completed
			<span></span>
		</label>
		<label class="mt-radio">
			<input type="radio" name="class_status" value="3" > 
			Uncompleted
			<span></span>
		</label>
		
	</div>

	<div class="row umcomplete_reason">
		<div class="col-md-12">
			<div class="form-group">
				<label>Reason for
				Uncompleted </label>
				<textarea name="reason_for_uncompleted" class="form-control" rows="3"></textarea>
			</div>
		</div>
	</div>

	<hr>
<div class="evaluation_report_box">
	<div class="row mt25 mb25">
		<div class="col-md-12">EVALUATION REPORT</div>
	</div>

		<div class="row">
		<div class="col-md-12 mt10 mb10"><b>A. GRAMMAR (5 points)</b></div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Grammar </label>
				<textarea name="describe_the_picture" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="describe_the_picture_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12 mt10 mb10"><b>B. VOCABULARY (5 points)</b></div>
		<div class="col-md-8">
			<div class="form-group">
				<label> Vocabulary   </label>

				<textarea name="use_the_word" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="use_the_word_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>


	<div class="row">

		<div class="col-md-12 mt10 mb10"><b>C. PRONUNCIATION (5 points)</b></div>
		<div class="col-md-8">
			<div class="form-group">
				<label> Pronunciation   </label>

				<textarea name="answer_the_questions" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="answer_the_questions_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt10 mb10"><b>D. FLUENCY (5 points)</b></div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Fluency  </label>
				<textarea name="getting_know_you" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="getting_know_you_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 mt10 mb10"><b>E. COMPREHENSION (5 points)</b></div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Comprehension</label>
				<textarea name="what_the_word" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="what_the_word_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	


	

	<div class="row">
		<div class="col-md-12 mt10 mb10"><b>F. LISTENING  (5 points)</b></div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Listening </label>
				<textarea name="comprehension_questions" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Points:</label>
				<div class="col-md-9">
					<select class="form-control points" name="comprehension_questions_points">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-9">LEGEND : TOTAL <span id="total_points">6</span> POINTS</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">1. Beginner [0-5]</div>
		<div class="col-md-6">2. Elementary [6-12]</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">3. Pre-Intermediate [13-18]</div>
		<div class="col-md-6">4. Intermediate [19-24]</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">5. Upper Intermediate [25-27]</div>
		<div class="col-md-6">6. Advanced [28-30]</div>
	</div>
	<hr>

</div>

	<div class="row">
		<div class="col-md-12"><div class="form-group">
			<label>Teacher's Remarks</label>
			<textarea name="teachers_remarks" class="form-control" rows="3"></textarea>
		</div></div>
	</div>
	<hr>

	<div class="row">
		<div class="col-md-6">
			EVALUATED BY: <?php echo $class_info->teacher_name;   ?>
		</div>
		<div class="col-md-6 text-right">
			DATE: <?php echo date("M,d Y") ?>
		</div>
	</div>

	<div class="row mt10 mb10">

		<div class="col-md-12">
			<input type="hidden" name="total_points" value="6">
			<input type="hidden" name="level" value="Beginner">
			<input type="hidden" name="class_id" value="<?=$class_id?>">
			<input type="hidden" name="student_id" value="<?=$student_id?>">
			<input type="hidden" name="teacher_id" value="<?=$teacher_id?>">
			<input type="submit" class="btn btn-primary" value="Save and Exit" style="width: 100%">
		</div>
		
	</div>
</form>



</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("input[name=class_status]").change(function(){
			var val =  $(this).val();

			if (val == 3) {

				$(".evaluation_report_box").slideUp();
				$(".umcomplete_reason").slideDown();
				
			}else if(val == 4){

				$(".umcomplete_reason").slideUp();
				$(".evaluation_report_box").slideUp();

			}else{

				$(".umcomplete_reason").slideUp();
				$(".evaluation_report_box").slideDown();

			}
		});

		$(".points").change(function(){

			var points = 0;

			var points_box = $(".points");

			$.each(points_box,function(k,v){

				points += parseInt($(this).val());

			});
			$("input[name=total_points]").val(points);
			$("#total_points").html(points);

			if (points < 6) {

				$("input[name=level]").val("Beginner");
			}else if(points < 13){

				$("input[name=level]").val("Elementary");
			}else if(points < 19){

				$("input[name=level]").val("Pre-Intermediate");
			}else if(points < 25){

				$("input[name=level]").val("Intermediate");
			}else if(points < 28){

				$("input[name=level]").val("Upper Intermediate");
			}else if(points < 31){

				$("input[name=level]").val("Advanced");
			}

		});
	})
</script>