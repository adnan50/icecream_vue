<!--  <?php// require ('../wp-blog-header.php'); ?>

<?php//get_header(); ?>
<?php// wp_head(); ?> -->
	<head>
	<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href='<?php echo base_url(); ?>assets/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
	<!-- <link href='<?php echo base_url(); ?>assets/custom.css' rel='stylesheet' /> -->
	<link href="<?php echo base_url(); ?>assets/apps/css/style.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/fullcalendar/js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/html5lightbox/html5lightbox.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  	<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  	<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">


	<!-- vuejs -->
	<script src='<?php echo base_url() ?>assets/vuejs/vue.js' type='text/javascript'></script>
	<script src='<?php echo base_url() ?>assets/vuejs/customvue.js' type='text/javascript'></script>

  	<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>



<?php
	//$role= get_user_role(); 
	?>
	<style type="text/css">

	@font-face {

		font-family: Typo_DodamM;

src: url('<?php echo base_url(); ?>/assets/fonts/Typo_DodamM.ttf');	}

	body{font-family: Typo_DodamM!important;}

.mt_50
	{
		margin-top: -50px!important;
	}

.teacher_box{

	min-height: 235px;

	box-shadow: 8px 8px 10px 2px #888888;

	border: 1px solid #c0c0c0;

	border-top: 4px solid #a70920;

	margin: 10px;

}

.mt25{

	margin-top: 25px;

}

.custom_button{

	padding: 5px;

	margin: 10px 4px;

	padding: 5px;

	margin: 10px 4px;

	font-size: 15px;

	font-weight: 600px;

	font-family: lato;

}

.custom_button:hover{

	color: #ffffff;

	background-color: #ff003f;

}

.custom_button{

	background-color: #ff3366;

	color:#ffffff;

	border-radius: 25px 25px 25px 25px!important;

	padding: 8px 20px 8px 20px;

	border:#ff3366;

}

.btn-schedule-1 {



	padding: 5px;

	margin: 10px 4px;



}
.font13{
	font-size: 13px!important;
}

.btn-schedule {

	color: #ff003f !important;

	border: 2px solid #ff003f;

	background-color: #fff;



	border-radius: 25px 25px 25px 25px!important;

	padding: 8px 20px 8px 20px!important;

	padding: 5px;

	margin: 10px 4px;



}



.btn-schedule-1{color: #ff003f !important;

	font-weight: 600;

	background-color: #fff;

	font-family: lato;

	margin-top: 15px;

	border-radius: 25px 25px 25px 25px!important;

	padding: 8px 20px 8px 20px;}

}



.btn-schedule{

	color: #ff003f !important;

	border: 2px solid #ff003f;

	background-color: #fff;



	border-radius: 25px 25px 25px 25px!important;

	padding: 8px 20px 8px 20px;



}

