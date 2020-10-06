<div>



	<table class="table datatable">
	<thead>
		<tr> 
			<th><?php echo $this->lang->line('serial_number'); ?></th>
			<th><?php echo $this->lang->line('student_name'); ?></th>
			<th><?php echo $this->lang->line('package_name'); ?></th>
			<th><?php echo $this->lang->line('payment'); ?></th>
			<th><?php echo $this->lang->line('payment_status'); ?></th>
			<?php
			if ($user_role == "admin") {
				echo "<th>Action</th>";
			}
			?>
			
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			foreach ($booking_requests as $key => $value) {
				echo "<tr>
					<td>".$i."</td>
					<td>".$value->full_name."</td>
					<td>".$value->plan_name."</td>
					<td>".$value->price." KR</td>
					<td>";

					if ($value->payment_status==0) {
						
						echo 'Payment Not Verified';

						if ($user_role == "student") {
							
						echo '&nbsp; <a href="'.base_url().'plans/change_booking_status/2?id='.$value->booking_id.'" class="btn btn-primary round-btn">Request For Verification</a>';
						}

					}elseif ($value->payment_status==1) {
						
							echo "Payment Verified";

					}elseif ($value->payment_status==2) {

						echo "Waiting For Approval";
					}

					echo "</td>";

					

					if ($user_role == "admin") {
					echo "<td> ".(($value->payment_status==1)? "<a class='btn btn-danger round-btn' href='".base_url()."plans/change_booking_status/0?id=".$value->booking_id."'>Disprove Payment</a>": '<a href="'.base_url().'plans/change_booking_status/1?id='.$value->booking_id.'" class="btn btn-success round-btn">Verify Payment</a>')."</td>";
				}
				echo "</tr>";

				$i++;
			}

		?>
	</tbody>
</table>
</div>