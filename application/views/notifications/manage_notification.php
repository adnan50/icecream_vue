<style type="text/css">
.form-control{
	margin: 10px;
}

</style>

<?php
$user_role = get_user_role();
if (isset($notification) && !empty($notification)) {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php
			foreach ($notification as $key => $value) {

				if ($key == "description") {

					echo "$('.".$key."').html('".$value."');";
				}else{

					echo "$('.".$key."').val('".$value."');";
				}
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


	<div class="col-md-6 col-xs-12 col-sm-12">
		
		<form method="POST" action="<?php echo base_url() ?>notifications/manage_notification">

			<?php if($user_role == 'student'){ ?>

			<div class="form-group row">
				<label class="col-xs-12 control-label">Type
				</label>
				<input type="hidden" name="receiver" value="public"/>
				<div class="col-xs-12">

					<select name="public_type" class="form-control select2 m0">
						<option value="" disabled="" selected="">Select Type</option>
						<option value="3"<?php if(isset($notification)){ if($notification->public_type == 3){ echo "selected"; }} ?>>Q&A</option>
						<option value="4"<?php if(isset($notification)){ if($notification->public_type == 4){ echo "selected"; }} ?>>Reviews</option>
					</select>
				</div>
			</div>

			<input type="hidden" name="userflag" value="1">
		<?php } if($user_role == 'admin'){ ?>


			<div class="form-group row">
				<label class="col-xs-12 control-label">Select User
				</label>
				<div class="col-xs-12">

					<select name="receiver" class="form-control receiver_id select2 m0">
						<option value="private">Register Users</option>
						<option value="public">Public</option>
						<option value="teachers">All Register Teachers</option>
						<option value="students">All Register Students</option>
						<option value="teacher">Register Teacher</option>
						<option value="student">Register Student</option>
					</select>
				</div>
			</div>

			<div class="form-group row teachers">
				<label class="col-xs-12 control-label">Select Teacher
				</label>
				<div class="col-xs-12">

					<select name="receiver_id" class="form-control select2 m0">
						<option value="" disabled="" selected="">Select Teacher</option>
						<?php
						foreach ($teachers as $key => $value) {

							echo "<option value='".$value->id."' >".$value->full_name." (".$value->role.") </option>";
						}

						?>
					</select>
				</div>
			</div>

			<div class="form-group row students">
				<label class="col-xs-12 control-label">Select Student
				</label>
				<div class="col-xs-12">

					<select name="receiver_id" class="form-control select2 m0">
						<option value="" disabled="" selected="">Select Student</option>
						<?php
						foreach ($students as $key => $value) {

							echo "<option value='".$value->id."' >".$value->full_name." (".$value->role.") </option>";
						}

						?>
					</select>
				</div>
			</div>


			<div class="form-group row public">
				<label class="col-xs-12 control-label">Select Type
				</label>
				<div class="col-xs-12">

					<select name="public_type" class="form-control select2 m0">
						<option value="" disabled="" selected="">Select Type</option>
						<option value="1">Announcement</option>
						<option value="2">Faq</option>
						<!--<option value="3">Q&A</option>-->
					</select>
				</div>
			</div>

		<?php } ?>
			<div class="form-group row">
				<label class="col-xs-12 control-label">Title
				</label>
				<div class="col-xs-12">
					
					<input class="form-control title m0" name="title" type="text" value="" required> 
				</div>
			</div>

			<div class="form-group row">
				<label class="col-xs-12 control-label">Description
				</label>
				<div class="col-xs-12">
					
					<textarea class="form-control description m0" id="summernote" name="description" rows="3" cols="4"></textarea>
				</div>
			</div>









			<div class="text-center">
				<input type="hidden" name="notify_id" class="notify_id">
				<button type="submit" class="btn blue">Submit
				</button>
			</div>
			
		</form>


	</div>
</div>
<script type="text/javascript">

$('#summernote').summernote({
    height: "200px",
   callbacks: {
       onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], $(this), welEditable);
       }
    },
});

        function sendFile(file, editor, welEditable) {
          //  alert("aaaaaa");
           console.log(editor);
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "<?php echo base_url() ?>notifications/uploadsummerfile",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $("#summernote").summernote("insertImage",url);
                    //editor.insertImage(welEditable, url);
                }
            });
        }


</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".teachers").hide();
		$(".students").hide();
		$(".public").hide();
		$(".receiver_id").on("change",function(){
			//alert($(".receiver_id").val());
			if($(".receiver_id").val() == 'teacher')
			{
				$(".teachers").fadeIn();
				$(".students").hide();
				$(".public").hide();
			}
			else if($(".receiver_id").val() == 'student')
			{
				$(".students").fadeIn();
				$(".teachers").hide();
				$(".public").hide();
			}
			else if($(".receiver_id").val() == 'public')
			{
				$(".public").fadeIn();
				$(".teachers").hide();
				$(".students").hide();
				
			}
			else
			{
				$(".teachers").fadeOut();
				$(".students").fadeOut();
				$(".public").fadeOut();
			}
		});
	})
</script>