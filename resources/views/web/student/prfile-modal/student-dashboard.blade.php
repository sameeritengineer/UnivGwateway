<div class="custom-model Student_Dashboard_detail" id="Student_Dashboard_detail">
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
			<label class="color-gray font-size-13">Upload profile image <span class="color-red font-size-16"> *</span></label>
			<input type="file" class="form-control margin-bottom-5" name="profile_image">
			<p class="font-size-13 color-gray">Please upload format JPG, PNG, JPEG</p>
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<input type="submit" value="SAVE" class="custom-btn-2 border-none" id="personal_submit">
		</div>
	</form>
</div>