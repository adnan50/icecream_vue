 <div class="">

	<?php
	$user_role = get_user_role();

	?>
	<div class="row mb30">
		<div class="col-md-3">
			<?php
			if (!empty($messages)) {
				
				echo "<a class='btn btn-danger mass_delete_queries' data-model-name = 'support' href='#'>Mass Delete</a>";
				echo " <a class='btn btn-info selectAll' href='#'>".$this->lang->line('select_all')."</a>";
				echo " <a class='btn btn-success deselectAll' href='#'>".$this->lang->line('unckech_all')."</a>";
			}
			?>
			
		</div>

	</div>
	 <?php if($this->session->flashdata('success'))
 { ?> 
   <script>
    $(document).ready(function(){
      toasterOptions();
      toastr.success("<?php echo $this->session->userdata('success'); ?>","Notification");
    });

  </script>
  <?php  
}
?>
	
	
	


	<table class="table datatable">
		<thead>
			<tr>
				<th></th>
				<th><?php echo $this->lang->line('serial_number'); ?></th>
				<th><?php echo $this->lang->line('title'); ?></th>
				<th><?php echo $this->lang->line('name'); ?></th>
				<th><?php echo $this->lang->line('date_time'); ?></th>
				<th><?php echo $this->lang->line('status'); ?></th>
				<th><?php echo $this->lang->line('action'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
		
			foreach ($messages as $key => $value) {
				$status = $value->status;
				$disable = "";
				if($status == 3)
				{
					$disable = "disabled";
				}
				$show = get_status($status);
				?>
				

				<tr>
					<td><div class="md-checkbox" style="float: left;">
						<input type="checkbox" name="questions[]" id="checkbox<?php echo $value->m_id; ?>" value="<?php echo $value->m_id; ?>" class="md-check">
						<label for="checkbox<?php echo $value->m_id; ?>">
							<span class="inc"></span>
							<span class="check"></span>
							<span class="box"></span>  
						</label>
					</div></td>
				<td><?php echo $i ?></td>
				<td><a href='<?php echo base_url('support/view_messages/').$value->m_id ?>'><?php echo $value->title ?></a></td>
				<td><?php echo $value->full_name ?></td>
				<td><?php echo $value->created_at ?></td>
				<td><?php echo $show ?></td>
				<td><button  class='btn btn-outline round-btn red-mint uppercase close-ticket' <?php echo $disable ?> data-id="<?php echo $value->m_id ?>">Close</button></td>
				</tr>
				<?php

				$i++;
			}

			?>
		</tbody>
	</table>

</div>

<script type="text/javascript">
	$(document).ready(function() {



	})
</script>