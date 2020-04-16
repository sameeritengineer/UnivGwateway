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
<div class="custom-model heading-model" id="heading-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="resume-hd">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Resume Headline</h3>
			<p class="font-size-14">It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>
		</div>
		<textarea class="form-control popup-text-area resume_output_field" name="resume_headline" id="resume_headline">{{$student->resume_headline}}</textarea>
		<div class="display-grid margin-top-30 flex-content-right">
			<!-- <div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div> -->
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="resume_headline_submit">
		</div>
	</form>
</div>
<div class="custom-model key-skills-model" id="key-skills-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="key-skill-form">
		
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Key Skills</h3>
			<p class="font-size-14">Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma. Max limit is 250 character(s) including commas.</p>
		</div>
		<label>Skills</label>
		<div class="key_skill_container">
			 <select class="multipleChosen keyskillsInput" multiple="true">
			 	@foreach($master_skills as $skill)
			        <option value="{{$skill->id}}">{{$skill->name}}</option>
			    @endforeach    
		      </select>
		</div>
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="keyskills_submit">
		</div>
	</form>	
</div>

<!-- <div class="custom-model employment-model" id="employment">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Add_Employment_Form">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Employment</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Your Designation <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" placeholder="Type Your Designation" name="desination_type">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Your Organization <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" placeholder="Type Your Organization" name="organization_type">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">In this your current company?</label>
			<div class="display-grid">
				<div class="width-50-per">
					<input type="radio" class="margin-right-15" name="current_company"><span>Yes</span>
				</div>
				<div class="width-50-per">
					<input type="radio" class="margin-right-15"  name="current_company"><span>No</span>
				</div>
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Started work from <span class="color-red font-size-16"> *</span></label>
			<div class="display-grid">
				<select name="select_year" class="margin-right-30 select_field_work mob-margin-bottom-15">
					<option>Select Year</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
					<option>2019</option>
				</select>

				<select name="select_month " class="select_field_work">
					<option>Select Month</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
					<option>Jan</option>
				</select>
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Worked Till <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" placeholder="Present" name="work_till">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Current Salary <span class="color-red font-size-16"> *</span></label>
			<div class="display-grid">
				<div class="width-50-per">
					<input type="radio" class="margin-right-15" name="currency"><span>Indian Rupees</span>
				</div>
				<div class="width-50-per">
					<input type="radio" class="margin-right-15"  name="currency"><span>US Dollars</span>
				</div>
			</div>
		</div>

		<div class="display-grid margin-bottom-30">
				<select name="select_year" class="margin-right-30 select_field_work mob-margin-bottom-15">
					<option>0 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
					<option>1 Lac</option>
				</select>

				<select name="select_month " class="select_field_work">
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
					<option>0 Thousand</option>
				</select>
			</div>

			<label class="color-gray font-size-13">Top 5 key skills that you think are important for current employment
				<span class="color-red font-size-16"> *</span>
			</label>
			<div class="inpWrap margin-bottom-30">
				<div class="chipsContainer display-grid">
					<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer"> 	<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
						<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
					</div>

					<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer">	<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
						<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
					</div>

					<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer">	<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
						<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
					</div>

					<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer">	<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
						<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
					</div>
				</div>
				<input type="text" placeholder="Enter your area of Expertise/Specialization" class="input-key-skills border-none form-control box-shadow-none" name="top-key-skills" id="keySkillSugg" maxlength="250" autocomplete="off">
			</div>

			<div class="Describe margin-bottom-30">
				<label class="color-gray font-size-13">Describe your Job Profile</label>
				<textarea class="form-control popup-text-area" placeholder="Type here..."></textarea>
			</div>

			<div class="notice-period-section margin-bottom-30">
				<label class="color-gray font-size-13">Notice Period</label>
				<select name="select_notice_period" class="select_field_work form-control notice_period">
					<option>Select Notice Period</option>
					<option>15 Days or less</option>
					<option>1 Month</option>
					<option>2 Months</option>
					<option>3 Months</option>
					<option>More than 3 Months</option>
					<option>Serving Notice Period</option>
				</select>
			</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div> -->

