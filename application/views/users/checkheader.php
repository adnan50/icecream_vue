 <?php require ('../wp-blog-header.php'); ?>
<?php get_header(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<script src="<?php echo base_url() ?>assets/faq_css/jquery-1.9.1.js.download"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/faq_css/jquery.banner.js.download"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/faq_css/jquery.preload.min.js.download"></script>
	<script src="<?php echo base_url() ?>assets/faq_css/jquery-ui.js.download"></script>
	<script src="<?php echo base_url() ?>assets/faq_css/bootstrap.js.download"></script>
	<script src="<?php echo base_url() ?>assets/faq_css/common.js.download"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faq_css/match.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faq_css/popup.css">
	<script src="<?php echo base_url() ?>assets/faq_css/scheduleCell.js.download"></script>
	<link href="<?php echo base_url() ?>assets/faq_css/common(1).css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url() ?>assets/faq_css/json2.js.download"></script>
	<link href='<?php echo base_url() ?>assets/apps/css/stylesheet.min.css' id='stylesheet-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/style_dynamic.css' id='style_dynamic-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/responsive.min.css' id='responsive-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/style_dynamic_responsive.css' id='style_dynamic_responsive-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/js_composer.min.css' id='js_composer_front-css' media='all' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url() ?>assets/apps/css/custom_css.css' id='custom_css-css' media='all' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url() ?>assets/apps/scripts/jquery1.js' type='text/javascript'>
	</script>

	<style type="text/css">
	@font-face {
		font-family: Typo_DodamM;
		src: url('<?php echo base_url(); ?>/assets/fonts/Typo_DodamM.ttf');
	}
	
	body {
		font-family: Typo_DodamM!important;
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
		(function(a, b) {
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) window.location = b
		})(navigator.userAgent || navigator.vendor || window.opera, redirectUrl);
		$(document).ready(function() {
			$('#modifyStudent').click(function() {
				var scrollY = $(window).scrollTop();
				$.ajax({
					url: makeUrl('../modifyStudent.view'),
					method: "GET",
					dataType: "html",
					success: function(msg) {
						$('#light').html(msg);
						scheduleCell.showBox(scrollY, common.init(), true, true);
						common.init();
						$(function() {
							$("#postcodify_search_button").postcodifyPopUp();
						});
					},
					error: function(request, status, error) {
						alert(request.responseText);
					}
				});
			});
			$(".apply_test").each(function(i) {
				$(this).on("click", function() {
					var scrollY = $(window).scrollTop();
					$.ajax({
						url: makeUrl('../modifyStudent.view?mode=leveltest'),
						method: "GET",
						dataType: "html",
						success: function(msg) {
							$('#light').html(msg);
							scheduleCell.showBox(scrollY, common.init(), true, true);
							common.init();
							$(function() {
								$("#postcodify_search_button").postcodifyPopUp();
							});
							$('#light').css("height", "1030px");
						},
						error: function(request, status, error) {
							//alert(request.responseText);
							var win = window.open("../naverLoginRequest.do?leveltest=true", "", "width=370, height=360, resizable=no, scrollbars=no, status=no;");
						}
					});
				});
			});
			$(".view_leveltest").each(function(i) {
				$(this).on("click", function() {
					var scrollY = $(window).scrollTop();
					var lectureId = $(this).attr("data-id");
					var s = {};
					s["lectureId"] = lectureId;
					$.ajax({
						url: makeUrl('/m6/leveltestResult.view'),
						method: "GET",
						data: s,
						dataType: "html",
						success: function(msg) {
							$('#light').html(msg);
							scheduleCell.showBox(scrollY, common.init(), true, true);
							if(!pc) $('#light').css("height", "1260px");
							else $('#light').css("height", "1560px");
							$(".toggleBtn").parent().toggleClass("open");
						},
						error: function(request, status, error) {
							alert(request.responseText);
						}
					});
				});
			});
			/*$(".apply_test").click(function() {

			});*/
		});
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
		
		@media (min-width: 768px) and (max-width: 2000px) {
			.pl150 {
				padding-left: 150px;
			}
		}
		</style>

		<div id="light" class="white_content"></div>
		<div id="fade" class="black_overlay"></div>
		<div id="wrap">
			<div id="container-fluid">
				
				<link href="<?php echo base_url(); ?>assets/faq_css/grey(1).css" rel="stylesheet">
				<script src="<?php echo base_url(); ?>assets/faq_css/icheck.js(1).download"></script>
				<script>
				$(document).ready(function() {
					$('.search-method').iCheck({
						checkboxClass: 'icheckbox_minimal-grey',
						radioClass: 'iradio_minimal-grey',
						increaseArea: '50%'
					});
					$('#checkAll').change(function() {
						if($('#checkAll:checked').length == 1) {
							$.each($('.manageCheck'), function(index, value) {
								value.checked = true;
							})
						} else {
							$.each($('.manageCheck'), function(index, value) {
								value.checked = false;
							})
						}
					})
				})
				</script>
				<style>
				.accordion {
					background-color: #eee;
					color: #444;
					cursor: pointer;
					padding: 18px;
					width: 100%;
					border: none;
					text-align: left;
					outline: none;
					font-size: 15px;
					transition: 0.4s;
				}
				
				.active,
				.accordion:hover {
					background-color: #ccc;
				}
				
				.accordion:after {
					content: '\002B';
					color: #777;
					font-weight: bold;
					float: right;
					margin-left: 5px;
				}
				
				.active:after {
					content: "\2212";
				}
				
				.panel {
					padding: 0 18px;
					background-color: white;
					max-height: 0;
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
					border-radius: 8px;
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
				</style>
				<div style="height:9px;"></div>
				<!--  -->
				<!--  -->
				<div style="overflow: hidden; height: 39px;">
					<div style="overflow: hidden;  width: 955px; margin: 0 auto;"> </div>
				</div>
			
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="mb20">How can we help you?</h1> </div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row brdr mb20 p10">
								<div class="col-md-8 col-sm-8 "> Title </div>
								<div class="col-md-2 col-sm-2"> Sender </div>
								<div class="col-md-2 col-sm-2"> Created Date </div>
							</div>
						</div>
					</div>
					<?php if($this->session->flashdata('success'))
					{ ?> 
						<script>
							$(document).ready(function(){
								toasterOptions();
								toastr.success("<?php echo $this->session->userdata('success'); ?>");


							});

						</script>
						<?php  
					}
					?>
					<?php if($this->session->flashdata('danger'))
					{ ?> 
						<script>
							$(document).ready(function(){
								toasterOptions();
								toastr.success("<?php echo $this->session->userdata('danger'); ?>");
							});

						</script>
						<?php  
					}
					?>
					<?php $role = get_user_role();  ?>
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
					<div class="row brdr">
						<div class="col-md-12 plr0">
							<button class="accordion" <?php echo $disable; ?>>
								<div class="">
									<div class="col-md-8"><?php echo $value->title; ?></div>
									<div class="col-md-2"><?php echo $value->full_name; ?> </div>
									<div class="col-md-2"><?php echo $formatedDate; ?></div>
								</div>
							</button>
							<div class="panel">
								<p><?php echo $value->description; ?></p>

								<?php 
								if($value->receiver == "public" || $role == "admin")
								{
									if(!empty($value->n_answer)){ ?>
										<h5>Answer <small>By: Admin (<?php echo $value->reply_date ?>)</small></h5>
										<p style="margin-top: 7.5px; margin-bottom: 7.5px;"><?php echo $value->n_answer; ?> </p>

									<?php }
								}
								if(is_user_logged_in() && $role == "admin" && empty($value->n_answer) ){ 
									if($value->public_type  == 3 || $value->public_type == 4){ ?>
								
									<div class="row">
										<div class="col-md-10">
											<form method="POST" action="<?php echo base_url()."notifications/answer"; ?>">
												<textarea class="form-control m0 reply" name="n_answer" rows="3" cols="4"></textarea>
												<button type="submit" class="btn btn-success submit-btn" style="float: right; margin-top: 12px;">Submit</button>
												<input type="hidden" name="notify_id"  value="<?php echo $value->notify_id; ?>">
											</form>
										</div>
										<div class="col-md-2">
											
												<button class="btn btn-info" onclick="reply(this);" style="margin-bottom: 12px;">Reply</button>
											
										</div>
									</div>
								<?php  }} ?>
							</div>	
						</div>
					</div>
<?php } ?>
					
				</div>
			</div>
			<div style="height:9px;"></div>
			<!--  -->
			<!--  -->
			<div style="overflow: hidden; height: 39px;">
				<div style="overflow: hidden;  width: 955px; margin: 0 auto;"> </div>
			</div>
			<div style="height:20px;"></div>
		</div>
	</div>
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
			var panel = this.nextElementSibling;
			if(panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
	</script>



	<script type="text/javascript">
			$(document).ready(function(){
	
	$(".reply").hide();
	$(".submit-btn").hide();

})

	function reply(ele)
	{
		$(ele).parent().prev().find(".reply").toggle();
		$(ele).parent().prev().find(".submit-btn").toggle();
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