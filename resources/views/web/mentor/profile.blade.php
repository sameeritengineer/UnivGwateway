@extends('web.layouts.profile-index')
@section('title','Mentor Profile')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12 padding-top-50">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 dashboard-title-banner display-grid space-between align-items-end">
				<div class="profile_row">
					<div class="student-detail">
						<img class="margin-right-30" src="images/MENTOR_stuartlucasprofile.png" alt="">
					</div>
					<div class="">
						<div class="name-row display-flex">
							<h3 class="font-size-35 font-weight-600 text-color-theme">Sara Davis</h3>
							<!--<img class="cursor-pointer" src="../images/Editiconcommon3.png" alt="" />-->
						</div>
						<div class="row-parral text-white font-size-20 margin-bottom-10">
							<h3 class="font-size-25 text-color-theme letter-uppercase margin-top-none">Biography</h3>
							<p class="color-gray line-height-30 font-size-18">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						</div>
					</div>
				</div>
				<div class="pull-right width-100-per">
					<h3 class="text-color-second font-size-20 font-weight-500 text-right">Profile Last Updated - Today</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 profile-complte-section margin-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 user-profile-row">
				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="right-data display-grid mob-margin-bottom-15">
						<img class="margin-right-15" src="../images/stduentprof_expicon.png" alt="">
						<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Associate Director MBA Admissions and Marketing</h3>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="right-data display-grid mob-margin-bottom-15">
						<img class="margin-right-15" src="../images/LOcation-icon.png" alt="">
						<h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Delhi India</h3>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="left-date display-grid mob-margin-bottom-15">
						<img class="margin-right-15" src="../images/phoneiconcommon.png" alt="">
						<h3 class="text-white font-size-20 margin-bottom-none margin-top-none">99 999 9999 99</h3>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
					<div class="left-date display-grid mob-margin-bottom-15">
						<img class="margin-right-15" src="../images/MAilicon.png" alt="">
						<h3 class="text-white font-size-20 margin-bottom-none margin-top-none">infosara@gmail.com</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 user-fill-detail-section margin-bottom-30">
	<div class="container">
		<div class="row">
			<div class="editHeader margin-top-30">
				<h3 class="font-size-25 text-color-theme font-weight-600 margin-top-none letter-uppercase">Basic Info</h3>
			</div>
			<form action="#" name="signUpForm" class="user_profile_form margin-top-50" method="post" novalidate="novalidate">
				<div class="display-grid align-item-baseline margin-bottom-30 profile-edit-row">
					<div class="form_field_row width-47-per">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500">First Name <span>*</span></label>	
							<input class="width-100-per circle_form_field validate-equalTo-blur error" type="text" name="f_name" placeholder="Required">
						</div>
					</div>
					<div class="form_field_row width-47-per margin-left-5-per">
						<div class="input-field-row width-100-per">
							<label class="input-lable-name text-color-theme font-size-20 font-weight-500">Last Name <span>*</span></label>	
							<input class="width-100-per circle_form_field valid" type="text" name="l_name" placeholder="Required">
						</div>
					</div>
				</div>

				<div class="display-grid align-item-baseline margin-bottom-30 profile-edit-row">
					<div class="form_field_row width-47-per">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500">Profession <span>*</span></label>	
							<input class="width-100-per circle_form_field validate-equalTo-blur error" type="text" name="profession" placeholder="Required">
						</div>
					</div>
					<div class="form_field_row width-47-per margin-left-5-per">
						<div class="input-field-row width-100-per">
							<label class="input-lable-name text-color-theme font-size-20 font-weight-500">Address <span>*</span></label>	
							<input class="width-100-per circle_form_field valid" type="text" name="profile-address" placeholder="Required">
						</div>
					</div>
				</div>

				<div class="display-grid align-item-baseline margin-bottom-30 profile-edit-row">
					<div class="form_field_row width-47-per">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500">Email <span>*</span></label>	
							<input class="width-100-per circle_form_field validate-equalTo-blur error" type="email" name="profile-email" placeholder="Required">
						</div>
					</div>
					<div class="form_field_row width-47-per margin-left-5-per">
						<div class="input-field-row width-100-per">
							<label class="input-lable-name text-color-theme font-size-20 font-weight-500">Phone <span>*</span></label>	
							<input class="width-100-per circle_form_field valid" type="number" name="profile-phone" placeholder="Required">
						</div>
					</div>
				</div>
				<div class="display-grid align-item-baseline">
					<div class="input-field-row width-100-per">
						<label class="nput-lable-name text-color-theme font-size-20 font-weight-500 letter-uppercase">Biography <span>*</span>
						</label>	
						<textarea class="width-100-per circle_form_field profile-textarea" name="biography"></textarea>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 padding-left-none padding-right-none padding-top-50">
					<div class="editHeader">
						<h3 class="font-size-25 text-color-theme font-weight-600 margin-top-none letter-uppercase margin-bottom-none">External links</h3>
					</div>
					<div class="display-grid align-item-baseline padding-top-50 margin-bottom-30">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500 letter-uppercase">Facebook URL :</label>	
							<input type="text" class="width-100-per circle_form_field" placeholder="Paste your link here" name="fb_url">
						</div>
					</div>
					<div class="display-grid align-item-baseline margin-bottom-30">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500 letter-uppercase">Linkedin URL :</label>	
							<input type="text" class="width-100-per circle_form_field" placeholder="Paste your link here" name="linkedin_url">
						</div>
					</div>
					<div class="display-grid align-item-baseline margin-bottom-30">
						<div class="input-field-row width-100-per">
							<label class="nput-lable-name text-color-theme font-size-20 font-weight-500 letter-uppercase">Instagram URL :</label>	
							<input type="text" class="width-100-per circle_form_field" placeholder="Paste your link here" name="instagram_url">
						</div>
					</div>
				</div>

				<div class="display-grid margin-top-30 flex-content-center col-md-12 col-sm-12 col-xs-12 padding-right-none padding-left-none padding-bottom-50 align-item-baseline">
					<div class="custom-btn margin-right-20 mob-margin-bottom-15 letter-uppercase cursor-pointer">Cancel</div>
					<input type="submit" value="Save & Submit" class="custom-btn letter-uppercase">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
	<img src="../images/IllustrationBottomPROFILEPAGE.png" class="center-block img-responsive" alt="" />
</div>
@endsection