<div class="custom-model education_model" id="education_model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Add_Education_Form">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Education <span class="color-red"> *</span></label>
			<select name="add_education" class="select_field_work form-control notice_period">
				<option>Select Education</option>
				<option>Masters/Post-Graduation</option>
				<option>12th</option>
				<option>10th</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Course <span class="color-red"> *</span></label>
			<select name="select_course" class="select_field_work form-control notice_period">
				<option>Select course</option>
				<option>CA</option>
				<option>CS</option>
				<option>DM</option>
				<option>ICWA (CMA)</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Specialization <span class="color-red"> *</span></label>
			<select name="select_specialization" class="select_field_work form-control notice_period">
				<option>Select specialization</option>
				<option>CA</option>
				<option>First attemt</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">University/Institute <span class="color-red"> *</span></label>
			<input type="text" class="form-control" placeholder="Select University/Institute" name="select_university">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Course Type</label>
			<div class="display-grid space-between">
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Full Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Part Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Correspondence/Distance learning</span>
				</div>
			</div>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option>Select passing out year</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Grading System</label>
			<select name="grading_system" class="select_field_work form-control notice_period">
				<option>Select grading system</option>
				<option>Scale 10 Grading System</option>
				<option>Scale 4 Grading System</option>
				<option>% Marks of 100 Maximum</option>
			</select>
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>

<div class="custom-model add_doctorate" id="add_doctorate">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="doctorate">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Education <span class="color-red"> *</span></label>
			<select name="doctorate" class="select_field_work form-control notice_period">
				<option>Doctorate/PhD</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Course <span class="color-red"> *</span></label>
			<select name="select_course" class="select_field_work form-control notice_period">
				<option>Select course</option>
				<option>CA</option>
				<option>CS</option>
				<option>DM</option>
				<option>ICWA (CMA)</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Specialization <span class="color-red"> *</span></label>
			<select name="select_specialization" class="select_field_work form-control notice_period">
				<option>Select specialization</option>
				<option>CA</option>
				<option>First attemt</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">University/Institute <span class="color-red"> *</span></label>
			<input type="text" class="form-control" placeholder="Select University/Institute" name="select_university">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Course Type</label>
			<div class="display-grid space-between">
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Full Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Part Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Correspondence/Distance learning</span>
				</div>
			</div>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option>Select passing out year</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Grading System</label>
			<select name="grading_system" class="select_field_work form-control notice_period">
				<option>Select grading system</option>
				<option>Scale 10 Grading System</option>
				<option>Scale 4 Grading System</option>
				<option>% Marks of 100 Maximum</option>
			</select>
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>

<div class="custom-model add_Masters" id="add_Masters">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Masters-Post-Graduation">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Education <span class="color-red"> *</span></label>
			<select name="doctorate" class="select_field_work form-control notice_period">
				<option>Masters/Post-Graduation</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Course <span class="color-red"> *</span></label>
			<select name="select_course" class="select_field_work form-control notice_period">
				<option>Select course</option>
				<option>CA</option>
				<option>CS</option>
				<option>DM</option>
				<option>ICWA (CMA)</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Specialization <span class="color-red"> *</span></label>
			<select name="select_specialization" class="select_field_work form-control notice_period">
				<option>Select specialization</option>
				<option>CA</option>
				<option>First attemt</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">University/Institute <span class="color-red"> *</span></label>
			<input type="text" class="form-control" placeholder="Select University/Institute" name="select_university">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Course Type</label>
			<div class="display-grid space-between">
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Full Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Part Time</span>
				</div>
				<div class="">
					<input type="radio" class="margin-right-15" name="course_type"><span>Correspondence/Distance learning</span>
				</div>
			</div>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option>Select passing out year</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Grading System</label>
			<select name="grading_system" class="select_field_work form-control notice_period">
				<option>Select grading system</option>
				<option>Scale 10 Grading System</option>
				<option>Scale 4 Grading System</option>
				<option>% Marks of 100 Maximum</option>
			</select>
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>

