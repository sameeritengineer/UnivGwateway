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
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel-summary">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="profile_summary_submit">
		</div>
	</form>
</div>