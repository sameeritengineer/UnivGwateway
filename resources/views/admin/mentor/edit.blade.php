@extends('admin.layouts.index')
@section('title','mentors')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Mentor</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mentor</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collpase show">
                                    <div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif   
@if (\Session::has('success'))
			    <div class="alert alert-success">
                 <strong>Success!</strong> {!! \Session::get('success') !!}
                </div>
@endif
@if (\Session::has('error'))
               	<div class="alert alert-danger">
                  <strong>Danger!</strong> {!! \Session::get('error') !!}
                </div>
@endif  

<form class="form form-horizontal" method="POST" action="{{ route('mentor.update',$mentor->id) }}" enctype="multipart/form-data">
	@csrf
    @method('PUT')
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fa fa-tag"></i> Registration Details </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">First Name:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{$mentor->first_name}}" class="form-control border-primary" type="text" placeholder="First Name:" id="userinput5" name="name" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput6">Email:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->email }}" class="form-control border-primary" type="email" name="email" placeholder="Email:" id="userinput6" required="" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Last Name:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{$mentor->last_name}}" class="form-control border-primary" type="text" placeholder="Last Name:" id="userinput5" name="lname" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput2">Status</label>
                                                            <div class="col-md-9">
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="status" id="radio2" {{$mentor->status==1?'checked':''}} value="1">
                                                               <label class="custom-control-label" for="radio2">Enable</label>
                                                            </div>    
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="status" id="radio1" {{$mentor->status==0?'checked':''}} value="0">
                                                               <label class="custom-control-label" for="radio1">Disable</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Password:</label>
                                                            <div class="col-md-9">
                                                                <input type="password"  class="form-control" id="password" name="password" value="mentor@password">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <h4 class="form-section"><i class="fa fa-tag"></i> Mentor Details </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Last University Attended:</label>
                                                            <div class="col-md-9">
                                                                <select id="projectinput5" name="university_id" class="form-control">
							                                    <option value="">Select University Attended</option>
							                                    @foreach($master_universities as $universities)
							                                    <option {{$mentor->university_attended_id==$universities->id?'selected':''}} value="{{$universities->id}}">{{$universities->name}}</option>
							                                    @endforeach
							                                 </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput6">Degree Program:</label>
                                                            <div class="col-md-9">
                                                                <select id="projectinput5" name="degree_id" class="form-control">
							                                    <option value="">Select Degree Program</option>
							                                    @foreach($master_degree as $degree)
							                                    <option {{$mentor->degree_program_id==$degree->id?'selected':''}} value="{{$degree->id}}">{{$degree->name}}</option>
							                                    @endforeach
							                                 </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Major Specialization:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->major_specialization}}" type="text" placeholder="Major Specialization:"  class="form-control" id="password" name="major_spl">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Employer Name:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->employer_name}}" type="text" placeholder="Employer Name:"  class="form-control" id="password" name="emp_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Linkedin Url:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->linkedin_url}}" type="url" placeholder="Linkedin Url:"  class="form-control" id="password" name="linkedin_url">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Country Name:</label>
                                                            <div class="col-md-9">
                                                                <select id="projectinput5" name="country_code" class="form-control">
                                                                <option value="">Select Country Code</option>
                                                                @foreach($master_country as $country)
                                                                <option {{$mentor->country_code==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Skills:</label>
                                                            <div class="col-md-9">
                                                                <div class="key_skill_container">
                                                               <select name="mentor_skills[]" class="multipleChosen keyskillsInput" multiple="true">
                                                            @foreach($master_skills as $skills)
                                                                <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                            @endforeach    
                                                            </select>
                                                           </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Year Of Graduation:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->year_of_graduation }}" id="datepicker" class="form-control border-primary" type="text" placeholder="Year Of Graduation:" id="userinput5" name="yog">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Mobile:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->mobile }}" type="number"  class="form-control" id="password" name="mobile">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput2">Is Employed</label>
                                                            <div class="col-md-9">
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="is_employed" id="is_employed2" {{$mentor->is_employed==1?'checked':''}} value="1">
                                                               <label class="custom-control-label" for="is_employed2">Yes</label>
                                                            </div>    
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="is_employed" id="is_employed1" {{$mentor->is_employed==0?'checked':''}} value="0">
                                                               <label class="custom-control-label" for="is_employed1">No</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Job Title:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->job_title }}" type="text" placeholder="Job Title:"  class="form-control" id="password" name="job_title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Picture Url:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->picture_url }}" type="url" placeholder="Picture Url:"  class="form-control" id="password" name="picture_url">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8">Featured:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $mentor->featured }}" type="number"  class="form-control" id="password" name="feature">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="form-section"><i class="fa fa-tag"></i> Description </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea id="userinput8" rows="6" class="form-control border-primary" name="detailed_bio" placeholder="Enter Description">{{ $mentor->detailed_bio }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <h4 class="form-section"><i class="fa fa-image"></i></i> Image </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput8"> Image</label>
                                                            <div class="col-md-9">
                                                                <label id="projectinput8" class="file center-block">
                                                                    <input type="file" name="image" id="file" onchange="loadFileImage(event)">
                                                                    <span class="file-custom"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <img src="{{asset('uploads/mentor/'.$mentor->image)}}" id="Imageoutput"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="form-section"><i class="fa fa-image"></i></i>Mentor Test Score</h4>
        <section id="form-control-repeater">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                            <div class="form-group col-12 mb-2 test-repeater">
                                                <div data-repeater-list="test_score_list">
