<style type="text/css">
	.row_margin{
		margin: 10px -15px;
	}
</style>

<div>


	<div class="row row_margin">

		<div class="col-md-6"><b>From:</b> <?=$notify->sender_name?></div>
		<div class="col-md-6"><b>To:</b> <?=$notify->receiver_name?></div>

		
	</div>

	<div class="row row_margin">
		<div class="col-md-6"><b>Title:</b> <?=$notify->title?></div>
		<div class="col-md-6"><b>Date/Time:</b> <?=$notify->created?></div>
	</div>

	<div class="row row_margin">
		<div class="col-md-12"><b>Description:</b></div>
		<div class="col-md-12"><?=$notify->description?></div>
	</div>





</div>