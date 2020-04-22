<div class="custom-model education_model" id="education_model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Add_Education_Form">
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Degree <span class="color-red"> *</span></label>
			<select name="degree_id" class="select_field_work form-control notice_period">
				<option value="">Select Degree</option>
				@foreach($master_degree as $degree)
				<option value="{{$degree->id}}">{{$degree->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">University <span class="color-red"> *</span></label>
			<input type="text" placeholder="University" class="margin-right-15 input-key-skills form-control" name="select_university">
			<!-- <select name="select_university" id="select_university" class="select_field_work form-control notice_period">
				<option value="">Select University</option>
				@foreach($master_university as $university)
				<option value="{{$university->id}}">{{$university->name}}</option>
				@endforeach
			</select> -->
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Institute <span class="color-red"> *</span></label>
			<input type="text" placeholder="Institute" class="margin-right-15 input-key-skills form-control" name="select_institute">
			<!-- <select name="select_institute" id="select_institute" class="select_field_work form-control notice_period">
				<option>Select Institute</option>
			</select> -->
		</div>

		<!-- <div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Course <span class="color-red"> *</span></label>
			<select name="select_course" id="select_course" class="select_field_work form-control notice_period">
				<option>Select course</option>
			</select>
		</div> -->

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Specialization <span class="color-red"> *</span></label>
            <input type="text" placeholder="Specialization" class="margin-right-15 input-key-skills form-control" name="course_specialization">
		</div>

		<div class="width-100-per margin-bottom-30">
			@php
             $i = 0;
			@endphp
			<label class="color-gray font-size-13">Course Type</label>
			<div class="display-grid space-between">
				@foreach($course_type_array as $type)
				<div class="">
					<input type="radio" class="margin-right-15" value="{{$i}}" name="course_type"><span>{{$type}}</span>
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
				<option>2010</option>
				<option>2011</option>
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
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
				<option value="{{$i}}">{{$grade}}</option>
				@php
                $i++;
			    @endphp
				@endforeach
			</select>
		</div>
		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Grade Value</label>
            <input type="text" placeholder="Grade Value" class="margin-right-15 input-key-skills form-control" name="grade_value">
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel-education">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>