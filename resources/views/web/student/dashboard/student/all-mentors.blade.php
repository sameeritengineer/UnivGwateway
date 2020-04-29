@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
	<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')
    <div class="right-data-row col-md-12 col-sm-12 col-xs-12">
			<div class="button-row display-grid dashboard-btn-row padding-bottom-50">
				<div class="display-grid width-100-per">
						<select class="select-search-form" id="search_val"> 
							<option value="">Select</option>
							<option value="university">University</option>
							<option value="degree">Degree</option>
							<option value="services">Services</option>
						</select>
						<input type="search" class="search-field" id="search_text_val" style="width: 50%;">
						<input type="submit" class="search-btn" name="search_btn"  onclick="filter_data();">
						<img class="search-img" src="{{asset('images/Searchicon.png')}}" alt="">
				</div>
			</div>
            <div class="panel_body">
            	{{ csrf_field() }}
            <div class="row mentors_output">
            	@if(count($mentors)>0)
				@foreach($mentors as $mentor)
	            <div class="col-md-3 col-sm-6 col-xs-12 three_row_section text-center">
	                <div class="col-xs-12 col-sm-12 col-md-12 box-shadow-gray">
	                    <img src="{{asset('uploads/mentor/'.$mentor->image)}}" alt="" class="img-responsive center-block">
	                    @php 
                         $degree = App\Mentor::find($mentor->id)->degree;
                        @endphp
	                    <h3 class="title-color text-color-theme letter-uppercase">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
	                    <p class="font-size-15 text-color-theme">{{$mentor->job_title}}</p>
	                    <p class="date-font text-color-second">{{$mentor->major_specialization}},{{$degree->name}}</p>
	                    <div class="request-call-btn">
	                			<a class="mentor_custom_req_btn custom-btn mob-padding-5-10" href="{{ route('student-mentor-single', $mentor->id) }}">
									<img style="width: 25px;" class="margin-right-5" src="images/diagnosticcall_mentordashicon.png" alt="">
									<span class="letter-uppercase font-weight-600">Request a diagnostic call</span>
								</a>
	                		</div>
	                </div>
	            </div>
                @endforeach
                @else
				<div class="col-md-12 col-sm-12 col-xs-12 three_row_section text-center norecords">
					<p>No records found</p>
				</div>
                @endif
	        </div>
            </div> 
            @if(count($mentors)>0)
	        <div class="view-all-btn load_more"><a class="view-all" href="javascript:void(0)"  onclick="load_data();">Load More</a></div>
	         @endif
	        </div>
		</div>
	</div>
<script>
var pageNumber = 2;
var dataDiv = 4;
var token = $('meta[name="csrf-token"]').attr('content');
function filter_data(){
   pageNumber = 1;
  load_data();
}
function load_data(){
	   $.ajax({
        type : 'GET',
        _token: token,
        url: "{{ route('all-mentors') }}",
        data: {
            "pageNumber": pageNumber,
            "search": $("#search_val").val(),
            "search_text_val": $("#search_text_val").val(),
        },
        success : function(response){
            pageNumber +=1;
            $(".mentors_output").html(jQuery(response).find('.mentors_output'));
            var norecords = $('.norecords').length;
            var dataDiv1 = $('.three_row_section').length;
            $(".load_more").show();
            if(norecords>0 || dataDiv1 == dataDiv){
            	$(".load_more").hide();
            }
            dataDiv = dataDiv1;
        },error: function(data){

        },
    }) 
}
</script>	
@endsection