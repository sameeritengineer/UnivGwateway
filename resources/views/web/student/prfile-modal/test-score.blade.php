<div class="custom-model test-score-model" id="test-score-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="profile-summery-form">
		<div class="editHeader margin-bottom-15">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Test Score Number</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<div class="display-grid">
				<select name="select_test_name" id="select_test_name" class="select_field_work width-100-per">
					<option value="">Select Test Name</option>
					@foreach($master_test as $test)
					@if(!empty($ProfileTestScore))
                    <option {{$ProfileTestScore->test_id==$test->id?'selected':''}} value="{{$test->id}}">{{$test->name}}</option>
					@else
                    <option value="{{$test->id}}">{{$test->name}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Attended Year</label>
			@if(!empty($ProfileTestScore))
            <input type="number" class="form-control" value="{{$ProfileTestScore->attend_year}}" placeholder="Attended Year" id="attend_year" name="attend_year">
			@else
            <input type="number" class="form-control" placeholder="Attended Year" id="attend_year" name="attend_year">
			@endif
			
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Absolute Score</label>
			@if(!empty($ProfileTestScore))
			<input type="number" class="form-control" value="{{$ProfileTestScore->score}}" placeholder="Absolute Score " id="score" name="score">
			@else
            <input type="number" class="form-control" placeholder="Absolute Score " id="score" name="score">
			@endif
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel-score">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="test_score_submit">
		</div>
	</form>
</div>