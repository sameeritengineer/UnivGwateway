@extends('web.layouts.index')
@section('title','Student Profile')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" value="{{$student->email}}" id="student_email">
<input type="hidden" value="{{$student->id}}" id="student_id">
<div class="popup-bg-img"></div>

@php
$course_type_array = array('Full Time','Part Time','Correspondence/Distance learning');

$grade_array = array('Scale 10 Grading System','Scale 4 Grading System','% Marks of 100 Maximum');

$array_countries = array('US','UK','Europe','Canada','Australia','Others');

$array_mentor_help = array("Determining target schools","Creating a schedule for college / MBA applications (from Test prep to Admissions)","Building your (or your child's) profile","Choosing Recommenders","Brainstorming for essays","Something else");

$education_plans = array("I want to change careers, and need help with making my application stand out.","I am confused about programs being offered by the institutes and the career choices afterwards. I need some guidance.","I have a very simple background story to tell. How should I tell it effectively? Basically, I need to make my profile & career work sound impressive.","I am running late on my application plans and need help managing the workload efficiently.","With no captivating extracurriculars, how do I stand out from the crowd?","Something else");

$higher_education = array('Spring 2021','Fall 2021','Spring 2022','Fall 2022','Spring 2023','Fall 2023','2023 & later');
@endphp


@include('web.student.prfile-modal.personal')
@include('web.student.prfile-modal.resume-heading')
@include('web.student.prfile-modal.key-skills')
@include('web.student.prfile-modal.summery')
@include('web.student.prfile-modal.test-score')
@include('web.student.prfile-modal.employment')
@include('web.student.prfile-modal.add-education')
@include('web.student.prfile-modal.edit-education')
@include('web.student.prfile-modal.aspiration')


<div class="profile_personal_output">
<div class="col-md-12 col-sm-12 col-xs-12 user-profile-img-section text-center padding-top-50 padding-bottom-15">
	<div class="container">
		<div class="row">
			<div class="user-profile-img center-block">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<img class="user-img" src="{{asset('uploads/student/'.$student->image)}}" alt="" />
				</div>

				<div class="user-name-row col-md-12 col-sm-12 col-xs-12">
					<h3 class="text-color-theme font-size-30 font-weight-600">{{$student->first_name}} {{$student->last_name}}</h3>
					<img class="edit-profile-iocn" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h3 class="text-color-second font-weight-600 font-size-20 margin-top-none">Profile Last Updated - {{date('d F, Y', strtotime(trim($student->updated_at)))}}</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 profile-complte-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 user-profile-row">
				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/stduentprof_expicon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Pursuing {{$student->current_specialization}}</h3>
						</div>

						<div class="left-date display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/phoneiconcommon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-bottom-none margin-top-none">{{$student->mobile}}</h3>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/LOcation-icon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">{{$student->city}} {{$country_Name}}</h3>
						</div>

						<div class="left-date display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/MAilicon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-bottom-none margin-top-none">{{$student->email}}</h3>
						</div>
					</div>
				</div>

