<div class="">
	
	<div class="row mb30">
		<div class="col-md-8 col-xs-8 pr0">
		<?php
			if (!empty($tickets)) {
				
				echo "<a class='btn btn-danger btn-padding mass_delete_queries' data-model-name = 'tickets' href='#'>Mass Delete</a>";
				echo " <a class='btn btn-info btn-padding selectAll' href='#'>".$this->lang->line('select_all')."</a>";
				echo " <a class='btn btn-success btn-padding deselectAll' href='#'>".$this->lang->line('unckech_all')."</a>";
			}
			?>
			</div>
		<div class="col-md-4 col-xs-3  text-right pl0">
			<a class='btn btn-success btn-padding' href='<?php echo base_url() ?>tickets/manage_ticket_view'>Add Ticket</a>
		</div>
	</div>


<table class="table datatable ">
	<thead>
		<tr>
			<th></th>
			<th>Sr.</th>
			<th>Ticket Number</th>
			<th>Student Name</th>
			<th>Package Name</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			foreach ($tickets as $key => $value) { ?>
				<tr>
					<td><div class="md-checkbox" style="float: left;">
						<input type="checkbox" name="tickets[]" id="checkbox<?php echo $value->ticket_id; ?>" value="<?php echo $value->ticket_id; ?>" class="md-check">
						<label for="checkbox<?php echo $value->ticket_id; ?>">
							<span class="inc"></span>
							<span class="check"></span>
							<span class="box"></span>  
						</label>
					</div></td>
					<td><?php echo $i?></td>
					<td><?php echo $value->ticket_number?></td>
					<td><?php echo $value->full_name?></td>
					<td><?php echo $value->plan_name?></td>
					<td> <a class='btn btn-primary ' href='<?php echo base_url()?>tickets/manage_ticket_view?id=<?php echo $value->ticket_id?>'>Edit</a> &nbsp; <a data-id="<?php echo $value->ticket_id?>" class='btn btn-danger delete-ticket'>Delete</a></td>
				</tr>
				<?php

				$i++;
			}

		?>
	</tbody>
</table>

</div>
