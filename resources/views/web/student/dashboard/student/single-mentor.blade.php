@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
		<div class="student-title">Student Dashboard</div>
		<div style="background-image: url('{{asset('web/studentdashboard/images/Student-MEntordashboard-BG.png')}}');" class="col-md-12 col-sm-12 col-xs-12 dashboard-title-banner display-grid space-between align-items-end">
			<div class="display-grid">
				<div class="student-detail">
					<img class="margin-right-30" src="{{asset('web/studentdashboard/images/MENTOR_stuartlucasprofile.png')}}" alt="" />
				</div>
				<div>
					<div class="name-row display-flex">
						<h3 class="letter-uppercase font-size-25 font-weight-600 text-white">Sara Davis</h3>
						<img class="cursor-pointer" src="{{asset('web/studentdashboard/images/editiconWHite.png')}}" alt="" />
					</div>
					<div class="row-parral text-white font-size-20 margin-bottom-10">
						<span>infosara@gmail.com</span> <span>99 999 99 99</span> <span>MBA</span> <span>Duration</span>
					</div>
					<div class="letter-uppercase text-color-second font-size-25 font-weight-600">Professional Package</div>
				</div>
			</div>
			<div class="padding-top-30">
				<h3 class="text-white font-size-20 font-weight-500">Profile Last Updated - Today</h3>
			</div>
		</div>
		<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
				<h3 class="letter-uppercase font-size-18 font-weight-600 text-color-theme margin-bottom-30">My Mentors</h3>
			</div>
            <div class="container">
  <p>This is a datepicker example using jquery, jquery ui, and jquery css</p>
  <input type="hidden" id="mentor_id" value="{{$mentor_id}}">
<form>
Date:
<input id="datepicker">
<p class="slots_data"></p>
</form>
</div>

		</div>
	</div>

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