<!-- 				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/Student_Incomeicon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">INR 3 lakh(s) 20 thousand</h3>
						</div>
					</div>
				</div> -->

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center">
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Student Profile Strenth</h3>
						</div>

						<div class="right-data display-grid display-grid-center">
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">{{$totalStrenth}}%</h3>
						</div>
					</div>
					<div class="strenth-container">
						<div class="skills-strenth"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 user-skills-section padding-bottom-50 padding-top-50">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 user-right-side-bar">
				<h3 class="letter-uppercase text-color-theme font-size-18 font-weight-600 padding-bottom-15">Quick Links</h3>
				<ul class="user-profile-link">
					<li><a href="#" id="scroll_resume_headline">Resume Headlines</a></li>
					<li><a href="#" id="scroll_skills">key Skills</a></li>
					<!-- <li><a href="#">Employment</a></li> -->
					<li><a href="#" id="scroll_education">Education</a></li>
					<!-- <li><a href="#">Extra Skills</a></li> -->
					<li><a href="#" id="scroll_profile_summary">Profile Summary</a></li>
					<li><a href="#" id="scroll_dersired_profile">Desireed Career Profile</a></li>
					<li><a href="#" id="scroll_resume_upload">Resume Upload</a></li>
				</ul>
			</div>

			<div class="col-md-9 col-sm-9 col-xs-12 user-left-data">
				<div class="col-md-12 col-sm-12 col-xs-12 headline-section box-shadow padding-25 margin-bottom-30" id="resume-heading">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Resume Headline</h3>
						<img class="resume-edit-icon" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="user-show-data color-gray font-size-20 resume_output">
						{{$student->resume_headline}}
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="key-skills">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Key skills</h3>
						<img class="skills-edit-icon" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="user-show-data">
						<ul id="skills_output">
							@foreach($skills as $skill) 
							<li>{{$skill->name}}</li>
							@endforeach
						</ul>
					</div>
				</div>

				<!-- <div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="employment">
					<div class="display-grid heading margin-bottom-15 space-between">
						<h3 class="font-weight-600 font-size-25 text-color-theme">Employment</h3>
						<h3 class="font-weight-600 text-color-second font-size-16 text-color-theme add_employment">ADD EMPLOYMENT</h3>
					</div>
					<div class="user-show-data margin-bottom-30">
						<h3 class="desination margin-top-none font-size-18 text-color-gray">Executive software engineer</h3>
						<h3 class="company_name margin-top-none font-size-16 text-color-gray">HCL Technologies</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15	">Feb 2019 to Present (1 Year 1 month)</h3>
						<b>Serving Notice Period</b>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book. <a href="">read more</a></p>
					</div>
					<div class="user-show-data margin-bottom-30">
						<h3 class="desination margin-top-none font-size-18 text-color-gray">Executive software engineer</h3>
						<h3 class="company_name margin-top-none font-size-16 text-color-gray">HCL Technologies</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15">Feb 2019 to Present (1 Year 1 month)</h3>
						<b>Serving Notice Period</b>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book. <a href="">read more</a></p>
					</div>
				</div> -->

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="education">
					<div class="display-grid heading margin-bottom-15 space-between">
						<h3 class="font-weight-600 font-size-25 text-color-theme">Education</h3>
						<h3 class="font-weight-600 text-color-second font-size-16 text-color-theme letter-uppercase add_education_btn cursor-pointer">ADD EDUCATION</h3>
					</div>

					<div class="user-show-data margin-bottom-30 education_output">
						@foreach($studentEducationDetail as $details)
						<div class="education_inner"><h3 class="desination margin-top-none font-size-18 text-color-gray">{{$details->course_specialization}} <span><img data-education="{{$details->id}}" class="education-edit-icon edit_education_btn" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" /></span></h3>

						<h3 class="company_name margin-top-none font-size-16 text-color-gray">{{$details->university_value}}</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15">{{$details->passing_out_year}} ({{$course_type_array[$details->course_type]}})</h3></div>
						@endforeach
						<!-- <h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_doctorate_btn cursur-pointer">Add Doctorate/PhD</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_masters_btn">Add Masters/Post-Graduation</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_twelfth_btn">Add 12th</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_tenth_btn">Add 10th</h3> -->
					</div>
				</div>

				<!-- <div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Extra skills">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Extra skills</h3>
						<img class="extra_skills" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="user-show-data">
						<ul>
							<li>Engineering</li>
							<li>Wordpress</li>
							<li>Majento</li>
						</ul>
					</div>
				</div> -->

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Profile_summary">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Profile summary</h3>
						<img class="profile-summery-btn" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="user-show-data">
						<div class="profileData">
                         @php
                         $profile_summary = $student->profile_summary;
                         $firstdesc=substr($profile_summary, 0, 100);
                         $totaldesc=substr($profile_summary, 160);
                         echo $output = '<p>'.$firstdesc.'<span id="dots"></span><span id="more">'.$totaldesc.'</span></p>';
                         @endphp
						</div>
						@if($totaldesc)
						<a onclick="myFunction()" id="myBtn" href="javascript:void(0)">read more</a>
						@endif
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Test_score_number">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Test Score Number</h3>
						<img class="test-score-btn" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="testscore_output">
						@if(!empty($ProfileTestScore))
						@php
                         $testName = App\MasterTest::where('id',$ProfileTestScore->test_id)->first();
						@endphp
						 <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">TestName:</h3><p>{{$testName->name}}</p>
						 <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Test Ateend Year:</h3><p>{{$ProfileTestScore->attend_year}}</p>
						 <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Test Score: </h3><p>{{$ProfileTestScore->score}}</p>
						 @endif
				    </div>
			</div>

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Desired-Career-Profile-output">
					<?php
                        if(!empty($aspiration)){
                           	$degree_value = App\MasterDegree::where('id',$aspiration->degree_id)->first();
                           	$degree_name  = $degree_value->name;
                           	$aspiration_countries = $aspiration->countries;
                           	$program_courses = $aspiration->program_courses;
                           	$explode_help = explode(',',$aspiration->mentors_to_help);
                           	$help_output  = '';
                           	foreach($explode_help as $help){
                             $help_output = '<p>'.$array_mentor_help[$help].'</p>';  
                           	}
                           	$education_plans  = $education_plans[$aspiration->education_plans];
                           	$higher_education = $higher_education[$aspiration->higher_education];
                        }else{
                           	$degree_name  = ''; 
                           	$aspiration_countries = '';
                           	$program_courses = '';
                           	$help_output  = '';
                           	$education_plans = '';
                           	$higher_education = '';
                        }
                         ?>
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Educational Aspirations</h3>
						<img class="desired_career_icon" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="display-grid aspriration_output">
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What Degree Program do you want to apply for</h3>
						<p>{{$degree_name}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What is your preferred list of countries for study</h3>
						<p>{{$aspiration_countries}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What programs are courses are you considering presently</h3>
						<p>{{$program_courses}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Where do you want UnivGateway mentors to help?</h3>
						{{$help_output}}
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What are key questions/concerns/worries about your education plans</h3>
						<p>{{$education_plans}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Which semester & year do you intend to go for higher education</h3>
						<p>{{$higher_education}}</p>
					</div>
					
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Resume_Upload">
					<div class="heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Resume Upload</h3>
						<p class="text-color-second font-size-16">Resume is the most important document for mentors. Mentors generally do not look at profiles</p>
					</div>
					@if($student->resume_upload)
					<div class="user-show-data display-grid space-between">
						<div class="left-data">
							@php
                             $filename = explode('+',$student->resume_upload);
							@endphp
							<h3 class="text-color-theme font-size-16 font-weight-600">Updated Resume File pdf ({{$filename[1]}}) - uploaded on {{date('d F, Y', strtotime(trim($student->updated_at)))}}</h3>
						</div>
						<div class="right-data text-right">
							<a href="{{asset('uploads/student/'.$student->resume_upload)}}" download><img style="width: 25px;" class="margin-bottom-15" src="{{asset('web/images/Downloadsicon.png')}}" alt="" /></a>
							<!-- <p class="text-color-second letter-uppercase text-color-second font-size-16">Delete Resume</p> -->
						</div>
					</div>
					@endif

					<div class="col-md-12 col-sm-12 col-xs-12">
						<form id="uploadresume" name="uploadresumeForm" method="post" action="{{ route('web.upload-resume') }}" class="upload-resume text-center padding-top-50" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" value="{{$student->id}}" id="student_id" name="student_id">
							<label for="file-upload" class="letter-uppercase upload-btn">Update Resume</label>
							<input id="file-upload"  type="file" name="upload_resume" class="center-block upload-resume-input" accept=".doc, .docx,.rtf, .pdf" required="">
							<p class="text-color-red-error"></p>
							<p class="text-color-gray">Support formats: doc, docs, rtf, pdf, upto 2MB</p>
							
							<div class=" col-md-12 col-sm-12 col-xs-12 text-right"><input type="submit" class="custom-btn letter-uppercase" name="submit" value=">Save & Submit" id="submit_resume"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
	<img src="{{asset('web/images/IllustrationBottomPROFILEPAGE.png')}}" class="center-block img-responsive" alt="" />
</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>

$(document).ready(function(){
 var strenth = "<?php echo $totalStrenth; ?>%";
 $(".skills-strenth").css("width", strenth);
  $(".multipleChosen").chosen({
      placeholder_text_multiple: "Enter your area of Expertise/Specialization" //placeholder
	}); //JSON.parse('" . json_encode($data) . "')
//var values = "<?php echo json_encode($student_skill); ?>";
var values = JSON.parse('<?php echo json_encode($student_skill); ?>');
//console.log(JSON.parse(values));

 var numbers = new Array();

for (i = 0; i < values.length; i++) {
  var pushvalue = values[i].toString();
  numbers.push(pushvalue);
}

$('.keyskillsInput').val(numbers).trigger('chosen:updated');
//$('.keyskillsInput').val(["1", "2", "2"]).trigger('chosen:updated');
});
   // $('#personal_submit').click(function() {
   //   var name = $("#personal_name").val();
   //   alert(name);
   // });
$(function() {
$("form[name='uploadresumeForm']").validate({
   rules: {
      upload_resume: "required",
      upload_resume: {required: true, accept: ".doc, .docx,.rtf, .pdf"},
    },
    submitHandler: function(form) {
    	form.submit();
    }
});   
$("form[name='personal_detail_form']").validate({
    // Specify validation rules
    rules: {
      first_name: "required",
      last_name: "required",
      mobile:{
      required:true,
	  minlength:10,
	  maxlength:10,
	  number: true
      },
      //profile_image: {required: true, accept: "image/jpg,image/jpeg,image/png,image/gif"},
    },
    submitHandler: function(form) {
      //form.submit();
      var token = $('meta[name="csrf-token"]').attr('content');
      var formData = new FormData(form);
      $.ajax({
                    _token: token,
                    url: "{{ route('web.student-personal') }}",
                    type: "POST",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                    	$(".profile_personal_output").html(response.personal);
                    	$('.Personal_details').hide('100');
                        $('.popup-bg-img').hide();
                        $('html, body').animate({ scrollTop: $(".user-profile-img-section").offset().top}, 1000);
                    	},
                 });

    }
  });
$("form[name='Add_Education_Form']").validate({
    // Specify validation rules
    rules: {
      degree_id: "required",
      select_university: "required",
      select_institute: "required",
      course_specialization: "required",
      passing_out_year: "required",
    },
    submitHandler: function(form) {
      //form.submit();
      var token = $('meta[name="csrf-token"]').attr('content');
      var formData = new FormData(form);
      $.ajax({
                    _token: token,
                    url: "{{ route('web.student-education') }}",
                    type: "POST",
                    data: formData,
                    dataType:'JSON',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                    	location.reload();
                    	 $("form[name='Add_Education_Form']").trigger("reset");
                    	 $(".education_output").html(response.education);
                    	 $('.education_model').hide('100');
                         $('.popup-bg-img').hide();
                         $('html, body').animate({ scrollTop: $("#education").offset().top}, 1000);
                    	},
                 });

    }
  });
$("form[name='Edit_Education_Form']").validate({
    // Specify validation rules
    rules: {
      degree_id: "required",
      select_university: "required",
      select_institute: "required",
      course_specialization: "required",
      passing_out_year: "required",
    },
    submitHandler: function(form) {
      //form.submit();
      var token = $('meta[name="csrf-token"]').attr('content');
      var formData = new FormData(form);
      $.ajax({
                    _token: token,
                    url: "{{ route('web.student-education-edit') }}",
                    type: "POST",
                    data: formData,
                    dataType:'JSON',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                    	 $(".education_output").html(response.education);
                    	 $('.education_model').hide('100');
                         $('.popup-bg-img').hide();
                         $('html, body').animate({ scrollTop: $("#education").offset().top}, 1000);
                    	},
                 });

    }
  });


});
/* Script for update student education */	
// $('#select_university').on('change', function() {
//   var uni_id = this.value;
//   var token = $('meta[name="csrf-token"]').attr('content');
//              $.ajax({
//                     _token: token,
//                     url: "{{ route('web.get-institute') }}",
//                     type: "POST",
//                     data: {
//                         "uni_id": uni_id,
//                     },
//                     success: function(response) {
//                     	$('#select_institute').html(response.institute);
//                     	},
//                  });
// });
// $('#select_institute').on('change', function() {
//   var institute_id = this.value;
//   var token = $('meta[name="csrf-token"]').attr('content');
//   $.ajax({
//                     _token: token,
//                     url: "{{ route('web.get-course') }}",
//                     type: "POST",
//                     data: {
//                         "institute_id": institute_id,
//                     },
//                     success: function(response) {
//                     	$('#select_course').html(response.course);
//                     	},
//                  });
// });
  /* Script for update student resume tagline */	
  $('#resume_headline_submit').click(function() {
             var resume_headline = $("#resume_headline").val();
             var email = $("#student_email").val();
             var token = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                    _token: token,
                    url: "{{ route('web.student-resume-headline') }}",
                    type: "POST",
                    data: {
                        "resume_headline": resume_headline,
                        "email": email,
                    },
                    success: function(response) {
                    	$('.resume_output').text(response['resume_headline']);
                    	$('.resume_output_field').val(response['resume_headline']);
                    	$('.heading-model').hide('100');
                    	$('.popup-bg-img').hide();
                    	$('html, body').animate({ scrollTop: $("#resume-heading").offset().top}, 1000);
                    	},
                 });
    });
  /* Script for update student profile summary tagline */	
  $('#profile_summary_submit').click(function() {
             var profile_summary = $("#profile_summary").val();
             var email = $("#student_email").val();
             var token = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                    _token: token,
                    url: "{{ route('web.student-profile-summary') }}",
                    type: "POST",
                    data: {
                        "profile_summary": profile_summary,
                        "email": email,
                    },
                    success: function(response) {
                    	location.reload();
                    	$('.profileData').html(response['profile_summary']);
                    	$('.profile-summery-model').hide('100');
                    	$('.popup-bg-img').hide();
                    	$('html, body').animate({ scrollTop: $("#Profile_summary").offset().top}, 1000);
                    	//$("#profile_summary").val('');
                    },
                 });
    });
  /* Script for update student test score */	
  $('#test_score_submit').click(function() {
  	         var student_id = $("#student_id").val();
             var test_name = $("#select_test_name").val();
             var attend_year = $("#attend_year").val();
             var score = $("#score").val();
             var token = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                    _token: token,
                    url: "{{ route('web.student-test-score') }}",
                    type: "POST",
                    data: {
                    	"student_id": student_id,
                        "test_name": test_name,
                        "attend_year": attend_year,
                        "score": score,
                    },
                    success: function(response) {
                       $('.testscore_output').html(response.test_score);
                       $('.test-score-model').hide('100');
                       $('.popup-bg-img').hide();
                       $('html, body').animate({ scrollTop: $("#Test_score_number").offset().top}, 1000);
                    },
                 });
    });
  /* KeySkills */
  $('#keyskills_submit').click(function() {
			   var selectedValues = $('.keyskillsInput').val();
			   var student_id = $("#student_id").val();
			   var token = $('meta[name="csrf-token"]').attr('content');
			   $.ajax({
                    _token: token,
                    url: "{{ route('web.student-skills') }}",
                    type: "POST",
                    data: {
                        "selectedValues": selectedValues,
                        "student_id": student_id,
                    },
                    success: function(response) {
                       $("#skills_output").html(response.skills);
                       $('.key-skills-model').hide('100');
                       $('.popup-bg-img').hide();
                       $('html, body').animate({ scrollTop: $("#key-skills").offset().top}, 1000);
                    },
                 });
  });
  $('#aspiration_submit').click(function() {
    var student_id = $("#student_id").val();
  	var degree_id = $("#degree_program_data").val();
  	var countries = [];
    $('.study_country_uk:checked').each(function(i){
          countries[i] = $(this).val();
    });
    var program_course = $("#considering_program").val();
    var mentor_help = [];
    $('.mentor_help:checked').each(function(i){
          mentor_help[i] = $(this).val();
    });
    var education_plans = $('.education_plans:checked').val();
    var higher_education = $('#higher_education').val();

    
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            _token: token,
            url: "{{ route('web.student-aspiration') }}",
            type: "POST",
            data: {
                "countries": countries,
                "student_id": student_id,
                "degree_id": degree_id,
                "program_course": program_course,
                "mentor_help": mentor_help,
                "education_plans": education_plans,
                "higher_education": higher_education,
                    },
                    success: function(response) {
                    	$(".aspriration_output").html(response.aspiration);
                    	$('.Desired-Career-Profile').hide('100');
                        $('.popup-bg-img').hide();
                        $('html, body').animate({ scrollTop: $("#Desired-Career-Profile-output").offset().top}, 1000);
                     
                    },
                 });

 
    
  });	
  /* Cancel Buttun  */
  $('.cancel-skills').click(function() {
   $('.key-skills-model').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#key-skills").offset().top}, 1000);
  });
  $('.cancel-resume').click(function() {
   $('.heading-model').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#resume-heading").offset().top}, 1000);
  });
  $('.cancel-education').click(function() {
   $('.education_model-edit').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#education").offset().top}, 1000);
  });
  $('.cancel-summary').click(function() {
   $('.profile-summery-model').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#Profile_summary").offset().top}, 1000);
  });
  $('.cancel-aspiration').click(function() {
   $('.Desired-Career-Profile').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#Desired-Career-Profile-output").offset().top}, 1000);
  });
  $('.cancel-score').click(function() {
   $('.test-score-model').hide('100');
   $('.popup-bg-img').hide();
   $('html, body').animate({ scrollTop: $("#Test_score_number").offset().top}, 1000);
  });

  
  

  
  
  

  
  /* Update Employment */ 
  // $('#employment_submit').click(function() {
  // 	        var student_id        = $("#student_id").val();
  //           var company_name = $("#company_name").val();
  //           var job_title    = $("#job_title").val();
  //           var city         = $("#city").val();
  //           var country_id   = $("#country_id").val();
  //           var job_start_date = $("#job_start_date").val();
  //           var job_end_date   = $("#job_end_date").val();
  //           var outcome_description = $("#outcome_description").val();
  //           var token = $('meta[name="csrf-token"]').attr('content');
  //           $.ajax({
  //                   _token: token,
  //                  
  //                   type: "POST",
  //                   data: {
  //                       "student_id": student_id,
  //                       "company_name": company_name,
  //                       "job_title": job_title,
  //                       "city": city,
  //                       "country_id": country_id,
  //                       "job_start_date": job_start_date,
  //                       "job_end_date": job_end_date,
  //                       "outcome_description": outcome_description,
  //                   },
  //                   success: function(response) {
                    	
  //                   },
  //                });
  //  });
</script>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>	
@endsection