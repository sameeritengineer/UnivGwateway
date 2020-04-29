<div class="custom-model test-score-model" id="test-score-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Add_Test_Form">
		<div class="editHeader margin-bottom-15">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Test Score Details</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<div class="display-grid">
				<select name="select_test_name" id="select_test_name" class="select_field_work width-100-per" required="">
					<option value="">Select Test Name</option>
					@foreach($master_test as $test)
                    <option value="{{$test->id}}">{{$test->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Year of completion</label>
            <input type="number" class="form-control" placeholder="Year of completion" id="attend_year" name="attend_year">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Absolute Score</label>
            <input type="number" class="form-control" placeholder="Absolute Score " id="score" name="score">
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel-score">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="test_score_submit">
		</div>
	</form>
</div>