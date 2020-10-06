 <?php require ('../wp-blog-header.php'); ?>
<?php get_header(); ?>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> » Blog Archive <?php } ?></title>
<?php wp_head(); ?>
<head>
       
        

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<link href="<?php echo base_url() ?>assets/faq_css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/faq_css/jquery-ui-1.9.2.custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faq_css/font-awesome.min.css">
	<link href="<?php echo base_url() ?>assets/faq_css/common.css" rel="stylesheet">
	 <script src="http://portal.icecreamenglish.com/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="http://portal.icecreamenglish.com/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">-->
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-ko-KR.js"></script>
       <link href="http://portal.icecreamenglish.com/assets/global/plugins/bootstrap-summernote/summernote.css" type="text/css" rel="stylesheet"/>
    <script src="http://portal.icecreamenglish.com/assets/global/plugins/bootstrap-summernote/summernote.js"></script>
	<!--<script src="<?php echo base_url() ?>assets/faq_css/jquery-1.9.1.js.download"></script>-->
	<!--<script type="text/javascript" src="<?php echo base_url() ?>assets/faq_css/jquery.banner.js.download"></script>-->
	<!--<script type="text/javascript" src="<?php echo base_url() ?>assets/faq_css/jquery.preload.min.js.download"></script>-->
	<!--<script src="<?php echo base_url() ?>assets/faq_css/jquery-ui.js.download"></script>-->
	<!--<script src="<?php echo base_url() ?>assets/faq_css/bootstrap.js.download"></script>-->
	<!--<script src="<?php echo base_url() ?>assets/faq_css/common.js.download"></script>-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faq_css/match.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faq_css/popup.css">
	<script src="<?php echo base_url() ?>assets/faq_css/scheduleCell.js.download"></script>
	<link href="<?php echo base_url() ?>assets/faq_css/common(1).css" rel="stylesheet" type="text/css">
	<!--<script src="<?php echo base_url() ?>assets/faq_css/json2.js.download"></script>-->
<!-- 	<link href='<?php echo base_url() ?>assets/apps/css/stylesheet.min.css' id='stylesheet-css' media='all' rel='stylesheet' type='text/css'> -->
	<!-- <link href='<?php echo base_url() ?>assets/apps/css/style_dynamic.css' id='style_dynamic-css' media='all' rel='stylesheet' type='text/css'> -->
	<!-- <link href='<?php echo base_url() ?>assets/apps/css/responsive.min.css' id='responsive-css' media='all' rel='stylesheet' type='text/css'> -->
	<link href='<?php echo base_url() ?>assets/apps/css/style_dynamic_responsive.css' id='style_dynamic_responsive-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/js_composer.min.css' id='js_composer_front-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/custom_css.css' id='custom_css-css' media='all' rel='stylesheet' type='text/css'>

    <script src="<?php echo base_url() ?>assets/toastr.js"></script>
    <link href='<?php echo base_url() ?>assets/toastr.scss' rel='stylesheet' type='text/css'> 
  
        
	 <style type="text/css">
	@font-face {
		font-family: Typo_DodamM;
		src: url('<?php echo base_url(); ?>/assets/fonts/Typo_DodamM.ttf');
	}

	
	.mobile_menu_button,.logo_wrapper{
		height: 85px!important;
	}
	body {
		font-family: Typo_DodamM!important;
	}
	nav.main_menu > ul > li:not(:first-child)::before{
		content: ''!important;
	}
	#menu-footer-new-menu li{
		margin-right: 12px !important;
	}
	.footer_bottom{
		font-size: 12px!important;
	}
	ul, ol {

    margin-left: 0px!important;
    margin-bottom: 0px!important;

}

 .menu a{
	font-size: 12px!important;
}
.pt1{
	padding-top: 1%!important;
}
.active::after {

    content: ""!important;

}
.footer_bottom_holder{
	padding-bottom: 0px!important;
}
.footer_bottom {

    padding-top: 0px!important;

}
.box_shadow{
box-shadow: 0px 1px 1.49px .51px rgba(40, 40, 40, 0.04);
}
.panel p{
	font-size: 13px!important;
}
.header_bottom{
height: 82px!important;
}
nav.main_menu > ul > li > a {

    line-height: 82px!important;

}
.bl1{
	border-right: 1px solid #fff!important;
}
	</style>

	<title>카카오영어.com</title>
	<script src="<?php echo base_url() ?>assets/faq_css/json2.js.download"></script>
	<link href="<?php echo base_url() ?>assets/faq_css/grey.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/faq_css/icheck.js.download"></script>
