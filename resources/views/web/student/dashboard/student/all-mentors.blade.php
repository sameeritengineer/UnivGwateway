@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
	<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
@include('web.student.dashboard.layout.student-board')
    <div class="right-data-row col-md-12 col-sm-12 col-xs-12">
			<div class="button-row display-grid dashboard-btn-row padding-bottom-50">
				<div class="display-grid width-100-per">
					<form class="search-form width-100-per text-right" name="search-form">
						<select class="select-search-form"> 
							<option>Search by</option>
							<option>option 2</option>
							<option>option 3</option>
						</select>
						<input type="search" class="search-field" name="">
						<input type="submit" class="search-btn" name="">
						<img class="search-img" src="images/Searchicon.png" alt="">
					</form>
				</div>
			</div>
            <div class="panel_body">
            	{{ csrf_field() }}

             <div class="mentors_output"></div>
            </div> 
            
	        <div class="view-all-btn"><a class="view-all" href="">Load More</a></div>
		</div>
	</div>
<script>
    $(document).ready(function() {
      var _token = $('input[name="_token"]').val();
      function load_data(){
      	
      }
    });
</script>	
@endsection