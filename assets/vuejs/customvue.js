
			$(document).ready(function () {
				<?php if(!empty($teacher_id))
				{
					?>
					$("#teachers_availablility_select").val("<?php echo $teacher_id; ?>").change();
					<?php
				} ?>
				
				$(".click-btn").on("click",function() {
					$(this).attr('disabled', true);
				});
			})