<style type="text/css">
.fc-day {
	cursor: pointer;
}

.click-active td {
	padding-top: 5px;
	text-align: center;
	font-weight: bold;
}

.click-btn {
	width: 100%;
	height: 100%;
}

.fc-time-grid-event {
	margin-right: 0 !important;
}
</style>
<div class="">
	<?php
	$role = get_user_role();

	if ($role == "admin") {


		?>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="Teachers">Students</label>
					<select class="form-control select2 " id="students" style="border: 2px solid #000;">
						<option class="ml0">Select Student</option>
						<?php
						foreach ($students as $key => $value) {



							echo "<option value='".$value->id."'>".$value->full_name."</option>";
						}
						?>
					</select>
				</div>
			</div>

			<div class="col-md-5">
				<div class="form-group">
					<label for="Teachers">Teachers</label>
					<select class="form-control select2 " name="teachers" id="teachers" style="border: 2px solid #000;">
						<option class="ml0" value="">Select Teacher</option>
						<?php
						foreach ($teachers as $key1 => $value1) { ?>
						<option value="<?php echo $value1->id; ?>"><?php echo $value1->full_name; ?></option>
						<?php 
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<?php
	}

	?>

					<div id="teachers_calender_modal" class="modal fade" role="dialog" style="z-index: 9999999999">
						<div class="modal-dialog modal-lg">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" id="title-model"> </h4> </div>
								<div class="modal-body">
									<div class="teachers_calender"></div>
								</div>
								<div class="modal-footer text-left">
									<div class="col-md-7">
										<button type="button" class="btn btn-primary book_slot" style="color: #fff !important;">
											<?php echo $this->lang->line('enrolment'); ?>
										</button>
									
									</div>
									<div class="col-md-5">
										<input type="checkbox" id="level_test" class="level_test" onclick="level_test();">
										<?php echo $this->lang->line('level_test_book'); ?>
									</div>
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
									<h4 class="modal-title"><?php echo $this->lang->line('thankyou'); ?></h4> </div>
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
						$(document).ready(function(){
	
	
})
					let user_id = "";
					let student_id = "";
					let prev_event = [];
					let level_test_event = "";
					let weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
					let teacher = "";
					var date = new Date();
					var current_date = date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-' + ("0" + date.getDate()).slice(-2)
						//date.setDate(date.getDate() + 7);
					var week_date = date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-' + ("0" + date.getDate()).slice(-2)
					var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
					var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
					var first_day = firstDay.toLocaleDateString();
					var last_day = lastDay.toLocaleDateString();

					function level_test() {
						var checkBox = document.getElementById("level_test");
						$(".teachers_calender").fullCalendar('render');
						$(".teachers_calender").fullCalendar("refetchEvents");
						prev_event = [];
						level_test_event = "";
					}

					$(document).ready(function() {
						$("#students").on("change",function(){
							student_id = $("#students").val();
						});
						var calendar_settings = {
							themeSystem: 'bootstrap3',
							header: {
								left: '',
								center: 'title',
								right: ''
							},
							'minTime': "06:00:00",
							'maxTime': "24:00:00",
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
								url: base_url + 'index.php/availability/get_calendar_data',
								data: function() {
									var params = {};
									params['user_id'] = user_id;
									return params;
								},
								type: 'POST',
								error: function() {
									console.error('There was error fetching calendar data');
								},
							}, ],
							titleRangeSeparator: " — ",
							eventClick: function(calEvent, jsEvent, view) {
								var time = calEvent.end._i;
								time = time.split("T");
								var a = new Date(time[0]);
								var day = weekday[a.getDay()];
								var date = time[0];
								// var week_number = getWeekNumber(time[0]);
								if($(".level_test").prop("checked") == true) {
									if(level_test_event != "") {
										level_test_event.color = "#92D050";
										$(".teachers_calender").fullCalendar('updateEvent', level_test_event);
									}
									calEvent.color = "#C70C27";
									calEvent.day = day;
									calEvent.date = date;
									//calEvent.week_number = week_number;
									calEvent.teacher = user_id;
									level_test_event = calEvent;
								} else if($(".level_test").prop("checked") == false) {
									if(typeof calEvent.teacher === "undefined" || calEvent.teacher == "") {
										calEvent.color = "#C70C27";
										calEvent.day = day;
										calEvent.date = date;
										//calEvent.week_number = week_number;
										calEvent.teacher = user_id;
										prev_event.push(calEvent);
									} else {
										calEvent.color = "#92D050";
										calEvent.day = "";
										calEvent.teacher = "";
										calEvent.date = "";
										//calEvent.week_number = "";
										prev_event.pop(calEvent);
									}
								}
								$(".teachers_calender").fullCalendar('updateEvent', calEvent);
							},
						}
						$(".teachers_calender").fullCalendar(calendar_settings);
						$("#teachers").on("change",function(){


							user_id = $("#teachers").val();						
							$("#teachers_calender_modal").modal("show");
							
						})
						$('#teachers_calender_modal').on('shown.bs.modal', function() {
							$(".teachers_calender").fullCalendar('render');
							$(".teachers_calender").fullCalendar("refetchEvents");
						});
						$(".book_slot").click(function() {
							console.log(prev_event);
							if($(".level_test").prop("checked") == true) {
								data = {
									action: "level_test",
									events: level_test_event.event_id,
									student_id: student_id
								}
							} else {
								var events_booked = [];
								for(var i = prev_event.length - 1; i >= 0; i--) {
									var event = {
										availability_id: prev_event[i].event_id,
										date: prev_event[i].date,
										teacher_id: prev_event[i].teacher
									};
									events_booked.push(event);
								}
								events_booked = JSON.stringify(events_booked);
								data = {
									action: "regular_class",
									events: events_booked,
									student_id: student_id
								}
							}

							console.log(data);
								$.ajax({
								url: base_url + "Booking/add_booking",
								data: data,
								type: "POST",
								success: function(res) {
									res = JSON.parse(res);
									if(res.hasOwnProperty("error")) {
										//alert(res.error);
										//toastr.error(res.error,"Teacher Booking");
										$("#teachers_calender_modal").modal("hide");
										$.alert({
											title: 'Error!',
											content: res.error,
											icon: 'fa fa-cross',
											animation: 'scale',
											closeAnimation: 'scale',
											buttons: {
												Done: function() {
													window.open('http://www.icecreamenglish.com/packages/', '_blank');
												}
											}
										});
									} else {
										// location.reload();
										//toastr.success("Booking Done","Teacher Booking");
										$("#teachers_calender_modal").modal("hide");
										$.alert({
											title: 'Success!',
											content: "Teacher Booking",
											icon: 'fa fa-cross',
											animation: 'scale',
											closeAnimation: 'scale',
											buttons: {
												Done: function() {
													$('#thankyou').modal('show');
													var actionx = "";
													if(data.action == "regular_class") {
														$("#bookings").html("<?php echo $this->lang->line('thanks'); ?>" + " " + "<?php echo $this->lang->line('regular'); ?> ");
													} else {
														$("#bookings").html("<?php echo $this->lang->line('thanks'); ?>" + " " + "<?php echo $this->lang->line('level_test'); ?> ");
													}
												}
											}
										});
									}
								}
							});
							$(".close-model").on("click", function() {
								location.reload();
							});
						})
					})



					</script>