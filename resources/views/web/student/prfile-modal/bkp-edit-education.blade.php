<div class="custom-model education_model-edit" id="education_model-edit">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	@foreach($studentEducationDetail as $detail)
	<form class="custom-popup-form education_form-class" name="Edit_Education_Form" id="education_form-{{$detail->id}}">
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<input type="hidden" value="{{$detail->id}}" name="education_form_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Edit Education {{$detail->id}}</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Degree <span class="color-red"> *</span></label>
			<select name="degree_id" class="select_field_work form-control notice_period">
				@foreach($master_degree as $degree)
				<option {{$detail->degree_id==$degree->id?'selected':''}} value="{{$degree->id}}">{{$degree->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">University <span class="color-red"> *</span></label>
			<select name="select_university" id="select_university" class="select_field_work form-control notice_period">
				@foreach($master_university as $university)
				<option {{$detail->university_id==$university->id?'selected':''}} value="{{$university->id}}">{{$university->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Institute <span class="color-red"> *</span></label>
			@php
			 $institutes = App\MasterInstitute::select('id','name')->where('university_id',$detail->university_id)->where('status',1)->get();
			@endphp
			<select name="select_institute" id="select_institute" class="select_field_work form-control notice_period">   
				@foreach($institutes as $institute)
				    <option {{$detail->institute_id==$institute->id?'selected':''}}  value="{{$institute->id}}">{{$institute->name}}</option>
				@endforeach    
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Course <span class="color-red"> *</span></label>
			@php
			 $courses = App\MasterCourse::select('id','name')->where('institute_id',$detail->institute_id)->get();
			@endphp
			<select name="select_course" id="select_course" class="select_field_work form-control notice_period">
				@foreach($courses as $course)
				<option {{$detail->course_id==$course->id?'selected':''}}  value="{{$course->id}}">{{$course->name}}</option>
				@endforeach 
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Specialization <span class="color-red"> *</span></label>
            <input type="text" placeholder="Specialization" value="{{$detail->course_specialization}}" class="margin-right-15 input-key-skills form-control" name="course_specialization">
		</div>

		<div class="width-100-per margin-bottom-30">
			@php
             $i = 0;
			@endphp
			<label class="color-gray font-size-13">Course Type</label>
			<div class="display-grid space-between">
				@foreach($course_type_array as $type)
				<div class="">
					<input type="radio" {{$detail->course_type==$i?'checked':''}} class="margin-right-15" value="{{$i}}" name="course_type"><span>{{$type}}</span>
				</div>
				@php
                $i++;
			    @endphp
				@endforeach
			</div>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option value="">Select passing out year</option>
				<option {{$detail->passing_out_year==2015?'selected':''}}>2015</option>
				<option {{$detail->passing_out_year==2016?'selected':''}}>2016</option>
				<option {{$detail->passing_out_year==2017?'selected':''}} >2017</option>
				<option {{$detail->passing_out_year==2018?'selected':''}}>2018</option>
				<option {{$detail->passing_out_year==2019?'selected':''}}>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Grading System</label>
			@php
             $i = 0;
			@endphp
			<select name="grading_system" class="select_field_work form-control notice_period">
				<option>Select grading system</option>
				@foreach($grade_array as $grade)
				<option {{$detail->grading_system==$i?'selected':''}} value="{{$i}}">{{$grade}}</option>
				@php
                $i++;
			    @endphp
				@endforeach
			</select>
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
	@endforeach
</div>