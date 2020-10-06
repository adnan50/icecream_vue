$(document).ready(function(){

console.log("ee");
  let events_remove = [];
  let add_events = [];
  let temp_id = 1;
  let user_id = "";
  let role = "";
  $(".deselectAll").hide();

  function addMinutesToTime(time, minsAdd) {
    function z(n){ 
     return (n<10? '0':'') + n;
   };
   var bits = time.split(':');
   var mins = bits[0]*60 + +bits[1] + +minsAdd;
   return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);  
 } 



 if ($("#teachers_availablility_calendar").length){

  var selector = $("#teachers_availablility_calendar");
  availability_calendar(selector);

}



/****************Schedule******************/


if ($("#schedule_calendar").length){

  var selector = $("#schedule_calendar");

  schedule_calendar(selector);


}




if ($(".users_schedule_select").length){

  selector.hide();

}


$(".users_schedule_select").change(function(){

  user_id = $(this).val();
  role = $(this).attr("data-role");

  selector.fullCalendar('render');
  selector.fullCalendar("refetchEvents");
  selector.show();

})

function schedule_calendar(selector){

  selector.fullCalendar({
    themeSystem: 'bootstrap3',

    header:{
      left:'prev',
      center:'title',
      right:'next'
    },

    height :"auto",
    'minTime' : "06:00:00",
    'maxTime' : "24:00:00",
    defaultView: 'agendaWeek',
    timeFormat: {
        agenda: 'H:mm'
    },

    eventSources: [{
      url : base_url + 'index.php/schedule/get_calendar_schedule',

      data: function () {

        var params = {};

        params['user_id'] = user_id;
        params['role'] = role;

        return params;

      },

      type: 'POST',

      error: function () {

        console.error('There was error fetching calendar data');

      },

    },],
  })

}




/******************Admin Set Teachers avaiability********************/  




if ($("#teachers_availablility_select").length){


  $("#teachers_availablility_calendar").hide();
  $("#save_availability").hide();

}








 let status = "";


function availability_calendar(selector){

  selector.fullCalendar({
    themeSystem: 'bootstrap3',
    header:{
      left:'prev',
      center:'title',
      right:'next'
    },

    'minTime' : "06:00:00",
    'maxTime' : "24:00:00",
    height: 'auto',
    timeFormat: {
        agenda: 'H:mm'
    },
    defaultView: 'agendaWeek',


    eventSources: [{
      url : base_url + 'index.php/availability/get_calendar_data',

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

    dayClick: function (date, jsEvent, view) {

      var day_array = "";
     var start =  date.format();

     var date_time = start.split("T");
  
     if(date_time.length >1)
     {
     status = 0;
      var time  = date_time[1].split("+");
      end_time = addMinutesToTime(time[0],30);
      if(time[0] == "23:30:00")
      {
          var end = date_time[0] +'T'+"24:00:00";
      }
      else
      {
        var end = date_time[0] +'T'+ end_time+":00";
      }
      var flag = 0;
      //exist_availability(start,end,flag);
        var new_event = 
          {
            temp_id: temp_id,
            start: start,
            end:end
          };

          add_events.push(new_event);
          var events = [
            {
              temp_id: temp_id,
              start: start,
              end: end,
              color: "#92D050"
            }
          ];

          selector.fullCalendar('addEventSource', events);
          temp_id++;

     }
     else{


   
      var formated_date =  date.format();
      var startString = formated_date+"T"+"06:00:00";
      var endString =  formated_date+"T"+"24:00:00";
      var start = "06:00:00";
      var end = "24:00:00";
    
      
      var events = [
          {
            temp_id: temp_id,
            start: startString,
            end:endString,
            color: "#337ab7",
            date:formated_date,
            status:1
          }
          ];
          selector.fullCalendar('addEventSource', events);
          

          var insert_event = 
          {  
            temp_id: temp_id,
            start: start,
            end:end,
            date:formated_date,
           status:1
          }
          ;

        add_events.push(insert_event);
        temp_id++;

    





     

    }




     

    

   function exist_availability(start,end,flag){
    $.ajax({
      url: base_url+"index.php/availability/exist_availability",
      type: "post",
      dataType :"json",
      data:{ start: start, end:end, user_id: user_id },
      success:function(res){
       
        if (res.status) 
        { 
          var new_event = 
          {
            temp_id: temp_id,
            start: start,
            end:end
          };

          add_events.push(new_event);
          var events = [
            {
              temp_id: temp_id,
              start: start,
              end: end,
              color: "#92D050"
            }
          ];

          selector.fullCalendar('addEventSource', events);
          temp_id++;
  
        }
        else
        {
          if(flag == 0)
          {
            alert("already");
            var events = [
            {
              temp_id: temp_id,
              start: start,
              end: end,
              color: "#92D050"
            }
            ];
          }
          events_remove.pop(res.event_slot);
        }

      }
    });
  }
   },

   eventClick: function(calEvent, jsEvent, view) {

    var status = calEvent.status;
    if (status == 1) {
      $(".click-active").children("td[data-date='" + calEvent.date + "']").children("button").removeAttr("disabled");
    }
     var event_id = calEvent._id;

     events_remove.push(calEvent.event_id);

     var index = add_events.findIndex(function(event) {
        return event.temp_id == calEvent.temp_id
      }) 
      if (index > -1) {
        add_events.splice(index, 1);
      }

     selector.fullCalendar('removeEvents' , function(ev){  

      return (ev._id == event_id);
    })

   },

   eventAfterAllRender: function(view){
   
    if(view.name == 'agendaWeek')
    {                     
       	$(".fc-bg tbody tr:first").addClass('click-active');
		$(".click-active  td:not(:first)").addClass('click-here');
		$(".click-active td:not(:first)").html(`<button class="btn btn-xs green click-btn"><i class = "fa fa-plus-circle"></i>  Select All</button>`);
		     
    }                   
}



 });




}


$("#save_availability").click(function(){

  $.ajax({

    url: base_url+"index.php/availability/save_availability_calendar",
    type: "post",
    data:{
      events_remove: events_remove,
      add_events: add_events,
      user_id: user_id

    },
    success:function(res){

     bootbox.alert({
      message: res,
      callback: function () {
       window.location.href = base_url+"availability/"+user_id;
     }
   })      
   },



 });


});




/********************************************** Genreal ********************************************************/


$(".delete-btn").click(function(e){

  e.preventDeafult();

  bootbox.confirm({
    title: "Delete Item",
    message: "Are you sure you want to delete this?",
    buttons: {
      cancel: {
        label: '<i class="fa fa-times"></i> Cancel'
      },
      confirm: {
        label: '<i class="fa fa-check"></i> Confirm'
      }
    },
    callback: function (result) {
     if (!result) {

      return false;
    }else{
      return true;
    }
  }

});

});





$(".datatable").DataTable();


let table = $('.datatable_mass_delete').DataTable({

  'columnDefs': [{
   'targets': 0,
   'searchable': false,
   'orderable': false,
   'className': '',
   'render': function (data, type, full, meta){
     return '<input type="checkbox" class="table_body_checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
   }
 }],
 'order': [[1, 'asc']]
});

$('.select_rows').on('click', function(){
  let rows = table.rows({ 'search': 'applied' }).nodes();
  $('input[type="checkbox"]', rows).prop('checked', this.checked);
});

$(".mass_delete").click(function(e){

  var arr=[];
  table.$('input[type="checkbox"]').each(function(){

    if(this.checked){
     arr.push(this.value);
   }

 });

  if (arr == "") {
    bootbox.alert("Select atleast one item to delete");
  }else{

    $.ajax({
      url: base_url+"notifications/mass_delete",
      type:"post",
      data:{
        arr:arr
      },
      success:function(res){
        res = JSON.parse(res);
        if (res.hasOwnProperty("success")) {
         bootbox.alert({
          message: "Data Deleted Successfully",
          callback: function () {
           location.reload();
         }
       }) 
       }else{
        bootbox.alert("There is an error while deleting data.Please contact developer.");
       }
     }
   })

  }

  return false;

});

$(".selectAll").on("click",function () {
 $('input:checkbox').prop('checked',true);
 $(".selectAll").hide();
 $(".deselectAll").show();
});
$(".deselectAll").on("click",function () {
 $('input:checkbox').prop('checked',false);
 $(".deselectAll").hide();
 $(".selectAll").show();
});
    
$(".mass_delete_queries").click(function(e){

  var arr=[];
  $('input[type="checkbox"]').each(function(){

    if(this.checked){
     arr.push(this.value);
   }

 });

  if (arr == "") {
    bootbox.alert("Select atleast one to delete");
  }else{
       var table_name = $(this).attr('data-model-name');
      
        $.confirm({
        title: 'Delete',
          content: 'Are You Sure ?',
          icon: 'fa fa-trash-o',
          theme: 'supervan',
          closeIcon: true,
          animation: 'scale',
          type: 'orange',
          buttons: {
            delete: function () {
              $.ajax({
              type:"post",
               url: base_url+"/"+table_name+"/mass_delete",
              data:{arr:arr},
              dataType:'json',
              success:function(res){
              {
             
                if (res.status) {
                  bootbox.alert({
                    message: "Data Deleted Successfully",
                    callback: function () {
                      location.reload();
                    }
                 })
                }
              }
            }
          });
        },
          cancel: function () {
            location.reload();
          }
       }

      });

  }

  return false;

});



$(".level_test_result").click(function(){

  var result_id = $(this).attr("data-result_id");

  $.ajax({

    url: base_url+"booking/get_level_test_result",
    data:{
      result_id: result_id
    },
    type: "post",
    success:function(res){

      $(".level_test_report_body").html(res);
      $("#level_test_report").modal("show");
    }
  })

  
})


});



//JUNAID

// ******************************************** DELETE TICKETS  START ***************************************************

$(document).ready(function() {
$('.delete-ticket').on('click', function (){
  var id = $(this).attr('data-id');
  $.confirm({
    title: 'Delete!',
    content: 'Are You Sure ?',
    icon: 'fa fa-trash-o',
    theme: 'supervan',
    closeIcon: true,
    animation: 'scale',
    type: 'orange',
    buttons: {
      delete: function () {

        $.ajax({
          type: "GET",
          url: base_url+'tickets/delete_ticket',
          data:'id='+id,
          dataType:'json',
          success: function(data)
          {
            if(data.status){
              location.reload();
            }
          }
        });

      },

      cancel: function () {}
    }

  });
});
});


// ******************************************** DELETE TICKETS  END ***************************************************



// ******************************************** DELETE USER  START ***************************************************

$(document).ready(function() {
    $('.delete-users').on('click', function () {
      var id = $(this).attr('data-id');
      $.confirm({
        title: 'Delete!',
        content: 'Are You Sure ?',
        icon: 'fa fa-trash-o',
        theme: 'supervan',
        closeIcon: true,
        animation: 'scale',
        type: 'orange',
        buttons: {
          delete: function () {
            $.ajax({
              type: "GET",
              url: base_url+"users/delete_user",
              data:'id='+id,
              dataType:'json',
              success: function(data)
              {
                if(data.status){
                  location.reload();
                }
              }
            });
          },
          cancel: function () {}
        }
      });

    });
});


// ******************************************** DELETE USER  END ***************************************************




// ******************************************** MASS NOTIFICATION DELETE START ***************************************************

  $(document).ready(function(){
    $(".delete").click(function()
    {
      var allVals = [];
      $('#accordion :checked').each(function(){
        allVals.push($(this).val());
      });

      if (allVals == "") 
      {
        bootbox.alert("Select atleast one time to delete");
      }
      else
      {
        $.confirm({
        title: 'Delete Notifications',
          content: 'Are You Sure ?',
          icon: 'fa fa-trash-o',
          theme: 'supervan',
          closeIcon: true,
          animation: 'scale',
          type: 'orange',
          buttons: {
            delete: function () {
              $.ajax({
              type:"post",
              url: base_url+"notifications/mass_delete",
              data:{arr:allVals},
              dataType:'json',
              success:function(res){
              {

                if (res.status) {
                  bootbox.alert({
                    message: "Data Deleted Successfully",
                    callback: function () {
                      location.reload();
                    }
                 })
                }
              }
            }
          });
        },
          cancel: function () {
            location.reload();
          }
       }

      }); 
    }
  });
  });

// ******************************************** MASS NOTIFICATION DELETE  END ***************************************************
$(document).ready(function() {
    $('.close-ticket').on('click',function() {
      var id = $(this).attr('data-id');
      $.confirm({
        title: "Close Ticket",
        content: 'Are You Sure ?',
        icon: 'fa fa-question',
        theme: 'supervan',
        closeIcon: true,
        animation: 'scale',
        type: 'orange',
        buttons: {
          Yes: function () {
            $.ajax({
              type: "POST",
              url: base_url+'support/close_message',
              data:'id='+id,
              dataType:'json',
              success: function(data)
              {
                if(data.status){
                  location.reload();
                }
              }
            });
          },
          No: function () {

          }
        }
      });
    });


  });


// $("#teachers_availablility_select").change(function(){
  $(document).on('change', '#teachers_availablility_select', function(e){
 var selector = $("#teachers_availablility_calendar");

  alert("ss");
  events_remove = [];
  add_events = [];
  temp_id = 1;
  user_id = $(this).val();


  selector.fullCalendar('render');
  selector.fullCalendar("refetchEvents");


  $("#teachers_availablility_calendar").show();
  $("#save_availability").show();

});

