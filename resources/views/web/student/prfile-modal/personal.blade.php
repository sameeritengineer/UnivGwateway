<div class="custom-model Personal_details" id="Personal_detail">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" method="post" name="personal_detail_form" enctype="multipart/form-data">
		<input type="hidden" value="{{$student->id}}" name="student_id">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Personal details</h3>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">First Name <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" value="{{$student->first_name}}" placeholder="Enter Your Name" id="personal_name" name="first_name">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Last Name <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" value="{{$student->last_name}}" placeholder="Enter Your Name" name="last_name">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Mobile Number. <span class="color-red font-size-16"> *</span></label>
			<input type="number" class="form-control" value="{{$student->mobile}}" placeholder="Phone" name="mobile">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Email Address <span class="color-red font-size-16"> *</span></label>
			<input type="email" class="form-control" value="{{$student->email}}" placeholder="Enter Your Email" disabled="" name="email">
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Pursuing education <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" value="{{$student->current_specialization}}" placeholder="Pursuing education" name="Pursuing_edu">
		</div>

		<div class="width-100-per margin-bottom-30">
			<div class="display-grid">
				<select name="select_country" class="select_field_work width-100-per">
					<option value="">Select Country</option>
					@foreach($master_country as $country)
					<option {{$student->country_id==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">City <span class="color-red font-size-16"> *</span></label>
			<input type="text" class="form-control" value="{{$student->city}}" placeholder="City" name="cityname">
		</div>


<!-- 		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Total Experience <span class="color-red font-size-16"> *</span></label>
			<div class="display-grid">
				<select name="total_exp_years" class="margin-right-30 select_field_work mob-margin-bottom-15">
					<option>1 Years</option>
					<option>2 Years </option>
					<option>3 Years</option>
					<option>4 Years</option>
					<option>5 Years</option>
				</select>

				<select name="total_exp_month" class="select_field_work">
					<option>Months</option>
					<option>0 Moth</option>
					<option>1 Month</option>
					<option>2 Months</option>
					<option>3 Months</option>
					<option>4 Months</option>
				</select>
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Annual Salary <span class="color-red font-size-16"> *</span></label>
			<div class="display-grid">
				<select name="annual_salary_lac" class="margin-right-30 select_field_work mob-margin-bottom-15">
					<option>Lacs</option>
					<option>1 Lac </option>
					<option>3 Lacs</option>
					<option>4 Lacs</option>
					<option>5 Lacs</option>
				</select>

				<select name="annual_salary_thousand" class="select_field_work">
					<option>Thousands</option>
					<option>0 Thousands</option>
					<option>5 Thousands</option>
					<option>10 Thousands</option>
					<option>15 Thousands</option>
					<option>20 Thousands</option>
				</select>
			</div>
		</div>

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Current Location <span class="color-red font-size-16"> *</span></label>
			<div class="display-grid margin-bottom-15">
				<div class="width-50-per">
					<input type="radio" class="margin-right-15" name="current_location"><span>India</span>
				</div>
				<div class="width-50-per">
					<input type="radio" class="margin-right-15"  name="current_location"><span>Outside India</span>
				</div>
			</div>
			<div class="display-grid">
				<select name="select_location" class="margin-right-30 select_field_work mob-margin-bottom-15">
					<option>Tell us about your current location</option>
					<option>Delhi </option>
					<option>Noida</option>
					<option>Ghaziabad</option>
					<option>Gurgaon</option>
				</select>

				<select name="select_country" class="select_field_work">
					<option>Select Country</option>
					<option>Australia</option>
					<option>Canada</option>
					<option>UK</option>
					<option>US</option>
					<option>Japan</option>
				</select>
			</div>
		</div>
 -->
		

		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Upload profile image <span class="color-red font-size-16"> *</span></label>
			<input type="file" class="form-control margin-bottom-5" name="profile_image">
			<p class="font-size-13 color-gray">Please upload format JPG, PNG, JPEG</p>
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<input type="submit" value="SAVE" class="custom-btn-2 border-none" id="personal_submit">
		</div>
	</form>
</div>