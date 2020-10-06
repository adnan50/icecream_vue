<div class="">
	
	<div class="row mb30">
		<div class="col-md-8 col-xs-8 pr0">
			<?php
			if (!empty($users)) {
				
				echo "<a class='btn btn-padding btn-danger mass_delete_queries' data-model-name = 'users' href='#'>Mass Delete</a>";
				echo " <a class='btn btn-padding btn-info selectAll' href='#'>".$this->lang->line('select_all')."</a>";
				echo " <a class='btn btn-padding btn-success deselectAll' href='#'>".$this->lang->line('unckech_all')."</a>";
			}
			?>
			
		</div>
		<div class="col-md-4 col-xs-3  text-right pl0">
			<a class='btn btn-success btn-sm-pd' href='<?php echo base_url() ?>users/manage_user_view/<?php echo $role ?>'>Add <?php echo $role ?></a>
		</div>
	</div>
<div class="table-responsive">
<table id="users_table" class="table datatable">
	<thead>
		<tr>
			<th></th>
			<th>Sr.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			foreach ($users as $key => $value) {
				$status ="";
				if( $value->user_status == 1)
				{
					$status = "Activate";
					$class = "green-meadow"; 
				}
				else
				{
					$status = "De-Activate";
					$class = "red-sunglo"; 
				}
				?>
				<tr>
					<td><div class="md-checkbox" style="float: left;">
    		<input type="checkbox" name="users[]" id="checkbox<?php echo $value->id; ?>" value="<?php echo $value->id; ?>" class="md-check">
    		<label for="checkbox<?php echo $value->id; ?>">
    			<span class="inc"></span>
    			<span class="check"></span>
    			<span class="box"></span>  
    		</label>
    	</div></td>
					<td><?php echo $i ?></td>
					<td><?php echo $value->full_name ?></td>
					<td><?php echo $value->email ?></td>
					<td><?php echo $value->contact_number ?></td>
					<td> <button class='btn <?php echo $class ?> confirm' data-status="<?php echo $value->id ?>" data-statusname = "<?php echo $status ?>"><?php echo $status ?></button></td>
					<?php $userrole = get_user_role();
					echo "<td> <a class='btn btn-primary ' href='".base_url()."users/manage_user_view/".$value->role."?id=".$value->id."'>Edit</a> &nbsp; <a class='btn btn-danger  delete-users'  data-id=".$value->id.">Delete</a>";
					
					if($userrole == "admin" && $role == "student" && $value->ticket_id != "")
					{	
						?>
							<a class='btn btn-success ' href="<?php echo base_url('tickets/manage_ticket_view?id=').$value->ticket_id; ?>">Ticket</a>
						<?php
					}
					echo "</td>";
					?>
					</tr>
				<?php
				$i++;
			}

		?>
	</tbody>
</table>
	</div>
	
</div>



<script type="text/javascript">
	$(document).ready(function() {

		$('.confirm').on("click", function() {
			var id = $(this).attr('data-status');
			var status = $(this).attr('data-statusname');
			var title= "";
			var updatedStatus = "";
			if(status == "Activate")
			{
				title = "De-Activate";
				updatedStatus = 0;

			}
			else
			{
				title = "Activate";
				updatedStatus = 1;

			}
			$.confirm({
			title: title,
				content: 'Are You Sure ?',
				icon: 'fa fa-question',
				theme: 'supervan',
				closeIcon: true,
				animation: 'scale',
				type: 'orange',
				buttons: {
					Update: function () {
						$.ajax({
							type: "POST",
							url: "<?php echo base_url('users/manage_status'); ?>",
							data:{id:id,status:updatedStatus},
							dataType:'json',
							success: function(data)
							{
								if(data.status){
									location.reload();
								}
							}
						});
					},
					cancel: function () {

					}
				}
			});
		});


	});
</script>