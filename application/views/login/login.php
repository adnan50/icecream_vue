<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->lang->line('login/signup'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 

        <style type="text/css">
            .error{
                color: red !important;
            }
        </style>
</head>
    <!-- END HEAD -->
   

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url(); ?>assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->


      




        <div class="content">
             
            <!-- BEGIN LOGIN FORM -->
            <form id="login" action="<?php echo base_url() ?>login/login_auth" method="post">
                <h3 class="form-title"><?php echo $this->lang->line('login_to_your_acount'); ?></h3>
                <?php
                    if ($this->session->flashdata("success_login")) {
                        ?>
                        <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span> <?php  echo $this->session->flashdata("success_login"); ?> </span>
                </div>
                        <?php
                        
                    }
                ?>
                <?php
                    if ($this->session->flashdata("error")) {
                        ?>
                        <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span> <?php  echo $this->session->flashdata("error"); ?> </span>
                </div>
                        <?php
                        
                    }
                ?>
                   <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> <?php  echo $this->session->flashdata("success_login"); ?>  </span>
                </div>
                
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo $this->lang->line('enter_your_username_password'); ?> </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('email'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="<?php echo $this->lang->line('email'); ?>" name="email"  required=""/>
                        <span id="username_alert" ></span> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('password'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo $this->lang->line('password'); ?>" name="password" minlength="6"  /> </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" name="user_type" value="<?php echo $user_type; ?>">
                   
                    <button type="submit" class="btn green pull-right"> <?php echo $this->lang->line('login'); ?> </button>
                </div>
          <?php
          if ($user_type != "admin") {
        ?>
          <div class="create-account">
                    <p><?php echo $this->lang->line('dont_have_acount'); ?> &nbsp;
                        <a href="javascript:;" id="register-btn"> <?php echo $this->lang->line('create_an_acount'); ?></a>
                    </p>
                </div>

        <?php
          }

          ?>
               
              
            </form>
            <!-- END LOGIN FORM -->
       
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="<?php echo base_url() ?>login/add_user" method="post">
                <h3>Sign Up</h3>
                <p> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname" /> </div>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contact Number</label>
                    <div class="input-icon">
                        <i class="fa fa-check"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Contact Number" name="contact_number" /> </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Gender</label>
             
                        <select class="form-control" name="meta[gender]" required="">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                </div>


                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Zoom ID</label>
                    <div class="input-icon">
                        <i class="fa fa-check"></i>
                        <input class="form-control placeholder-no-fix" type="text" required="" placeholder="Zoom ID" name="meta[skype_id]" /> </div>
                </div>
              
             
                <p> Enter your account details below: </p>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9" minlength="6" maxlength="8">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" minlength="6"  /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9"  >Re-type Your Password</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" minlength="6"  /> </div>
                    </div>
                </div>
            
                <div class="form-actions">
                    <input type="hidden" name="user_type" value="<?php echo $user_type; ?>">
                    <button id="register-back-btn" type="button" class="btn red btn-outline"> Back </button>
                    <button type="submit" id="register-submit-btn register" class="btn green pull-right"> Sign Up </button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
<!--         <div class="copyright"> 2014 &copy; Metronic - Admin Dashboard Template. </div>
 -->        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
         <!-- <script type="text/javascript">
        $(document).ready(function(){
        $('#username_r').keyup(function(){
        

        var username= $('#username_r').val();
        if(username_r!=''){

          $.ajax({
          url:"<?php echo base_url("Login/username_availability") ?>",
          method:'post',
          data:{username_r:username_r},
          success:function(data){
           data = JSON.parse(data);


            if(data.hasOwnProperty('error')){
            $("#username_alert").html(data.error);
            $("#username_alert").css("color","red");
            $("#register").attr('disabled', 'disabled');
            }
            else if(data.hasOwnProperty('success')){
            $('#username_alert').html(data.success);
            $("#username_alert").css("color","green");
            $("#register").removeAttr('disabled');


          }
        }



          });
        }

      });

    });



  </script> -->

  <script type="text/javascript">
      
      $(document).ready(function() {
        $("#login").validate({
            rules: {
             email: "required",
             password: "required",
        },
        messages: {
            email: {
                required: "<?php echo $this->lang->line('please_enter_email'); ?>",
            },
            password:{
                 required: "<?php echo $this->lang->line('please_enter_atleat_6'); ?>",
            }
        }
    });
    });
  </script>

          <script type="text/javascript">
            $(document).ready(function() {

              $('#login input').keypress(function (e) {
                if (e.which == 13) {
                    if ($('#login').validate().form()) {
                        $('#login').submit();
                    }
                    return false;
                }
            });

          });
        </script>
    </body>

</html>