<div class="custom-model add_twelfth" id="add_twelfth">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="add_twelfth_form">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Education <span class="color-red"> *</span></label>
			<select name="doctorate" class="select_field_work form-control notice_period">
				<option>12th</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Board <span class="color-red"> *</span></label>
			<select name="select_board" class="select_field_work form-control notice_period">
				<option>Select Board</option>
				<option>U.P. Board</option>
				<option>CBSE Board</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option>Select passing out year</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">School Medium <span class="color-red"> *</span></label>
			<select name="select_medium_school" class="select_field_work form-control notice_period">
				<option>Select medium</option>
				<option>Hindi</option>
				<option>English</option>
				<option>Gujarati</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Total Marks <span class="color-red"> *</span></label>
			<select name="select_total_marks" class="select_field_work form-control notice_period">
				<option>Select total marks</option>
				<option>40-44.9%</option>
				<option>45-49.9%</option>
				<option>50-54.9%</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">English Marks</label>
			<input type="text" class="form-control" placeholder="Marks (out of 100)" name="twelfth_english_marks">
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Maths Marks</label>
			<input type="text" class="form-control" placeholder="Marks (out of 100)" name="twelfth_maths_marks">
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>

<div class="custom-model add_tenth" id="add_tenth">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="add_tenth_form">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Education</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Education <span class="color-red"> *</span></label>
			<select name="doctorate" class="select_field_work form-control notice_period">
				<option>10th</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Board <span class="color-red"> *</span></label>
			<select name="select_board" class="select_field_work form-control notice_period">
				<option>Select Board</option>
				<option>U.P. Board</option>
				<option>CBSE Board</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Passing Out Year <span class="color-red"> *</span></label>
			<select name="passing_out_year" class="select_field_work form-control notice_period">
				<option>Select passing out year</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">School Medium <span class="color-red"> *</span></label>
			<select name="select_medium_school" class="select_field_work form-control notice_period">
				<option>Select medium</option>
				<option>Hindi</option>
				<option>English</option>
				<option>Gujarati</option>
			</select>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-13">Total Marks <span class="color-red"> *</span></label>
			<select name="select_total_marks" class="select_field_work form-control notice_period">
				<option>Select total marks</option>
				<option>40-44.9%</option>
				<option>45-49.9%</option>
				<option>50-54.9%</option>
			</select>
		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div>

<!-- <div class="custom-model extra-skills-model" id="extra-skills-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="extra-key-skill-form">
		<div class="editHeader margin-bottom-15">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Extra Key Skills</h3>
		</div>
		<label>Skills</label>
		<div class="inpWrap">
			<div class="chipsContainer display-grid">
				<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer"> 
					<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
					<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
				</div>
				<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer"> 
					<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
					<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
				</div>
				<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer"> 
					<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
					<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
				</div>
				<div class="selected-skills margin-right-15 margin-bottom-15" data-id="Web developer" title="Web developer"> 
					<span class="tagTxt margin-right-15 color-gray font-size-13">Web Developer</span>
					<a class="material-icons close" href="javascript:void(0)"><i class="fa fa-close font-size-16"></i></a>
				</div>
			</div>
			<input type="text" placeholder="Enter your area of Expertise/Specialization" class="input-key-skills border-none form-control box-shadow-none" name="extra-key-skills" id="keySkillSugg" maxlength="250" autocomplete="off">
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
		</div>
	</form>
</div> -->

<div class="custom-model profile-summery-model" id="profile-summery-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="profile-summery-form">
		<div class="editHeader margin-bottom-15">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Profile Summary</h3>
		</div>

		<div class="Describe margin-bottom-30">
			<label class="color-gray font-size-13 margin-bottom-15">Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters</label>
			<textarea class="form-control popup-text-area profile-summery" name="profile_summary" id="profile_summary" placeholder="Type here...">{{$student->profile_summary}}</textarea>
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="profile_summary_submit">
		</div>
	</form>
</div>