@foreach($mentor_test_score as $test_score)
                                                    <div data-mentor_test_score="{{$test_score->id}}" data-repeater-item>
                                          <input type="hidden" name="mentor_test_score_id" value="{{$test_score->id}}">
                                                        <div class="row mb-1">
                                                            <div class="col-6 col-md-10">
                                                              <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Test Name:</label>
                                                            <div class="col-md-9">
                                                                <select id="projectinput5" name="test_name" class="select_test_data form-control">
                                                                <option value="">Select Test Name</option>
                                                                @foreach($master_test as $test)
                                                                <option data-max="{{$test->max_score}}" {{$test_score->id==$test->id?'selected':''}} value="{{$test->id}}">{{$test->name}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput6">Test Year:</label>
                                                            <div class="col-md-9">
                                                               <input value="{{ $test_score->test_year }}" id="test_datepicker" class="test_datepicker form-control border-primary" type="text" placeholder="Test Year:" id="userinput5" name="test_year">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Score:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $test_score->score }}" class="form-control border-primary" type="text" placeholder="Score:" id="userinput5" name="test_score">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Max Score:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ $test_score->max_score }}" class="test_max_score form-control border-primary" type="text" placeholder="Max Score:" id="userinput5" name="test_max_score">
                                                            </div>
                                                        </div>
                  
                                                    </div>

                                                </div>
                                                            </div>
                                                            <div class="col-2 col-xl-1">
                                                                <button  type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="feather icon-x"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
@endforeach

                                                </div>

                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="icon-plus4"></i> Add New Test Score
                                                </button>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

   
                    </div>
                </section>
<h4 class="form-section"><i class="fa fa-image"></i></i>Mentor Apllied Universities</h4>
                <section id="form-control-repeater">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                            <div class="form-group col-12 mb-2 applied-university-repeater">
                                                <div data-repeater-list="applied_university_list">
@foreach($mentor_universities_applied_list as $applied_list)
                                                    <div data-mentor_applied_university="{{$applied_list->id}}" data-repeater-item>
                                                 <input type="hidden" name="mentor_applied_university_id" value="{{$applied_list->id}}">
                                                        <div class="row mb-1">
                                                            <div class="col-6 col-md-10">
                                                              <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Univeristy Name:</label>
                                                            <div class="col-md-9">
                                                               <select id="projectinput5" name="applied_university_id" class="form-control">
                                                                <option value="">Select University Attended</option>
                                                                @foreach($master_universities as $universities)
                                                                <option {{$applied_list->university_id==$universities->id?'selected':''}} value="{{$universities->id}}">{{$universities->name}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput6">Year Applied:</label>
                                                            <div class="col-md-9">
                                                               <input value="{{$applied_list->year_applied }}" id="university_datepicker" class="university_datepicker form-control border-primary" type="text" placeholder="Year Applied:" id="userinput5" name="applied_university_year">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Status:</label>
                                                            <div class="col-md-9">
                                                                 <select id="projectinput5" name="applied_status" class="form-control">
                                                                  <option value="">Select Status</option>
                                                                  <option {{$applied_list->application_status==1?'selected':''}} value="1">Intrested</option>
                                                                  <option {{$applied_list->application_status==2?'selected':''}} value="2">Applied</option>
                                                                  <option {{$applied_list->application_status==3?'selected':''}} value="3">Admitted</option>
                                                                  <option {{$applied_list->application_status==4?'selected':''}} value="4">Rejected</option>
                                                                  </select>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                            </div>
                                                            <div class="col-2 col-xl-1">
                                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="feather icon-x"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

@endforeach

                                                </div>

                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="icon-plus4"></i> Add New Applied university
                                                </button>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

   
                    </div>
                </section>                
                                                
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <img id="FImageoutput"/>
                                                        </div>
                                                    </div>
                                                </div>    
                              

                                            <div class="form-actions right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<script>
$(document).ready(function(){
  $('.test-repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function(remove) {
            
            if (confirm('Are you sure you want to remove this item?')) {
                var id = $(this).attr('data-mentor_test_score');
                $.ajax({
                    url: "{{ route('delete-mentor-test-score') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    success: function(response) {
                    },
                 });
                $(this).slideUp(remove);
            }
        }
    });
   $('.applied-university-repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function(remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                var id = $(this).attr('data-mentor_applied_university');
                $.ajax({
                    url: "{{ route('delete-mentor-applied-university') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    success: function(response) {
                    },
                 });
                $(this).slideUp(remove);
            }
        }
    });    
 $(document).on("change", ".select_test_data" , function() { 
     var max_score = $('option:selected', this).attr('data-max');
     $(this).parent().parent().parent().next().find('.test_max_score').val(max_score);
   });
   $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

    $(document).on('focus', '.test_datepicker',function(){
            $(this).datepicker({
                uiLibrary: 'bootstrap4'
            })
        });
    $(document).on('focus', '.university_datepicker',function(){
            $(this).datepicker({
                uiLibrary: 'bootstrap4'
            })
        });
   $(".multipleChosen").chosen({
      placeholder_text_multiple: "Enter your area of Expertise/Specialization" //placeholder
    });
 var values = JSON.parse('<?php echo json_encode($mentor_skill); ?>');
 var numbers = new Array();
for (i = 0; i < values.length; i++) {
  var pushvalue = values[i].toString();
  numbers.push(pushvalue);
}
$('.keyskillsInput').val(numbers).trigger('chosen:updated');
  });
var loadFileImage = function(event) {
    var output = document.getElementById('Imageoutput');
    output.src = URL.createObjectURL(event.target.files[0]);
};
</script>    
@endsection