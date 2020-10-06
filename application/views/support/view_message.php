<?php

$date = $messages->created_at;
$status = $messages->status;
$show = get_status($status);

?>
<div class="app-ticket app-ticket-details">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line"></div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="ticket-cust">
                                <h3><i class="icon-note"></i> <?php echo $this->lang->line('teacher_message'); ?></h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ticket-date"> 
                                <?php echo $show; ?> &nbsp;
                                <span class="bold"><?php echo $this->lang->line('date_time'); ?>:</span> <?php echo  $date; ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="ticket-msg">
                                    <p>
                                        <?php echo $messages->message; ?>
                                    </p>

                                    <?php if(!empty($messages->image)){ ?>

                                        <a download="" href="<?php echo base_url('assets/images/messages/').$messages->image; ?>">Download Attached File</a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($reply)){ ?>
                       <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="ticket-cust">
                                    <h3><i class="icon-note"></i> <?php echo $this->lang->line('admin_message'); ?></h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ticket-date"> 
                                    <span class="bold">Date/Time:</span> <?php echo  $reply->date; ?> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="ticket-msg">
                                        <p>
                                            <?php echo $reply->reply; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="ticket-line"></div>
                    <?php
                    $user_role = get_user_role(); 
                    if( $user_role == "admin"){ ?>
                        <form class="form-group" method="POST" action="<?php echo base_url('support/reply'); ?>">
                            <input type="hidden" name="m_id" value="<?php echo $messages->m_id; ?>">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3>
                                        <i class="icon-action-redo"></i> <?php echo $this->lang->line('ticket_reply'); ?>
                                    </h3>
                                    <textarea class="ticket-reply-msg" name="reply" row="10"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-square uppercase bold green" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