<div class="custom-model Desired-Career-Profile" id="Desired-Career-Profile">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Desired-Career-Profile">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Educational Aspirations</h3>
		</div>

		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-15"> (A.) What Degree Program do you want to apply for ?</label>
			<select id="degree_program_data" name="degree_program_data" class="select_field_work form-control notice_period">
				<option value="">Select Degree Program</option>
				@foreach($master_degree as $degree)
				<option {{$aspiration->degree_id==$degree->id?'selected':''}} value="{{$degree->id}}">{{$degree->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-15"> (B.) What is your preferred list of countries for study ?</label>
			<div class="display-grid space-between">
				@php
				 $array_countries = array('US','UK','Europe','Canada','Australia','Others');
                 $countries = $aspiration->countries;
                 $explode_country = explode(',',$countries);
				@endphp
				@foreach($array_countries as $country)
				@if(in_array($country, $explode_country))
                 <div class="width-50-per">
					<input type="checkbox" checked="" class="margin-right-15 study_country_uk" value="{{$country}}" name="study_country_us[]"><span>{{$country}}</span>
				</div>
				@else
                 <div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="{{$country}}" name="study_country_us[]"><span>{{$country}}</span>
				</div>
				@endif
				@endforeach

				<!-- <div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="UK" name="study_country_uk[]"><span>UK</span>
				</div>

				<div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="Europe" name="study_country_uk[]"><span>Europe</span>
				</div>

				<div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="Canada" name="study_country_uk[]"><span>Canada</span>
				</div>

				<div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="Australia" name="study_country_uk[]"><span>Australia</span>
				</div>

				<div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="Others" name="study_country_uk[]"><span>Others</span>
				</div> -->
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13"> (C.) What programs are courses are you considering presently</label>
			<input type="text" id="considering_program" value="{{$aspiration->program_courses}}" placeholder="" class="input-key-skills form-control" name="considering_program">
		</div>

		<div class="width-100-per margin-bottom-30">
			@php
             $array_mentor_help = array("Determining target schools","Creating a schedule for college / MBA applications (from Test prep to Admissions)","Building your (or your child's) profile","Choosing Recommenders","Brainstorming for essays","Something else");
             $i =0;
             $mentors_to_help         = $aspiration->mentors_to_help;
             $explode_mentors_to_help = explode(',',$mentors_to_help);
			@endphp
			<label class="color-gray font-size-15"> (D.) Where do you want UnivGateway mentors to help?</label>
			@foreach($array_mentor_help as $help)
			@if(in_array($i, $explode_mentors_to_help))
            <div class="display-flex">
				<input type="checkbox" checked="" class="margin-right-15 mentor_help" value= "{{$i}}" name="mentor_help[]">
				<p class="font-size-16 color-gray">{{$help}}</p>
			</div>
			@else
            <div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value= "{{$i}}" name="mentor_help[]">
				<p class="font-size-16 color-gray">{{$help}}</p>
			</div>
			@endif
			@php
            $i++;
			@endphp
			@endforeach
			<!-- <div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value="Creating a schedule for college / MBA applications (from Test prep to Admissions)" name="mentor_help[]">
				<p class="font-size-16 color-gray">Creating a schedule for college / MBA applications (from Test prep to Admissions)</p>
			</div>
			<div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value="Building your (or your child's) profile" name="mentor_help[]">
				<p class="font-size-16 color-gray">Building your (or your child's) profile .</p>
			</div>
			<div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value="Choosing Recommenders" name="mentor_help[]">
				<p class="font-size-16 color-gray">Choosing Recommenders.</p>
			</div>
			<div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value="Brainstorming for essays" name="mentor_help[]">
				<p class="font-size-16 color-gray">Brainstorming for essays.</p>
			</div>
			<div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value="Something else" name="mentor_help[]">
				<p class="font-size-16 color-gray">Something else</p>
			</div> -->
		</div>

		<div class="width-100-per margin-bottom-30">
			@php
             $education_plans = array("I want to change careers, and need help with making my application stand out.","I am confused about programs being offered by the institutes and the career choices afterwards. I need some guidance.","I have a very simple background story to tell. How should I tell it effectively? Basically, I need to make my profile & career work sound impressive.","I am running late on my application plans and need help managing the workload efficiently.","With no captivating extracurriculars, how do I stand out from the crowd?","Something else");
             $i =0;
			@endphp
			<label class="color-gray font-size-15"> (E.) What are key questions/concerns/worries about your education plans?</label>
			@foreach($education_plans as $plan)
			<div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="{{$i}}" name="education_plans" {{$aspiration->education_plans==$i?'checked':''}}>
				<p class="font-size-16 color-gray">{{$plan}}</p>
			</div>
			@php
            $i++;
			@endphp
			@endforeach
			<!-- <div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="2" name="education_plans">
				<p class="font-size-16 color-gray">I am confused about programs being offered by the institutes and the career choices afterwards. I need some guidance.</p>
			</div>
			<div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="3" name="education_plans">
				<p class="font-size-16 color-gray">I have a very simple background story to tell. How should I tell it effectively? Basically, I need to make my profile & career work sound impressive.</p>
			</div>
			<div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="4" name="education_plans">
				<p class="font-size-16 color-gray">I am running late on my application plans and need help managing the workload efficiently.</p>
			</div>
			<div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="5" name="education_plans">
				<p class="font-size-16 color-gray">With no captivating extracurriculars, how do I stand out from the crowd?</p>
			</div>
			<div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="7" name="education_plans">
				<p class="font-size-16 color-gray">Something else</p>
			</div> -->
			<div class="width-100-per margin-bottom-30">
				<input type="text" class="form-control education_plans_val" name="education_plans_val">
			</div>
		</div>

		<div class="notice-period-section margin-bottom-30">
			@php
             $higher_education = array('Spring 2021','Fall 2021','Spring 2022','Fall 2022','2023 & later');
             $i =0;
			@endphp
			<label class="color-gray font-size-15"> (G.) Which semester & year do you intend to go for higher education</label>
			<select id="higher_education" name="degree_program" class="select_field_work form-control notice_period">
				<option value="">Select higher education</option>
				@foreach($higher_education as $edu)
				<option {{$aspiration->higher_education==$i?'selected':''}} value="{{$i}}">{{$edu}}</option>
				@php
	            $i++;
				@endphp
				@endforeach
			</select>

		</div>
		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="aspiration_submit">
		</div>
	</form>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 user-profile-img-section text-center padding-top-50 padding-bottom-15">
	<div class="container">
		<div class="row">
			<div class="user-profile-img center-block">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<img class="user-img" src="{{asset('web/images/Student_Saradavisprofilepic.png')}}" alt="" />
					<div class="camara-icon">
						<img class="" src="{{asset('web/images/Profilechangestudenticon.png')}}" alt="" />
					</div>
				</div>

				<div class="user-name-row col-md-12 col-sm-12 col-xs-12">
					<h3 class="text-color-theme font-size-30 font-weight-600">{{$student->first_name}} {{$student->last_name}}</h3>
					<img class="edit-profile-iocn" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h3 class="text-color-second font-weight-600 font-size-20 margin-top-none">Profile Last Updated - Today</h3>
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
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Pursuing B.tech (electronics)</h3>
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
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Delhi India</h3>
						</div>

						<div class="left-date display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/MAilicon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-bottom-none margin-top-none">{{$student->email}}</h3>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center mob-margin-bottom-15">
							<img class="margin-right-30" src="{{asset('web/images/Student_Incomeicon.png')}}" alt="" />
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">INR 3 lakh(s) 20 thousand</h3>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="display-grid space-between">
						<div class="right-data display-grid display-grid-center">
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Student Profile Strenth</h3>
						</div>

						<div class="right-data display-grid display-grid-center">
							<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">80%</h3>
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

<div class="col-md-12 col-sm-12 col-xs-12 user-skills-section padding-bottom-50 padding-top-50">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 user-right-side-bar">
				<h3 class="letter-uppercase text-color-theme font-size-18 font-weight-600 padding-bottom-15">Quick Links</h3>
				<ul class="user-profile-link">
					<li><a href="#">Resume Headlines</a></li>
					<li><a href="#">key Skills</a></li>
					<!-- <li><a href="#">Employment</a></li> -->
					<li><a href="#">Education</a></li>
					<!-- <li><a href="#">Extra Skills</a></li> -->
					<li><a href="#">Frofile Summary</a></li>
					<li><a href="#">Desireed Career Profile</a></li>
					<li><a href="#">Resume Upload</a></li>
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

					<div class="user-show-data margin-bottom-30">
						<h3 class="desination margin-top-none font-size-18 text-color-gray">Executive software engineer</h3>
						<h3 class="company_name margin-top-none font-size-16 text-color-gray">Delhi University Other</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15">2016 (Full Time)</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_doctorate_btn cursur-pointer">Add Doctorate/PhD</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_masters_btn">Add Masters/Post-Graduation</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_twelfth_btn">Add 12th</h3>
						<h3 class="joining margin-top-none font-size-16 text-color-second margin-bottom-15 cursor-pointer add_tenth_btn">Add 10th</h3>
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
                         echo $output = '<p>'.$firstdesc.'<span id="dots">...</span><span id="more">'.$totaldesc.'</span></p>';;
                         @endphp

						</div>
						<a onclick="myFunction()" id="myBtn" href="javascript:void(0)">read more</a>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Desired Career-Profile">
					<div class="display-grid heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Educational Aspirations</h3>
						<img class="desired_career_icon" src="{{asset('web/images/Editiconcommon3.png')}}" alt="" />
					</div>
					<div class="display-grid">
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What Degree Program do you want to apply for</h3>
						<p>Engineer, science</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What is your preferred list of countries for study</h3>
						<p>{{$aspiration->countries}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What programs are courses are you considering presently</h3>
						<p>{{$aspiration->program_courses}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Where do you want UnivGateway mentors to help?</h3>
						@php
                         $explode_help = explode(',',$aspiration->mentors_to_help);
						@endphp
						@foreach($explode_help as $help)
						<p>{{$array_mentor_help[$help]}}</p>
						@endforeach
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What are key questions/concerns/worries about your education plans</h3>
						<p>{{$education_plans[$aspiration->education_plans]}}</p>
					</div>
					<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
						<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Which semester & year do you intend to go for higher education</h3>
						<p>{{$higher_education[$aspiration->higher_education]}}</p>
					</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 headline-section padding-25 margin-bottom-30 box-shadow " id="Profile summary">
					<div class="heading margin-bottom-15">
						<h3 class="margin-right-15 font-weight-600 font-size-25 text-color-theme">Resume Upload</h3>
						<p class="text-color-second font-size-16">Resume is the most important document for mentors. Mentors generally do not look at profiles</p>
					</div>
					<div class="user-show-data display-grid space-between">
						<div class="left-data">
							<h3 class="text-color-theme font-size-16 font-weight-600">Updated Resume File pdf - uploaded on 10 feb, 2020</h3>
						</div>
						<div class="right-data text-right">
							<img style="width: 25px;" class="margin-bottom-15" src="{{asset('web/images/Downloadsicon.png')}}" alt="" />
							<p class="text-color-second letter-uppercase text-color-second font-size-16">Delete Resume</p>
						</div>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<form class="upload-resume text-center padding-top-50">
							<label for="file-upload" class="letter-uppercase upload-btn">Update Resume</label>
							<input id="file-upload" style="display: none;" type="file" name="upload-resume" class="center-block upload-resume-input">
							<p class="text-color-gray">Support formats: doc, docs, rtf, pdf, upto 2MB</p>
						</form>
					</div>
				</div>
				<div class=" col-md-12 col-sm-12 col-xs-12 text-right"><a class="custom-btn letter-uppercase" href="">Save & Submit</a></div>
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
  //Chosen
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
console.log(numbers);

$('.keyskillsInput').val(numbers).trigger('chosen:updated');

   //$('.keyskillsInput').val(["1", "2", "2"]).trigger('chosen:updated');
	});	
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
                    	$('.profileData').html(response['profile_summary']);
                    	$('.profile-summery-model').hide('100');
                    	$('.popup-bg-img').hide();
                    	$('html, body').animate({ scrollTop: $("#Profile_summary").offset().top}, 1000);
                    	//$("#profile_summary").val('');
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

                    },
                 });

 
    
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