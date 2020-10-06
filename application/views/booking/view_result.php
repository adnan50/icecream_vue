<div>
	

	<div class="view_result">


	</div>

</div>



<script type="text/javascript">
	$.ajax({

		url: base_url+"booking/get_level_test_result",
		data:{
			result_id: "<?php echo $result->result_id; ?>"
		},
		type: "post",
		success:function(res){

			$(".view_result").html(res);
		}
	})
</script>

