<div class="custom-model testscore_model-edit" id="testscore_model-edit">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
@if(!empty($ProfileTestScore))	
@foreach($ProfileTestScore as $score)
    <form method="POST" action="{{ route('web.student-test-score-edit') }}" class="custom-popup-form test_form-class" name="Edit_Test_Form" id="test_form-{{$score->id}}">
    	{{ csrf_field() }}
    	<input type="hidden" value="{{$student->id}}" name="student_id">
    	<input type="hidden" value="{{$score->id}}" id="test_form_id" name="test_form_id">
		<div class="editHeader margin-bottom-15">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Test Score Details</h3>
		</div>

		<div class="width-100-per margin-bottom-30">
			<div class="display-grid">
				<select name="select_test_name" id="select_test_name" class="select_field_work width-100-per">
					<option value="">Select Test Name</option>
					@foreach($master_test as $test)
                    <option {{$score->test_id==$test->id?'selected':''}} value="{{$test->id}}">{{$test->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Year of completion</label>
            <input type="number" class="form-control" value="{{$score->attend_year}}" placeholder="Year of completion" id="attend_year" name="attend_year">
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13">Absolute Score</label>
            <input type="number" class="form-control" value="{{$score->total_score}}" placeholder="Absolute Score " id="score" name="score">
		</div>

		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second cancel-score">Cancel</div>
			<input type="submit" value="SAVE" class="custom-btn-2 border-none" id="test_score_submit-edit">
		</div>
	</form>
@endforeach
@endif	
</div>	

