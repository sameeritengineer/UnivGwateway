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