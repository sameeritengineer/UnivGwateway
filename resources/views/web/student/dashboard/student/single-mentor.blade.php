@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')
<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
  <div class="container">
    <div class="row">
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
     @endif
     @if (\Session::has('success'))
      <div class="alert alert-success">
                     <strong>{!! \Session::get('success') !!}</strong> 
       </div>
      @endif
      <form method="POST" action="{{ route('student-mentor-session') }}" name="signUpForm" class="user_profile_form margin-top-50" method="post" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="display-grid align-item-baseline margin-bottom-30 profile-edit-row flex-content-center">
          <div class="form_field_row margin-right-15">
            <h3 class="font-size-20 text-color-theme font-weight-600 margin-top-none letter-uppercase margin-bottom-none">Mentor Name</h3>
          </div>
          <div class="form_field_row">
            <select name="select-mentor" class="select-mentor">
              <option>{{$mentor->first_name}} {{$mentor->last_name}}</option>
            </select>
          </div>
        </div>
        <input type="hidden" id="session_date" name="session_date" value="">
        <input type="hidden" name="student_id" value="{{$student->id}}">
        <input type="hidden" id="mentor_id" name="mentor_id" value="{{$mentor_id}}">

        <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-30 calendar-row">
                 Date: <div id="datepicker"></div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-30 display-grid slots_data">

        
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 padding-top-25 box-shadow-gray padding-left-25 padding-right-25">
          <div class="editHeader margin-bottom-15">
            <h3 class="font-size-20 text-color-theme font-weight-600 margin-top-none letter-uppercase margin-bottom-none">Agenda</h3>
          </div>
          <div class="display-grid align-item-baseline padding-bottom-50 margin-bottom-30">
            <div class="input-field-row width-100-per">
              <input style="border:0; border-radius:0; padding-left:0;border-bottom: 1px #48b4db solid" type="text" class="width-100-per circle_form_field" placeholder="Type your agenda here" name="agenda">
            </div>
          </div>
        </div>

        <div class="display-grid margin-top-30 flex-content-center col-md-12 col-sm-12 col-xs-12 padding-bottom-50 align-item-baseline">
          <input type="submit" value="Schedule" class="custom-btn letter-uppercase">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')
<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
<div class="container">
<form method="POST" action="{{ route('student-mentor-session') }}">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
     @endif
     @if (\Session::has('success'))
      <div class="alert alert-success">
                     <strong>{!! \Session::get('success') !!}</strong> 
       </div>
      @endif
{{ csrf_field() }}
Date: <div id="datepicker"></div>
<input type="hidden" id="session_date" name="session_date" value="">
<input type="hidden" name="student_id" value="{{$student->id}}">
<input type="hidden" id="mentor_id" name="mentor_id" value="{{$mentor_id}}">
<p class="slots_data"></p>
<textarea name="agenda" placeholder="Agenda"></textarea>
<input type="submit" name="submit" value="schedule">
</form>

</div>

		</div>
	</div> -->

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>	
<script>
$(function() {
//var availableDates = ["1-4-2020","22-4-2020","23-4-2020","28-4-2020"];
var availableDates = <?php echo json_encode($dates); ?>;
//console.log(dates);

function available(date) {
  dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
  if ($.inArray(dmy, availableDates) != -1) {
    return [true, "","Available"];
  } else {
    return [false,"","unAvailable"];
  }
}
$('#datepicker').datepicker({onSelect: function(dateText) {
     //console.log(this.value);   
    var mentor_id = $("#mentor_id").val();
    var selected_date = this.value;
    $("#session_date").val(selected_date);
    var token = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                    _token: token,
                    url: "{{ route('slots') }}",
                    type: "POST",
                    data: {
                        "mentor_id": mentor_id,
                        "selected_date": selected_date,
                    },
                    success: function(response) {
                    	$(".slots_data").html(response);
                    	},
                 });

      
    }, beforeShowDay: available });
// $("#datepicker").datepicker({
//     onSelect: function(dateText) {
//       console.log(this.value);
//     }
//   });
});

</script>
@endsection