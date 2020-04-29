<div class="custom-model employment-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Add_Employment_Form">
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Add Employment</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Company Name <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Job Title <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" name="organization_type">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">City <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" id="city" name="city" placeholder="City" name="organization_type">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Country <span class="color-red font-size-16"> *</span></label>
			<select name="select_country" class="select_field_work width-100-per">
					<option value="">Select Country</option>
					@foreach($master_country as $country)
					<option value="{{$country->id}}">{{$country->name}}</option>
					@endforeach
				</select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Job Start date <span class="color-red font-size-16"> *</span></label>
			<input type="date" class="form-control" id="job_start_date" name="job_start_date" placeholder="Job Start date" name="organization_type">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Job End date <span class="color-red font-size-16"> *</span></label>
			<input type="date" class="form-control" id="job_end_date" name="job_end_date" placeholder="Job End date" name="organization_type">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Description <span class="color-red font-size-16"> *</span></label>
			<textarea name="outcome_description" class="form-control popup-text-area" placeholder="Type here..."></textarea>
		</div>


		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="Submit" value="SAVE" class="custom-btn-2 border-none" name="">
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