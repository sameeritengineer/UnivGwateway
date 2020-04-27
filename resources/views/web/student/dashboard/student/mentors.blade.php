@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
	<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')

		<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
				<h3 class="letter-uppercase font-size-18 font-weight-600 text-color-theme margin-bottom-30">My Mentors</h3>
			</div>

			<div class="row">
				@foreach($mentors as $mentor)
	            <div class="col-md-3 col-sm-6 col-xs-12 three_row_section text-center">
	                <div class="col-xs-12 col-sm-12 col-md-12 box-shadow-gray">
	                    <a href="{{ route('student-mentor-single', $mentor->id) }}"><img src="{{asset('uploads/mentor/'.$mentor->image)}}" alt="" class="img-responsive center-block"></a>
	                    @php 
                         $degree = App\Mentor::find($mentor->id)->degree;
                        @endphp
	                    <h3 class="title-color text-color-theme letter-uppercase">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
	                    <p class="font-size-15 text-color-theme">{{$mentor->job_title}}</p>
	                    <p class="date-font text-color-second">{{$mentor->major_specialization}},{{$degree->name}}</p>
	                </div>
	            </div>
                @endforeach

	        </div>
	        <div class="view-all-btn"><a class="view-all" href="">View All</a></div>
		</div>
	</div>
@endsection