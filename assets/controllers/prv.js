
   function exist_availability(start,end,flag){
     $.ajax({

      url: base_url+"index.php/availability/exist_availability",
      type: "post",
      dataType :"json",
      data:{
       start: start,
       end:end,
       user_id: user_id

     },
     success:function(res){
      if (res.status) 
      {
      
       var new_event = 
       {
        temp_id: temp_id,
        start: start,
        end:end

        };

      console.log(new_event);

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

        alert("already");
         events_remove.pop(res.id);
         var events = [
         {
          temp_id: temp_id,
          start: start,
          end: end,
          color: "#92D050"
        }
        ];

        selector.fullCalendar('addEventSource', events);
      }

    }


});
   }
