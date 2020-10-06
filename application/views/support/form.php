<div class="container">
    
	<form class="col-md-4 col-md-offset-4" method="POST" action="<?php echo base_url('support/manage_message'); ?>" enctype="multipart/form-data" >
    <div class="form-group">
    <label for="name"><?php echo $this->lang->line('name'); ?></label>
    <input type="text" class="form-control" autocomplete="off" readonly id="name" value="<?php echo $users[0]->full_name; ?>">
  </div>
  <div class="form-group">
    <label for="email"><?php echo $this->lang->line('email'); ?></label>
    <input type="text" class="form-control" autocomplete="off" readonly id="email" value="<?php echo $users[0]->email; ?>">
  </div>
		<div class="form-group">
    <label for="title"><?php echo $this->lang->line('subject'); ?></label>
    <input type="text" class="form-control" name="title" autocomplete="off" required="Enter Title" id="title" placeholder="Enter Subject">
  </div>
  <div class="form-group">
    <label for="message"><?php echo $this->lang->line('message'); ?></label>
    <textarea class="form-control" id="message" name="message" required="Enter Message Message" placeholder="Your Message Here .." rows="3"></textarea>
  </div>

    <div class="form-group">
    <label for="image"><?php echo $this->lang->line('file'); ?></label>
    <input type="file" class="form-control" name="image" />
  </div>


  <button class="btn btn-info"><?php echo $this->lang->line('send'); ?></button>
	</form>
</div>