.btn-schedule-1:hover{ color: #ffffff!important;

	background-color: #ff003f;

	border: none!important;}

	.btn-schedule:hover{

		color: #ffffff!important;

		background-color: #ff003f;

		border: 2px solid #ff003f;



	}



	.btn-schedule-white{



		background-color: #ffffff!important;

		color:#FF003F!important;

		border-radius: 25px 25px 25px 25px!important;

		padding: 8px 20px 8px 20px;

		border:#ff3366;

		font-weight: 600;

		font-size: 15px;

		font-family: lato;

	}

	.media-heading{font-weight: 500;}

	.text-muted{font-size: 15px;

		color: #555;}

		.teacher-nickname{color: #000;}

		.col-custom{



			height: 100%;

			padding: 25px 40px;

			margin: 20px auto 20px;

			background-color: #fff;

			font-family: lato;

			/*border: 2px solid rgba(30,30,30,0.03);*/

			box-shadow: rgba(62, 63, 65, 0.135) 0px 2px 6px;



		}



		.teachers_list{

			margin: 10px; box-shadow: 8px 8px 10px 2px #888888; 

		}



		.teacher_box1{

			border-bottom: 1px solid gainsboro; padding-bottom: 15px;

		}





		.teacher_img_col > img{

			border-radius:70px; 

		}



		.pad17{



			padding: 17px;

		}



		.pl20{

			padding-left: 20px;

		}

		.pl5{

			padding-left: 5px;

		}



		.pad10{

			padding: 10px;

		}



		.h200{



			height: 200px;

		}

		.h100p{

			height: 100%;

		}

		.h25p{

			height: 25%;

		}



		.h50p{

			height: 50%;

		}

		.pad5{

			padding: 5px;

		}





		#html5-watermark{

			display: none !important;

		}

		.text-left{

			text-align: left !important;

		}

		.control-label {

			margin-top: 20px!important;

		}

		.html5-elem-box{background-color: transparent!important;

			height: auto!important;}

			.hdr1{

				background: 0 0;

				border: 0;

				margin: 0;

				padding: 0;

				vertical-align: baseline;

				outline: 0;

			}

			.bg-clr{

				background-color: #75C7E4;

			}

			.fnt-white{

				color: #fff;

				font-size: 15px;

				font-weight: 500;

			}

			.fav-box{

				position:absolute; 

				right:0px; 

				font-size:20px; 

				top:10px; 

				color:#E74C3C;

			}

			.custom_image{



				width: 75px;

				height: 75px;
                margin-left:10px;
				border: 2px solid rgba(30,30,30,0.03);}
                
				.pl0{

					padding-left: 0px!important;

				}

				.pr0{

					padding-right: 0px!important;

				}

				.corner{

					border-radius: 50%!important;

				}

				@media (min-width: 320px) and (max-width: 767px){
				    .centered {
    position: absolute;
    top: 25%!important;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 30px!important;
    color: #000;
    font-family: Typo_DodamM;
    width:100%;
}
.centered1 {
    width:100%;
    position: absolute;
    top: 68%!important;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 15px!important;
    color: #000;
    font-family: Typo_DodamM;
    line-height: 36px;
}
					.plr10sm{
						padding-left: 10px!important;
						padding-right: 10px!important;
					}
					.sm-text{

						font-size: 17px!important;

					}

					.sm-panel{

						padding: 7px!important;

					}

					.btn-schedule{

						margin: 0px 0px!important;

						padding: 5px 5px 5px 5px;

						font-size: 12px!important;

					}

					.custom_button{

						margin: 0px 0px!important;

						padding: 5px 5px 5px 5px;

						font-size: 12px!important;



					}

					.pl5{

						padding-left: 5px!important;

					}





				}

				.mt_72{

					margin-top: -72px!important;

				}

				@media (min-width: 768px) and (max-width: 2000px){

					.pl150{

						padding-left: 150px;



					}
					.mt_50_lg{
						margin-top: -50px!important;
					}

				}

				.navbar_custom, .nav > li > a:hover, .nav > li > a{font-size: 15px!important;font-family: lato!important;

					font-weight: 600!important;}



					.navbar_custom, .nav > li > a:hover, .nav > li > a:focus{color: #fafafa!important;

						background-color: transparent!important;}

					



						/*Custom */

						ul, ol {



    margin-left: 0px !important;

    margin-bottom: 0px !important;



}

						#menu-footer-new-menu li {



    margin-right: 12px !important;



}

					/*footer{

					bottom: 0;

					position: fixed;

								}*/

				.menu a {

					 font-size: 12px !important;

   					}

   					.modal-backdrop{

   						display: none;

   					}
   					body.modal-open {
    overflow: hidden;
}
.modal-open {
    overflow: hidden;
}
.fc-center h2{
	font-size: 22px!important;
}


</style>





<script type="text/javascript">



	let base_url = "<?php echo base_url() ?>";



</script>



<style type="text/css">
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;
color: #000;
font-family: Typo_DodamM;
}	
.centered1{
  position: absolute;
  top: 62%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 22px;
color: #000;
font-family: Typo_DodamM;
}	
	.cont{
		  position: relative;
  text-align: center;
  color: white;
	}
					</style>

					



				</head>





				<body>

