<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="popup-bg-img"></div>		
@include('web.student.prfile-modal.student-dashboard')
<div class="student-title">Student Dashboard</div>
		<div style="background-image: url('{{asset('web/studentdashboard/images/Student-MEntordashboard-BG.png')}}');" class="col-md-12 col-sm-12 col-xs-12 dashboard-title-banner display-grid space-between align-items-end">
			<div class="display-grid">
				<div class="student-detail">
					<img class="student-dashboard-edit margin-right-30" src="{{asset('uploads/student/'.$student->image)}}" alt="" />
				</div>
				<div>
					<div class="name-row display-flex">
						<h3 class="letter-uppercase font-size-25 font-weight-600 text-white">{{$student->first_name}} {{$student->last_name}} </h3>
						<img class="cursor-pointer student-dashboard-edit" src="{{asset('web/images/editiconWHite.png')}}" alt="" />
					</div>
					<div class="row-parral text-white font-size-20 margin-bottom-10">
						<span>{{$student->email}}</span> <span>{{$student->mobile}}</span> <span>{{$program_name}}</span> <span>Duration</span>
					</div>
					<div class="letter-uppercase text-color-second font-size-25 font-weight-600">Professional Package</div>
				</div>
			</div>
			<div class="padding-top-30">
				<h3 class="text-white font-size-20 font-weight-500">Profile Last Updated - {{date('d F, Y', strtotime(trim($student->updated_at)))}}</h3>
			</div>
		</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>		
<script>
	$("form[name='personal_detail_form']").validate({
    // Specify validation rules
    rules: {
      first_name: "required",
      last_name: "required",
      mobile:{
      required:true,
	  minlength:10,
	  maxlength:10,
	  number: true
      },
      //profile_image: {required: true, accept: "image/jpg,image/jpeg,image/png,image/gif"},
    },
    submitHandler: function(form) {
      //form.submit();
      var token = $('meta[name="csrf-token"]').attr('content');
      var formData = new FormData(form);
      $.ajax({
                    _token: token,
                    url: "{{ route('web.student-personal') }}",
                    type: "POST",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                       location.reload();
                    	},
                 });

    }
  });
</script>		