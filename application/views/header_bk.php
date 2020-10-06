    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRPBC9M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

            <header class="page-header">
                <nav class="navbar mega-menu" role="navigation">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                            <!-- End Toggle Button -->
                            <!-- BEGIN LOGO -->
                            <a id="index" class="page-logo" href="<?php echo base_url('users/dashboards'); ?>">
                                <img src="<?php echo base_url(); ?>assets/layouts/layout5/img/logo.png" alt="Logo"><span class="teacher-text"> 
                                    <?php
                                    $user_role = get_user_role();
                                    if ($user_role == "teacher") 
                                    {
                                       echo $this->lang->line('teachers_portal');

                                    }
                                    elseif ($user_role == "student") 
                                    {
                                        
                                        echo $this->lang->line('student_portal');
                                    }
                                    elseif ($user_role == "admin") 
                                    {
                                        
                                        echo $this->lang->line('admin_portal');
                                    }
                                    ?>
                                 </span></a>
                            <!-- END LOGO -->

                                                     
                            <!-- BEGIN TOPBAR ACTIONS -->
                                  
                            <div class="topbar-actions">
                                <?php 
                                    $role = get_user_role();
                                    if($role == 'student')
                                    {
                                ?>
                                <form action="<?php echo base_url('dashboard/language_set'); ?>"  method="POST">
                                    <select class="form-control height27" name="lang"  onchange="this.form.submit()" >
                                    <?php 
                                        $languages = all_languages();
                                        $lang = $this->session->userdata("language");
                                        if(empty($lang))
                                        {
                                            $lang = "korean";
                                        }
                                        foreach ($languages as $key => $value) 
                                        { ?>
                                        <option class="form-control " value="<?php  echo $value->language; ?>"  <?php if($value->language == $lang) echo "selected"; ?>><?php echo $value->language; ?>
                                            
                                        </option>
                                        <?php } ?>
                                    </select>
                                </form>
                                <?php
                                    } 
                                ?>
                               
                               
                               
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span>Hi, <?php $name = get_user_name(); echo $name; ?></span>
                                        <?php $image = get_user_image(); 
                                        if(!empty($image)){ ?>
                                        <img src="<?php echo base_url(PROFILE_IMAGE_UPLOAD_PATH).$image; ?>" alt=""> <?php } else {
                                            ?> <img src="<?php echo base_url(PROFILE_IMAGE_UPLOAD_PATH)."default_avatar.png"; ?>" alt=""> <?php 
                                        } ?> </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <a href="<?php echo base_url('users/manage_user_view/'.get_user_role().'?id='.get_user_id()) ?>"
                                                ><i class="icon-user"></i> <?php echo $this->lang->line('myprofile'); ?>
                                                <span class="badge badge-danger"></span>
                                            </a>
                                        </li>
                                      
                                        <li>
                                            <a href="<?php echo base_url('Logout/logout') ?>"
                                                ><i class="icon-key"></i> <?php echo $this->lang->line('logout'); ?> </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                             
                            </div>
                            <!-- END TOPBAR ACTIONS -->
                        </div>
                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                 
                                <?php
                                
                                if ($user_role == "teacher") {
                                    ?>

                                <li class="dropdown dropdown-fw dropdown-fw-disabled Availability">
                                    <a href="<?php echo base_url() ?>availability" class="text-uppercase ">
                                        <i class="icon-calendar"></i> <?php echo $this->lang->line('availability'); ?> </a>
                                    
                                </li>

                                <li class="dropdown dropdown-fw dropdown-fw-disabled Notifications">
                                    <a href="<?php echo base_url() ?>notifications/" class="text-uppercase">
                                        <i class="icon-notebook"></i> <?php echo $this->lang->line('notifications'); ?> </a>
                                    
                                 </li>

                                
                               <li class="dropdown dropdown-fw dropdown-fw-disabled Lessons">
                                    <a href="<?php echo base_url() ?>schedule" class="text-uppercase">
                                        <i class="icon-clock"></i> <?php echo $this->lang->line('lessons'); ?> </a>
                                    
                                </li>
                               <li class="dropdown dropdown-fw dropdown-fw-disabled Salary">
                                    <a href="<?php echo base_url() ?>salary/" class="text-uppercase">
                                        <i class="icon-wallet"></i> <?php echo $this->lang->line('wallet'); ?> </a>
                                    
                                 </li>


                                 <li class="dropdown more-dropdown support ">
                                    <a href="<?php echo base_url() ?>support/" class="text-uppercase">
                                        <i class="icon-earphones-alt"></i> <?php echo $this->lang->line('support'); ?> 

                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url() ?>support/"> <?php echo $this->lang->line('contact_admin'); ?> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>support/open_all">  <?php echo $this->lang->line('all_queries'); ?> </a>
                                        </li>
    
                                    </ul>

                                </li>

                                    <?php
                                }elseif ($user_role == "student") {
                                    ?>
                                      <li class="dropdown dropdown-fw dropdown-fw-disabled Lessons">
                                    <a href="<?php echo base_url() ?>schedule" class="text-uppercase">
                                        <i class="icon-clock"></i> <?php echo $this->lang->line('lessons'); ?> </a>
                                    
                                </li>
                                 <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Requests">
                                    <a href="<?php echo base_url() ?>plans/view_booking_requests" class="text-uppercase">
                                        <i class="icon-book-open"></i> <?php echo $this->lang->line('payment_history'); ?></a>
                                    
                                 </li>
                                   <li class="dropdown dropdown-fw dropdown-fw-disabled Notifications">
                                    <a href="<?php echo base_url() ?>notifications/" class="text-uppercase">
                                        <i class="icon-notebook"></i> <?php echo $this->lang->line('notifications'); ?>  </a>
                                    
                                 </li>
                                 <li class="dropdown dropdown-fw dropdown-fw-disabled Result">
                                    <a href="<?php echo base_url() ?>booking/view_level_test_result/" class="text-uppercase">
                                        <i class="icon-home"></i> <?php echo $this->lang->line('level_test_result'); ?>  </a>
                                    
                                 </li>
                                  <li class="dropdown dropdown-fw dropdown-fw-disabled">
                                    <a href="<?php echo base_url() ?>" class="text-uppercase">
                                        <i class="icon-home"></i><?php echo $this->lang->line('teachers_list'); ?> </a>
                                    
                                 </li>

                                    <?php
                                }elseif ($user_role == "admin") {
                                    ?>


                                    <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Availability">
                                    <a href="<?php echo base_url() ?>availability" class="text-uppercase ">
                                        <i class="icon-calendar"></i> <?php echo $this->lang->line('availability'); ?> </a>
                                    
                                    </li>

                                    <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Teachers">
                                    <a href="<?php echo base_url() ?>users/teacher" class="text-uppercase ">
                                        <i class="icon-user"></i> <?php echo $this->lang->line('university_and_location'); ?> </a>
                                    
                                    </li>

                                      <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Students">
                                    <a href="<?php echo base_url() ?>users/student" class="text-uppercase ">
                                        <i class="icon-user"></i> <?php echo $this->lang->line('students'); ?> </a>
                                    
                                    </li>


                                     <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Lessons">
                                    <a href="<?php echo base_url() ?>schedule" class="text-uppercase">
                                        <i class="icon-clock"></i> <?php echo $this->lang->line('lessons'); ?> </a>
                                    
                                </li>

                                   <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Requests">
                                    <a href="<?php echo base_url() ?>plans/view_booking_requests" class="text-uppercase">
                                        <i class="icon-book-open"></i> <?php echo $this->lang->line('requests'); ?>  </a>
                                    
                                 </li>

                                 <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Tickets">
                                    <a href="<?php echo base_url() ?>tickets/" class="text-uppercase">
                                        <i class="icon-paper-plane"></i> <?php echo $this->lang->line('tickets'); ?>  </a>
                                    
                                 </li>

                                 <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Notifications">
                                    <a href="<?php echo base_url() ?>notifications/" class="text-uppercase">
                                        <i class="icon-notebook"></i> <?php echo $this->lang->line('notifications'); ?>  </a>
                                    
                                 </li>

                                  <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Salary">
                                    <a href="<?php echo base_url() ?>salary/" class="text-uppercase">
                                        <i class="icon-wallet"></i> <?php echo $this->lang->line('salary'); ?> </a>
                                    
                                    </li>
                                    <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Support">
                                        <a href="<?php echo base_url() ?>support/get_notification" class="text-uppercase">
                                            <i class="icon-earphones-alt"></i>  <?php echo $this->lang->line('support'); ?> 
                                        </a>
                                   </li>

                                   <li class="dropdown dropdown-fw admin-list dropdown-fw-disabled Support">
                                        <a href="<?php echo base_url() ?>student_booking/manage" class="text-uppercase">
                                            <i class="icon-earphones-alt"></i>  Booking For Student 
                                        </a>
                                   </li>

                                   


                                    <?php
                                }

                                ?>
                             
                               
                            </ul>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!--/container-->
                </nav>
            </header>
           
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1><?php echo $title; ?></h1>
                    
                        <!-- Sidebar Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- Sidebar Toggle Button -->
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                            <?php //$this->load->view('sidebar'); ?>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">