<div class="wrapper" style="background-color: #fcfcfc">

							<div class="wrapper_inner">

								<div class="vc_single_image-wrapper vc_box_border_grey mt_50_lg cont">
									<img width="2357" height="630" src="http://www.icecreamenglish.com/wp-content/uploads/2019/02/shutterstock_1018615174.jpg" class="vc_single_image-img attachment-full" alt="" >
									<div class="centered">선생님 리스트</div>
									<div class="centered1">튜터의 발음과 학력을 전부 공개합니다.<br>원하는 강사와 시간을 직접 선택하세요.</div>
								</div>

								<div class="container">
										<div class="row" style="margin-top: 40px; margin-bottom:  60px;">
										<?php

										if(!empty($teachers)){

										foreach ($teachers as $key => $value) {



											?>


									





									
											<div class="col-md-6">

												<div class="panel-body is-relative sm-panel  col-custom">

													<div class="row">

														<div class="col-xs-4 col-md-3 col-lg-3 pl0 pr0 is-relative pl10sm" onclick="event.stopPropagation()||(event.cancelBubble = true)">

															<div class="item-icon item-icon-relative">

																<div class="online-layout1">

																	<div class="offline online " title="Online"></div>

																	<?php

																	if(!empty($value->profile_image))

																	{

																		$image = $value->profile_image;

																	}

																	else

																	{

																		$image = "default_avatar.png";

																	}

																	?>

																</div><img alt="" border="0" class="rounded corner custom_image" src="<?php echo base_url().PROFILE_IMAGE_UPLOAD_PATH.$image; ?>" width="250">

															</div>

														</div>

														<!-- 	 <div class="fav-box"><i class="fa fa-heart" aria-hidden="true"></i></div> -->

														<div class="col-xs-8 col-md-9 col-lg-9 pl0">

															<ul class="media-heading list-inline">

																<li>

																	<a class="teacher-nickname text-lg sm-text"><?php echo $value->full_name; ?></a>

																</li>

															</ul>

								

								

								<p class="text-muted hidden-phone">

									<?php echo $value->competency; ?>	

								</p>

									

 <ul class="list-inline hidden-phone" onclick="event.stopPropagation()||(event.cancelBubble = true)">

 	<li>

 		<button   data-id="<?php echo $value->id ?>" data-teacher="<?php echo $value->full_name; ?>" class="btn btn-info btn-schedule"><?php echo $this->lang->line('view_schedule'); ?></button>

 	</li>

 	<?php

 	if (isset($value->profile_video) && !empty($value->profile_video)) {

 		?>

 		<li>



 			<a href="<?php echo base_url().PROFILE_VIDEO_UPLOAD_PATH.$value->profile_video; ?>" data-width="700" data-height="500" class="btn btn-info html5lightbox custom_button btn-profile-video" style="  border-radius: 0px" title=""><?php echo $this->lang->line('view_profile_video'); ?>



 		</a>



 	</li>

 	<?php

 }

 ?>

</ul>

								<div class="right-btn hidden-phone" onclick="event.stopPropagation()||(event.cancelBubble = true)" style="top:0; right:0">

									<!-- <button class="btn btn-xs" title="Bookmark"><i class="fa fa-heart text-sm"></i>&nbsp;Favourite</button> -->

								</div>

							</div>

							
								<div class="is-absolute visible-phone fav-btn" onclick="event.stopPropagation()||(event.cancelBubble = true)">

									<i class="fa fa-heart text-muted"></i>

								</div>

							</div>

						</div>

					</div>

					



		
			<?php

				}

			}

				?>
	</div>
		</div>

	</div>

</div>

</div>



<div id="teachers_calender_modal" class="modal fade" role="dialog" style="z-index: 9999999999; overflow-y: scroll;">

	<div class="modal-dialog modal-lg">



		<!-- Modal content-->

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title" id="title-model"> </h4>

			</div>

			<div class="modal-body">

				<div class="teachers_calender"></div>

			</div>

			<div class="modal-footer text-left">

				<div class="col-md-7">

					<button type="button" class="btn btn-primary book_slot"  style="color: #fff !important;"><?php echo $this->lang->line('enrolment'); ?></button>

