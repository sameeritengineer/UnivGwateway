@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')

<div class="custom-model studentUniversity-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
<form method="POST" action="{{ route('student-university-submit') }}" class="custom-popup-form" name="Add_StudentUniversity_Form">
		{{ csrf_field() }}
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">APPLY UNIVERSITIES</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">University Attended <span class="color-red font-size-16"> *</span></label>
             <select id="projectinput5" name="university_id" class="form-control">
                <option value="">Select University Attended</option>
                @foreach($master_universities as $universities)
                <option  value="{{$universities->id}}">{{$universities->name}}</option>
                @endforeach
             </select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Course Attended <span class="color-red font-size-16"> *</span></label>
             <select id="projectinput6" name="course_id" class="form-control">
                <option value="">Select Course Attended</option>
                @foreach($master_courses as $courses)
                <option value="{{$courses->id}}">{{$courses->name}}</option>
                @endforeach
             </select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Year Applied: <span class="color-red font-size-16"> *</span></label>
			<input type="date" class="form-control" name="applied_university_year" placeholder="Year Applied:">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Status</label>
             <select id="projectinput7" name="applied_status" class="form-control">
	          <option value="">Select Status</option>
	          <option value="Intrested">Intrested</option>
	          <option value="Applied">Applied</option>
	          <option value="Admitted">Admitted</option>
	          <option value="Rejected">Rejected</option>
	         </select> 
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Description <span class="color-red font-size-16"> *</span></label>
			<textarea name="description" class="form-control popup-text-area" placeholder="Type here..."></textarea>
		</div>


		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel_university">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>
<div class="custom-model editstudentUniversity-model">
	<div class="crossLayer crossLayertudentUniversity"><i class="fa fa-close"></i></div>
<form method="POST" action="{{ route('student-university-edit') }}" class="custom-popup-form" name="Edit_StudentUniversity_Form">
		{{ csrf_field() }}
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<input type="hidden" value="" name="student_university_id" id="student_university_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">APPLY UNIVERSITIES</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">University Attended <span class="color-red font-size-16"> *</span></label>
             <select id="university_id" name="university_id" class="form-control">
                <option value="">Select University Attended</option>
                @foreach($master_universities as $universities)
                <option  value="{{$universities->id}}">{{$universities->name}}</option>
                @endforeach
             </select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Course Attended <span class="color-red font-size-16"> *</span></label>
             <select id="course_id" name="course_id" class="form-control">
                <option value="">Select Course Attended</option>
                @foreach($master_courses as $courses)
                <option value="{{$courses->id}}">{{$courses->name}}</option>
                @endforeach
             </select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Year Applied: <span class="color-red font-size-16"> *</span></label>
			<input type="date" id="applied_university_year" class="form-control" name="applied_university_year" placeholder="Year Applied:">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Status</label>
             <select id="applied_status" name="applied_status" class="form-control">
	          <option value="">Select Status</option>
	          <option value="Intrested">Intrested</option>
	          <option value="Applied">Applied</option>
	          <option value="Admitted">Admitted</option>
	          <option value="Rejected">Rejected</option>
	         </select> 
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Description <span class="color-red font-size-16"> *</span></label>
			<textarea name="description" class="form-control popup-text-area" placeholder="Type here..."></textarea>
		</div>


		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel_university">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>



<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
@if (\Session::has('success'))
			    <div class="alert alert-success">
                 <strong>Success!</strong> {!! \Session::get('success') !!}
                </div>
@endif
@if (\Session::has('error'))
               	<div class="alert alert-danger">
                  <strong>Error!</strong> {!! \Session::get('error') !!}
                </div>
@endif  
			<div class="button-row display-grid dashboard-btn-row margin-bottom-30 padding-left-none padding-right-none">
				<h3 class="margin-top-none mob-margin-bottom-15 margin-bottom-none text-color-theme letter-uppercase font-size-18 font-weight-600">Edit Universities Applied or Interested</h3>
				<div class="display-grid">
					<a class="custom-btn mob-margin-bottom-15" href="#">
						<span class="letter-uppercase font-weight-600 apply_student_university">Add</span>
					</a>
				</div> 
			</div>

            <div class="col-md-12 col-sm-12 col-xs-12 three_row_section box-shadow-gray padding-left-none padding-right-none">
                
                @foreach($StudentUniversity as $university)
                @php
                 $university_data = App\MasterUniversity::select('name')->where('id',$university->university_id)->first();
                 $course_data = App\MasterCourse::select('name')->where('id',$university->course_id)->first();
                @endphp
                <div class="col-xs-12 col-sm-12 col-md-12 display-grid space-between result-row">
                	<div class="width-50-per mob-margin-bottom-15">
                		<h3 class="margin-bottom-none margin-top-none margin-bottom-15 color-gray font-weight-600 font-size-25">@if(!empty($university_data)) {{$university_data->name}} @endif</h3>
                		<h3 class="margin-bottom-none margin-top-none text-color-second font-size-20 margin-bottom-15">
                			@if(!empty($course_data)) {{$course_data->name}} @endif
                		</h3>
                		<h3 class="margin-top-none margin-bottom-none text-color-theme font-size-20">Applied: {{ date('d F, Y', strtotime(trim($university->date_applied))) }}</h3>
                	</div>
                    <div class="result-row-width">
                    	<a class="custom-btn font-weight-600" href="#">
							{{$university->application_status}}
						</a>
                    </div>
                   
                    <div class="display-grid result-row-width flex-end">
                    	<span data-student_university_id="{{$university->id}}" data-university_id="{{$university->university_id}}" data-course_id="{{$university->course_id}}" data-date_applied="{{$university->date_applied}}" data-application_status="{{$university->application_status}}" class="edit_student_university"><img class="margin-right-30 cursor-pointer" src="{{asset('web/studentdashboard/images/Editiconcommon.png')}}"></span>
                    	<img class="cursor-pointer" src="{{asset('web/studentdashboard/images/Deleteicon-common.png')}}">
                    </div>
                </div>
                @endforeach

                

	        </div>
		</div>
</div>
<script>
$(document).ready(function(){
	$("form[name='Add_StudentUniversity_Form']").validate({
    rules: {
    university_id: {
      required: true,
    },
    course_id: {
      required: true,
    },
    applied_university_year: {
      required: true,
    },
    applied_status: {
      required: true,
    } 
  },
    submitHandler: function(form) {
      form.submit();
    }
  });
$(document).on("click", ".edit_student_university" , function() {
	    var student_university_id = $(this).attr('data-student_university_id');
	    var university_id = $(this).attr('data-university_id');
	    var course_id = $(this).attr('data-course_id');
	    var applied_date = $(this).attr('data-date_applied');
	    var application_status = $(this).attr('data-application_status');
	    $('#student_university_id').val(student_university_id);
	    $('#university_id').val(university_id).trigger('change');
	    $('#course_id').val(course_id).trigger('change');
	    $('#applied_university_year').val(applied_date);
	    $('#applied_status').val(application_status);
        $("html").animate({ scrollTop: 0 });
        $('.editstudentUniversity-model').show('100');
        $('.popup-bg-img').show();
});
$('.crossLayertudentUniversity').click(function (){
        $('.editstudentUniversity-model').hide('100');
        $('.popup-bg-img').hide();
        });
$('.cancel_university').click(function (){
        $('.editstudentUniversity-model').hide('100');
        $('.studentUniversity-model').hide('100');
        $('.popup-bg-img').hide();
        });
});	
</script>
@endsection