</head>

<body style="background-color: white;" cz-shortcut-listen="true">
	<div id="container-fluid">
		<script src="./assets/faq_css/search.min.js.download"></script>
		<script src="./assets/faq_css/menu.js.download"></script>
		<script>
	
		// $(document).ready(function() {
		// 	$('#modifyStudent').click(function() {
		// 		var scrollY = $(window).scrollTop();
		// 		$.ajax({
		// 			url: makeUrl('../modifyStudent.view'),
		// 			method: "GET",
		// 			dataType: "html",
		// 			success: function(msg) {
		// 				$('#light').html(msg);
		// 				scheduleCell.showBox(scrollY, common.init(), true, true);
		// 				common.init();
		// 				$(function() {
		// 					$("#postcodify_search_button").postcodifyPopUp();
		// 				});
		// 			},
		// 			error: function(request, status, error) {
		// 				alert(request.responseText);
		// 			}
		// 		});
		// 	});
			// $(".apply_test").each(function(i) {
			// 	$(this).on("click", function() {
			// 		var scrollY = $(window).scrollTop();
			// 		$.ajax({
			// 			url: makeUrl('../modifyStudent.view?mode=leveltest'),
			// 			method: "GET",
			// 			dataType: "html",
			// 			success: function(msg) {
			// 				$('#light').html(msg);
			// 				scheduleCell.showBox(scrollY, common.init(), true, true);
			// 				common.init();
			// 				$(function() {
			// 					$("#postcodify_search_button").postcodifyPopUp();
			// 				});
			// 				$('#light').css("height", "1030px");
			// 			},
			// 			error: function(request, status, error) {
			// 				//alert(request.responseText);
			// 				var win = window.open("../naverLoginRequest.do?leveltest=true", "", "width=370, height=360, resizable=no, scrollbars=no, status=no;");
			// 			}
			// 		});
			// 	});
			// });
			// $(".view_leveltest").each(function(i) {
			// 	$(this).on("click", function() {
			// 		var scrollY = $(window).scrollTop();
			// 		var lectureId = $(this).attr("data-id");
			// 		var s = {};
			// 		s["lectureId"] = lectureId;
			// 		$.ajax({
			// 			url: makeUrl('/m6/leveltestResult.view'),
			// 			method: "GET",
			// 			data: s,
			// 			dataType: "html",
			// 			success: function(msg) {
			// 				$('#light').html(msg);
			// 				scheduleCell.showBox(scrollY, common.init(), true, true);
			// 				if(!pc) $('#light').css("height", "1260px");
			// 				else $('#light').css("height", "1560px");
			// 				$(".toggleBtn").parent().toggleClass("open");
			// 			},
			// 			error: function(request, status, error) {
			// 				alert(request.responseText);
			// 			}
			// 		});
			// 	});
			// });
			/*$(".apply_test").click(function() {

			});*/
		// });
		</script>
		<style type="text/css">
		.teacher_box {
			min-height: 235px;
			box-shadow: 8px 8px 10px 2px #888888;
			border: 1px solid #c0c0c0;
			border-top: 4px solid #a70920;
			margin: 10px;
		}
		
		.mt25 {
			margin-top: 25px;
		}
		
		.btn-profile-video {
			padding: 5px;
			margin: 10px 4px;
			font-size: 15px;
			font-weight: 600px;
			font-family: lato;
		}
		
		.btn-profile-video:hover {
			color: #ffffff;
			background-color: #ff003f;
		}
		
		.btn-profile-video {
			background-color: #ff3366;
			color: #ffffff;
			border-radius: 25px 25px 25px 25px!important;
			padding: 8px 20px 8px 20px;
			border: #ff3366;
		}
		
		.btn-schedule {
			padding: 5px;
			margin: 10px 4px;
		}
		.border0{
			border:none!important;
		}
		.btn-schedule:hover {
			color: #ffffff;
			background-color: #ff003f;
		}
		
		.btn-schedule {
			background-color: #ff3366;
			color: #ffffff;
			border-radius: 25px 25px 25px 25px!important;
			padding: 8px 20px 8px 20px;
			border: #ff3366;
		}
		
		.btn-schedule-white {
			background-color: #ffffff!important;
			color: #FF003F!important;
			border-radius: 25px 25px 25px 25px!important;
			padding: 8px 20px 8px 20px;
			border: #ff3366;
			font-weight: 600;
			font-size: 15px;
			font-family: lato;
		}
		
		.col-custom {
			margin-top: 20px;
			margin-bottom: 20px;
			border: 2px solid rgba(30, 30, 30, 0.03);
			box-shadow: 0 15px 30px 0 rgba(30, 30, 30, 0.03);
			transition: all 0.6s;
		}
		
		.teachers_list {
			margin: 10px;
			box-shadow: 8px 8px 10px 2px #888888;
		}
		
		.teacher_box1 {
			border-bottom: 1px solid gainsboro;
			padding-bottom: 15px;
		}
		
		.teacher_img_col > img {
			border-radius: 70px;
		}
		
		.pad17 {
			padding: 17px;
		}
		
		.pl20 {
			padding-left: 20px;
		}
		
		.pl5 {
			padding-left: 5px;
		}
		
		.pad10 {
			padding: 10px;
		}
		
		.h200 {
			height: 200px;
		}
		
		.h100p {
			height: 100%;
		}
		
		.h25p {
			height: 25%;
		}
		
		.h50p {
			height: 50%;
		}
		
		.pad5 {
			padding: 5px;
		}
		
		#html5-watermark {
			display: none !important;
		}
		
		.text-left {
			text-align: left !important;
		}
		
		.control-label {
			margin-top: 20px!important;
		}
		
		.hdr1 {
			background: 0 0;
			border: 0;
			margin: 0;
			padding: 0;
			vertical-align: baseline;
			outline: 0;
		}
		
		.bg-clr {
			background-color: #75C7E4;
		}
		
		.fnt-white {
			color: #fff;
			font-size: 15px;
			font-weight: 500;
		}
		
		.fav-box {
			position: absolute;
			right: 0px;
			font-size: 20px;
			top: 10px;
			color: #E74C3C;
		}
		
		.pl0 {
			padding-left: 0px!important;
		}
		
		.pr0 {
			padding-right: 0px!important;
		}
		
		.corner {
			border-radius: 50%!important;
		}
		
		@media (min-width: 320px) and (max-width: 767px) {
			.column2.footer_bottom_columns{
				width: 100%!important;
			}
				.font13sm{
			}
		font-size: 13px!important;
	}
			.mlr_15sm{
				margin-right: 0px!important;
				margin-left: 0px!important;
			}
			.font25sm{
				font-size: 25px!important;
			}
			.mt30sm{
	margin-top: 30px!important;
}
			.sm-text {
				font-size: 17px!important;
			}
			.sm-panel {
				padding: 7px!important;
			}
			.btn-schedule {
				margin: 0px 0px!important;
				padding: 5px 5px 5px 5px;
				font-size: 12px!important;
			}
			.btn-profile-video {
				margin: 0px 0px!important;
				padding: 5px 5px 5px 5px;
				font-size: 12px!important;
			}
			.pl5 {
				padding-left: 5px!important;
			}
		}
		.mb0{
			margin-bottom: 0px!important;
		}
		@media (min-width: 768px) and (max-width: 2000px) {
			.pl150 {
				padding-left: 150px;
			}
		}
		</style>

	
		
			<div id="container-fluid">
				
				<link href="<?php echo base_url(); ?>assets/faq_css/grey(1).css" rel="stylesheet">
				<script src="<?php echo base_url(); ?>assets/faq_css/icheck.js(1).download"></script>
				<script>
				// $(document).ready(function() {
				// 	$('.search-method').iCheck({
				// 		checkboxClass: 'icheckbox_minimal-grey',
				// 		radioClass: 'iradio_minimal-grey',
				// 		increaseArea: '50%'
				// 	});
				// 	$('#checkAll').change(function() {
				// 		if($('#checkAll:checked').length == 1) {
				// 			$.each($('.manageCheck'), function(index, value) {
				// 				value.checked = true;
				// 			})
				// 		} else {
				// 			$.each($('.manageCheck'), function(index, value) {
				// 				value.checked = false;
				// 			})
				// 		}
				// 	})
				// })
				</script>
				<style>
					/*.panel.mb0{
						padding: 0px 18px!important;
					}*/
				.accordion {
					background-color: #F4F4F4!important;
					color: #444;

cursor: pointer;

padding: 8px;

width: 100%;

border: none;

text-align: left;

outline: none;

font-size: 14px;

transition: 0.4s;
				}
				
				/*.active,*/
				.accordion:hover {
					background-color: #ccc;
				}
				
				.accordion:after {
					content: '\002B';
					color: #000;
					font-weight: bold;
					float: right;
					margin-left: 5px;
					margin-top: -18px;
					font-size: 17px;
				}
				
				.active:after {
					content: "\2212";
				}
				

				.modal-backdrop{
				    z-index: 9;
				}
				
				.panel {
					/*padding: 0px 18px;*/
					background-color: white;
					/*display:none;*/
					overflow: hidden;
					transition: max-height 0.2s ease-out;
				}
				
				#notifyBoardTable thead tr th {
					height: 34px !important;
					border: none !important;
					padding: 0 !important;
					text-align: center;
				}
				
				#notifyBoardTable tbody tr:last-of-type td {
					border: none !important;
				}
				
				#notifyBoardTable td {
					padding: 0 !important;
					height: 36px !important;
					border-top: none !important;
				}
				
				.search-method {
					float: left;
				}
				
				.search_check {
					float: left;
					overflow: hidden;
				}
				
				.iradio_minimal-grey {
					float: left;
				}
				
				.text-center {
					text-align: center;
				}
				
				.brdr {
					border: thin solid #dadce0;
					
				}
				
				.mb20 {
					margin-bottom: 20px;
				}
				
				.plr0 {
					padding-right: 0px!important;
					padding-left: 0px!important;
				}
				
				.p10 {
					padding: 10px;
				}
				.mb10{
					margin-bottom: 12px!important;
				}
				.mt40{
					margin-top: 40px!important;
				}
				.mb_3{
					margin-bottom: -3px!important;
				}
				footer{
					bottom: 0;
					/*position: fixed;*/
				}
				#menu-footer-new-menu li {

    margin-right: 12px !important;

}ul, ol {

    margin-left: 0px !important;
    margin-bottom: 0px !important;

}
.mt60{
	margin-top: 60px!important;
}
.bg898989{
	background: #898989;
	color: #fff
}
.centered {
  position: absolute;
top: 60%;
left: 20%;
  transform: translate(-50%, -50%);
  font-size: 50px;
color: #000;
font-family: Typo_DodamM;
}	
	.cont{
		  position: relative;
  text-align: center;
  color: white;
	}
				</style>
				
				    	<?php if($this->session->flashdata('success'))
					{ ?> 
						<script>
							jQuery(document).ready(function(){
							  
							//	toasterOptions();
							//	toastr.success("<?php echo $this->session->userdata('success'); ?>");
							///toastr.warning('Warning')
							toastr.success("Your message successfully sent");



							});

						</script>
						<?php  
					}
					?>
					<?php if($this->session->flashdata('danger'))
					{ ?> 
						<script>
							jQuery(document).ready(function(){
								// toasterOptions();
								// toastr.success("<?php echo $this->session->userdata('danger'); ?>");
								toastr.warning("Some thing went wrong");
							});

						</script>
						<?php  
					}
					?>
				

				<?php
				if(!empty($this->uri->segment(3))) {
				$title = $this->uri->segment(3);
			}
			else{
				$title = $this->uri->segment(2);
			}
				
				?>
				<?php $role = get_user_role();  ?>
				
				
				
				<div class="container-fluid plr0">
					<div class="vc_single_image-wrapper vc_box_border_grey mt_50_lg cont">
									<img width="2357" height="630" src="<?php echo base_url(); ?>assets/faq.jpg" class="vc_single_image-img attachment-full" alt="" >
									<div class="centered text-uppercase"><?php if($title == 'qa'){ echo "Q & A"; }else{echo $title; } ?> </div>
								</div>
				</div>
				
				<div class="container">
				    <br/><br/><br/>
				    <?php 	if(!empty($_GET['notify_id'])){ ?>
				    <div class="col-lg-12">
				        <div class="row">
				            <hr style="height:2px; background-color:gray"/>
				        </div>
				        <div class="row">
				             <div class="col-lg-2" style="border-bottom:1px solid gray; border-right:1px solid gray; padding:8px;">
				                <center>Title</center>
				             </div>
				             <div class="col-lg-5" style="border-bottom:1px solid gray;padding:8px;">
				                 <?php echo $notify_rec->title; ?>
				             </div>
				             <div class="col-lg-3" style="border-bottom:1px solid gray;padding:8px;">
				                  Date 
				             </div>
				             <div class="col-lg-2" style="border-bottom:1px solid gray;padding:8px;">
				                  Views
				             </div>
				        </div>
				        <div class="row">
				             <div class="col-lg-2" style="border-bottom:1px solid gray; border-right:1px solid gray;padding:8px;">
				                <center>Author</center>
				             </div>
				             <div class="col-lg-5" style="border-bottom:1px solid gray;padding:8px;">
				                   <?php $name = get_author($notify_rec->sender_id);?>
				                   <?php echo $name->full_name; ?> 
				             </div>
				              <div class="col-lg-3" style="border-bottom:1px solid gray;padding:8px;">
				                  <?php echo $notify_rec->created; ?> 
				             </div>
				             <div class="col-lg-2" style="border-bottom:1px solid gray;padding:8px;">
				                  <?php echo $notify_rec->views; ?> 
				             </div>
				        </div>
				    </div>
				    <div class="col-lg-12">
				        &nbsp;
				    </div>
				    <div class="col-lg-12">
				        &nbsp;
				    </div>
				     <div class="col-lg-12">
				         <p style="line-height:3; font-size:14px;">
				             <?php echo $notify_rec->description; ?> 
				         </p>
				     </div>
				      <div class="col-lg-12">
								<hr style="background-color:rgb(192,192,192); color:gray; height:1px;" />           
					    </div>
					 	<?php 	if($notify_rec->receiver == "public")	{ ?>
					 	
					 	<?php $reply = get_replys_data($notify_rec->notify_id);
									    if(!empty($reply)){
									        foreach($reply as $values){    ?>
				     <div class="col-lg-12">
				         <div class="row">
				              <div class="col-lg-2">
				                  <img src="<?php echo base_url(); ?>assets/profile.jpg" width="120" />
				              </div>
				               <div class="col-lg-10">
				                   <p style="font-size:13px; color:gray"><?php echo $values->sender ?> <small>&nbsp;&nbsp;(<?php echo $values->reply_date ?>)</small></p>
				                   <p><?php echo $values->n_answer ?></p>
				               </div>
				         </div>
				     </div>
				     
				        <div class="col-lg-12">
								<hr style="background-color:rgb(192,192,192); color:gray; height:1px;" />           
					    </div>
					     <?php }}
            				if($role != 'teacher'){
            				
                                    if($qa == 'student' || $role == 'admin' || $qa == 'reviews'){
                                       
            						if(is_user_logged_in()){ 
            							$reviwe = "";
            							$checkrole = true;
            						if($qa == 'reviews'){ 
            							  $reviwe = check_review($notify_rec->notify_id);
            							    if($role == 'student'){$checkrole = false;}
            						}
            					if($reviwe == "" && $checkrole){
								?>
								<div class="col-lg-12">
									<div class="row ">
										<div class="col-md-12">
											<form method="POST" action="<?php echo base_url()."notifications/answer"; ?>">
												<textarea class="form-control m0 reply" id="summernote" name="n_answer" rows="3" cols="4"></textarea>
												
												<input type="hidden" name="notify_id"  value="<?php echo $notify_rec->notify_id; ?>">
												<input type="hidden" name="sender"  value="<?php echo get_user_name(); ?>">
												<input type="hidden" name="role"  value="<?php echo $role; ?>">
												<br/>
												<button type="submit" class="btn btn-success pull-right">Submit</button>
											</form>
										</div>
										<!--<div class="col-md-2">-->
											
										<!--		<button class="btn btn-info" onclick="reply(this);" style="margin-bottom: 12px;">Reply</button>-->
											
										<!--</div>-->
									</div>
						        </div>
						        	<?php   } } } }?>
                            <?php } ?>
				    <?php  }?>
					<div class="row">
						<div class="col-md-12 text-center mt-5 mt30sm">
							<h1 class="mb20 font25sm">How can we help you?</h1> </div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row mlr_15sm brdr mb20 p10 bg898989">
								<div class="col-md-1 bl1 text-center col-sm-1 col-xs-1 font13sm"> <input type="checkbox" re href="#select_all" name=""> </div>

								<div class="col-md-5 bl1 text-center col-sm-4 col-xs-4 font13sm"> Title </div>
								<div class="col-md-3 bl1 text-center col-sm-3 col-xs-3 font13sm"> Sender </div>
								<div class="col-md-2  text-center col-sm-5 col-xs-5 font13sm"> Created Date </div>
								<div class="col-md-1  text-center col-sm-5 col-xs-5 font13sm"> Views </div>
							</div>
						</div>
					</div>
				
					
				   
					<?php foreach ($notifications as $key => $value) { ?>
					
		<?php
		if(empty($this->session->userdata("user_session")))
		{
			$c_user = "";
		}else
		{
			$c_user = get_user_id();
		}
		
			if($value->receiver == "private" && $role != "admin")
			{	
				if($value->sender_id == $c_user)
				{
					$disable = "";
				}
				else
				{
					$disable = "disabled";
				}
				
			}else
			{
				$disable = "";
			}
			$created_date =date_create($value->created);
			$formatedDate =  date_format($created_date,"j F/y");
		?>
					<div class="row mlr_15sm brdr mb10 border0" >
						<div class="col-md-12 plr0" >
							<button class="accordion mb_3"  <?php echo $disable; ?>>
								<div class="">
									<div class="col-md-1 col-xs-1 text-center font13sm"><input type="checkbox"  name="numbers[]"></div>

									<div class="col-md-5 col-xs-4  font13sm"><a href="<?php echo base_url(); ?>home/notification/<?php echo end($this->uri->segment_array()); ?>?notify_id=<?php echo $value->notify_id; ?>" onclick="read_status('<?php echo $value->notify_id; ?>')"> <?php echo $value->title; ?></a></div>
									<div class="col-md-3 col-xs-3  font13sm text-center"><?php echo $value->full_name; ?> </div>
									<div class="col-md-2 col-xs-5  font13sm text-center"><?php echo $formatedDate; ?></div>
									<div class="col-md-1 col-xs-5  font13sm text-center"><?php echo $value->views; ?></div>
								</div>
							</button>

						
						</div>
					</div>
<?php } ?>
					
				</div>
			</div>
			
			<div style="height:300px;"></div>

		
		
	</div>
     <script>
         jQuery(document).ready(function() {
              jQuery('#summernote').summernote({
                height: "200px",
                lang: 'ko-KR',
                callbacks: {
                   onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], jQuery(this), welEditable);
                   }
                },

            });
            });
     </script>       
     <script>
         
          function sendFile(file, editor, welEditable) {
           // alert("aaaaaa");
          //console.log(editor);
            data = new FormData();
            data.append("file", file);
            jQuery.ajax({
                data: data,
                type: "POST",
                url: "<?php echo base_url() ?>notifications/uploadsummerfile",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    jQuery("#summernote").summernote("insertImage",url);
                    //editor.insertImage(welEditable, url);
                }
            });
        
        }
         
     </script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/faq_css/eModal.js.download"></script>
	<script type="text/javascript">
	function privacy() {
		eModal.iframe({
			url: '../main/privacy.jsp',
			size: 'lg',
			loading: false,
			buttons: {
				close: true
			},
			title: '개인정보취급방법'
		});
	}

	function rule() {
		eModal.iframe({
			url: '../main/rule.jsp',
			size: 'lg',
			loading: false,
			buttons: {
				close: false
			},
			title: '이용약관'
		});
	}
	</script>
	<script>
	var acc = document.getElementsByClassName("accordion");
	var i;
	for(i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			//	$(".panel.mb0").css("height", "auto");
		//	$(".panel.mb0").css({ height:10 })
			var mb0 = this.nextElementSibling;
			
			var panel = this.nextElementSibling;
			
			if(mb0.style.padding) {
			    	mb0.style.padding = null;
		    		mb0.style.marginTop= null;
				  mb0.style.boxShadow="0px 2px 8px 1px rgba(192,192,192,1)";
				panel.style.display = "none";
			} else {
				mb0.style.padding="20px 18px";
				mb0.style.marginTop="20px";
				mb0.style.boxShadow="0px 2px 8px 1px rgba(192,192,192,1)";
				panel.style.display = "block";
				//$(panel).slideDown();
			}

			if(panel.style.minHeight) {
			
			//	panel.style.minHeight = null;
			} else {
			//	panel.style.minHeight = "1000px";
			
			}
		});
	}
	
	function read_status(id){
	    
        	         var base_url = '<?php echo base_url(); ?>';
        			 jQuery.ajax({
        			    url: base_url+'home/readstatus',
        			    data:{id:id},
        			    type: "post",
        			    success:function(res){
        			    	//alert(res);
        			    }
        
        			  });
	          
	      
		}
	</script>



	<script type="text/javascript">
	jQuery(document).ready(function(){
   
        // Select all
        jQuery("A[href='#select_all']").click( function() {
            jQuery("#" + jQuery(this).attr('rel') + " INPUT[type='checkbox']").attr('checked', true);
            return false;
        });
		
	jQuery(".reply").hide();
	jQuery(".submit-btn").hide();


})

	function reply(ele)
	{
		jQuery(ele).parent().prev().find(".reply").toggle();
		jQuery(ele).parent().prev().find(".submit-btn").toggle();
		// $(".reply").toggle();
		// $(".submit-btn").toggle();
	}
	</script>
	
	</div>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/faq_css/search.css">
</body>
<loom-container id="lo-engage-ext-container">
	<loom-shadow classname="resolved"></loom-shadow>
</loom-container>
    
     
</html>

<?php get_footer(); ?>


     
   