<!-- 						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

-->						</div>

<div class="col-md-5 font13"><input type="checkbox" id="level_test" class="level_test" onclick="level_test();"> <?php echo $this->lang->line('level_test_book'); ?></div>

</div>

</div>



</div>

</div>

<!-- Modal -->

<div id="thankyou" class="modal fade" role="dialog">

	<div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title"><?php echo $this->lang->line('thankyou'); ?></h4>

			</div>

			<div class="modal-body">

				<p id="bookings"></p>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default close-model" data-dismiss="modal">Close</button>

			</div>

		</div>



	</div>

</div>

<script type="text/javascript">



	let user_id = "";

	let prev_event = [];

	let level_test_event = "";

	let weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

	let teacher = "";





	var date = new Date();

	var current_date = date.getFullYear()+'-'+ ("0" + (date.getMonth() + 1)).slice(-2) +'-'+ ("0" + date.getDate()).slice(-2)

	//date.setDate(date.getDate() + 7);

	var week_date = date.getFullYear()+'-'+ ("0" + (date.getMonth() + 1)).slice(-2) +'-'+ ("0" + date.getDate()).slice(-2)



	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);

	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);



	var first_day = firstDay.toLocaleDateString();

	var last_day = lastDay.toLocaleDateString();







	function level_test() {

		var checkBox = document.getElementById("level_test");



		jQuery(".teachers_calender").fullCalendar('render');

		jQuery(".teachers_calender").fullCalendar("refetchEvents");



		prev_event = [];

		level_test_event = "";



	}



// 	function getWeekNumber(thisDate) {

// 		var dt = new Date(thisDate);

// 		var thisDay = dt.getDate();



// 		var newDate = dt;

// newDate.setDate(1); // first day of month

// var digit = newDate.getDay();



// var Q = (thisDay + digit) / 8;



// var R = (thisDay + digit) % 8;



// if (R !== 0) return Math.ceil(Q);

// else return Q;





// }

var $ = jQuery.noConflict();

