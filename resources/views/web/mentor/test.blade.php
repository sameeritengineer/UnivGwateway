
 <link rel='stylesheet' type='text/css' href="{{asset('web/calender/css/jquery-ui-1.8.11.custom.css')}}" />
 <link rel='stylesheet' type='text/css' href="{{asset('web/calender/css/jquery.weekcalendar.css')}}" />
 <link rel="stylesheet" type="text/css" href="{{asset('web/calender/css/default.css')}}" />


  <script type='text/javascript' src="{{asset('web/calender/js/jquery-1.4.4.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('web/calender/js/jquery-ui-1.8.11.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('web/calender/js/date.js')}}"></script>
  <script type='text/javascript' src="{{asset('web/calender/js/jquery.weekcalendar.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <a href="{{route('requested-student')}}"><h3>Requested Students</h3></a>
<!--   <h1>Week Calendar Demo (Data supplied config overrides)</h1>

  <p class="description">
    This calendar demonstrates the ability to return calendar configuration
    options with an event dataset.
  </p>

  <div id="message" class="ui-corner-all"></div>

  <div class="clearer"></div>
<input type="hidden" id="mentor_id" value="{{$mentor->id}}">
  <div id="calendar_selection" class="ui-corner-all">
    <strong>Event Data Source: </strong>
    <select id="data_source">
      <option value="">Select Event Data</option>
      <option value="1">Event Data 1</option>
      <option value="2">Event data 2</option>
      <option value="3">Event data 3</option>
    </select>
  </div> -->
<input type="hidden" id="mentor_id" value="{{$mentor->id}}">
  <div id="calendar"></div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>  
<script type='text/javascript'>


  var year = new Date().getFullYear();
  var month = new Date().getMonth();
  var day = new Date().getDate();
console.log(new Date(year, month, day, 13, 30));
  var eventData1 = {
    options: {
      timeslotsPerHour: 1,
      scrollToHourMillis : 0,
      defaultEventLength: 1,
      timeslotHeight: 50,
    },
    events : [
       {'id':1, 'start': new Date(year, month, day, 12), 'end': new Date(year, month, day, 13, 30),'title':'Lunch with Mike'},
       {'id':2, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 14, 45),'title':'Dev Meeting'},
       {'id':3, 'start': new Date(year, month, day + 1, 18), 'end': new Date(year, month, day + 1, 18, 45),'title':'Hair cut'},
       {'id':4, 'start': new Date(year, month, day - 1, 8), 'end': new Date(year, month, day - 1, 9, 30),'title':'Team breakfast'},
       {'id':5, 'start': new Date(year, month, day + 1, 14), 'end': new Date(year, month, day + 1, 15),'title':'Product showcase'},
       {"title": "Event 1","start": 1587666600000,"end": 1587670200000},
       {"title": "Event 2","start": 1587583800000,"end": 1587587400000}
    ]
  };


  $(document).ready(function() {
    var mentor_id = $('#mentor_id').val();
    updateJsonFile(mentor_id);
    var $calendar = $('#calendar').weekCalendar({
      timeslotsPerHour: 1,
      scrollToHourMillis : 0,
      defaultEventLength: 1,
      timeslotHeight: 50,
      newEventText: 'Selected',
      height: function($calendar){
        return $(window).height() - $('h1').outerHeight(true);
      },
      eventRender : function(calEvent, $event) {
        if(calEvent.end.getTime() < new Date().getTime()) {
          $event.css('backgroundColor', '#aaa');
          $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
        }
      },
      eventNew : function(calEvent, $event) {
        var startTime = calEvent.start.getTime();
        var endtime = calEvent.end.getTime();
        var date = calEvent.start.getDate();
        var month = calEvent.start.getMonth();
        var year = calEvent.start.getFullYear();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                    url: "{{ route('mentor-avl') }}",
                    type: "POST",
                    data: {
                    	"_token": "{{ csrf_token() }}",
                        "mentor_id": mentor_id,
                        "startTime": startTime,
                        "endtime": endtime,
                        "date": date,
                        "month": month,
                        "year": year,
                         "type": '0',
                    },
                    success: function(response) {

                     
                    },
                 });
        alert('You\'ve added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.');
      },
      // data: function(start, end, callback) {
      //   var dataSource = $('#data_source').val();

      //   if (dataSource === '1') {
      //     callback(eventData1);
      //   }else {
      //     callback([]);
      //   }
      // }
      data: function(start, end, callback) {
        setInterval(function() {
         $.getJSON("http://localhost/UnivGwateway/public/web/calender/mentor_availability_"+mentor_id+".json", {
           start: start.getTime(),
           end: end.getTime()
         },  function(result) {
           callback(result);
         });
        }, 1000);   
      }
    });

    $('#data_source').change(function() {
      $calendar.weekCalendar('refresh');
      updateMessage();
    });

    function updateMessage() {
      var dataSource = $('#data_source').val();
      $('#message').fadeOut(function(){
        if(dataSource === '1') {
          $('#message').text('Displaying event data set 1 with timeslots per hour of 4 and timeslot height of 20px');
        } else if(dataSource === '2') {
          $('#message').text('Displaying event data set 2 with timeslots per hour of 3 and timeslot height of 30px');
        } else if(dataSource === '3') {
          $('#message').text('Displaying event data set 3 with allowEventDelete enabled. Events before today will not be deletable. A confirmation dialog is opened when you delete an event.');
        } else {
          $('#message').text('Displaying no events.');
        }
        $(this).fadeIn();
      });
    }

    function updateJsonFile(mentor_id) {
        $.ajax({
          url: "{{ route('mentor-avl') }}",
          type: "POST",
          data: {
            "_token": "{{ csrf_token() }}",
             "mentor_id": mentor_id,
             "type": '1',
          },
          success: function(response) {

           
          },
       });
    }

    updateMessage();
  });
  </script>  