jQuery(document).ready(function(){




	var calendar_settings = {



		themeSystem: 'bootstrap3',

		header:{

			left:'',

			center:'title',

			right:''

		},

		'minTime' : "06:00:00",

		'maxTime' : "24:00:00",

		defaultView: 'month',

		editable: false,

		allDaySlot: true,

		selectable: true,

		selectHelper: true,

		selectOverlap: false,

		fixedWeekCount: true,

		showNonCurrentDates: false,

		timeFormat: 'H:mm',

		visibleRange: {

			start: first_day,

			end: last_day

		},

		

		



		eventSources: [{

			url : base_url + 'home/get_calendar_data',



			data: function () {



				var params = {};



				params['user_id'] = user_id;



				return params;



			},



			type: 'POST',



			error: function () {



				console.error('There was error fetching calendar data');



			},



		},],

		titleRangeSeparator: " — ",





		eventClick: function(calEvent, jsEvent, view) {
		   
		   
			var time = calEvent.end._i;
			time = time.split("T");

			var a = new Date(time[0]);



			var day = weekday[a.getDay()];

			var date = time[0];
			
			var cur_date  = new Date();
			 cur_date = cur_date.getDate();
			 
			 if(cur_date > a.getDate()){
			     
			     		jQuery.alert({

						title: 'Error!',

						content: "You can't select old dates",

						icon: 'fa fa-cross',

						animation: 'scale',

						closeAnimation: 'scale',

						buttons: {

							ok: function () {

							}

						}

					});
			     
			     return false;
			 }
			 
		
		jQuery.ajax({

			url: base_url + "Booking/get_booking",

			data:{
			    start: calEvent.start._i,
			    end: calEvent.end._i
			},

			type: "POST",

			success: function(res){

				res = JSON.parse(res);
				if (res.hasOwnProperty("error")) {

					jQuery.alert({

						title: 'Error!',

						content: "You already have a class on this time for another teacher",

						icon: 'fa fa-cross',

						animation: 'scale',

						closeAnimation: 'scale',

						buttons: {

							ok: function () {
	                        }

						}

					});

					return false;

				}else{
				    			if(jQuery(".level_test").prop("checked") == true){



				if (level_test_event != "") {



					level_test_event.color = "#92D050";

					jQuery(".teachers_calender").fullCalendar('updateEvent',level_test_event);

				}





				calEvent.color = "#C70C27";

				calEvent.day = day;

				calEvent.date = date;

				//calEvent.week_number = week_number;

				calEvent.teacher = user_id;

				level_test_event = calEvent;



			}else if(jQuery(".level_test").prop("checked") == false){



				if (typeof calEvent.teacher === "undefined" || calEvent.teacher == "" ) {



					calEvent.color = "#C70C27";

					calEvent.day = day;

					calEvent.date = date;

					//calEvent.week_number = week_number;



					calEvent.teacher = user_id;

					prev_event.push(calEvent);

				}else{



					calEvent.color = "#92D050";

					calEvent.day = "";

					calEvent.teacher = "";

					calEvent.date = "";

					//calEvent.week_number = "";

					prev_event.pop(calEvent);



				}
				



			}



			jQuery(".teachers_calender").fullCalendar('updateEvent',calEvent);
				    
				}

			}

		});



			













		},







	}







	jQuery(".teachers_calender").fullCalendar(calendar_settings);



	jQuery(".btn-schedule").click(function(){




		// adnan
		jQuery("header,footer").css({"z-index": "0"});
		jQuery("body").css({"overflow": "hidden!important","position": "fixed"});


		user_id = jQuery(this).attr("data-id");

		teacher = jQuery(this).attr("data-teacher");



		jQuery("#teachers_calender_modal").modal("show");

		// jQuery("#title-model").html("<?php echo $this->lang->line('book'); ?> "+ teacher);
		jQuery("#title-model").html(teacher);



	})

	jQuery('#teachers_calender_modal').modal({backdrop: 'static', keyboard: false,show:false})  

jQuery(".close").click(function(){

jQuery("header,modal-footer").css({"z-index": "120"});
jQuery("body").css({"position": "inherit"});
	})




	jQuery('#teachers_calender_modal').on('shown.bs.modal', function () {



		jQuery(".teachers_calender").fullCalendar('render');

		jQuery(".teachers_calender").fullCalendar("refetchEvents");

	});



	jQuery(".book_slot").click(function(){



		console.log(prev_event);



		if(jQuery(".level_test").prop("checked") == true){



			data = {action:"level_test",events:level_test_event.event_id}



		}else{



			var events_booked = [];



			for (var i = prev_event.length - 1; i >= 0; i--) {



				var event = {availability_id:prev_event[i].event_id,date:prev_event[i].date,teacher_id:prev_event[i].teacher};



				events_booked.push(event);

			}



			events_booked = JSON.stringify(events_booked); 



			data = {action:"regular_class",events:events_booked}



		}



		jQuery.ajax({

			url: base_url + "Booking/add_booking",

			data:data,

			type: "POST",

			success: function(res){



				res = JSON.parse(res);



				if (res.hasOwnProperty("error")) {



					//alert(res.error);

					//toastr.error(res.error,"Teacher Booking");

					jQuery("#teachers_calender_modal").modal("hide");

					jQuery.alert({

						title: 'Error!',

						content: res.error,

						icon: 'fa fa-cross',

						animation: 'scale',

						closeAnimation: 'scale',

						buttons: {

							Done: function () {

								window.open('http://www.icecreamenglish.com/packages/','_blank');

							}

						}

					});

					

				}else{



					// location.reload();

					//toastr.success("Booking Done","Teacher Booking");

					jQuery("#teachers_calender_modal").modal("hide");

					jQuery.alert({

						title: 'Success!',

						content: "예약이 완료되었습니다. 감사합니다. ❤",

						icon: 'fa fa-cross',

						animation: 'scale',

						closeAnimation: 'scale',

						buttons: {

							Done: function () {

								


							}

						}

					});







				}



			}





		});



		

	})









})









</script>

<?php// get_footer(); ?>	



</body>



</html>



