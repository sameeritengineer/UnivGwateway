@extends('web.layouts.index')
@section('title','Student Signup')
@section('content')
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<div class="col-md-12 col-sm-12 col-xs-12 user_login_section">
	<div class="container">
		<div class="row">
			<div class="user_form_section">
				<div class="form_title_section text-center">
					<img src="{{asset('web/images/U.png-icon.png')}}" align="" /><br>
					<h3 class="text-color-theme font-weight-500 font-size-40">Student Sign Up</h3>
					@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
                    @endif
                    @if (\Session::has('success'))
					    <div class="alert alert-success">
		                 <strong>{!! \Session::get('success') !!}</strong> 
		                </div>
                    @endif
               	    @if (\Session::has('error'))
		               	<div class="alert alert-danger">
		                  <strong>{!! \Session::get('error') !!}</strong> 
		                </div>
                    @endif
					<form action="{{ route('web.student-signup') }}" name="signUpForm" class="user_signup_form margin-top-50" action="" method="post">
						{{ csrf_field() }}
						<div class="display-grid align-item-baseline margin-bottom-30">
							<div class="form_field_row width-47-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/nameicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<input class="width-100-per form_field" value="{{ old('f_name') }}" type="text" name="f_name" placeholder="First Name *">
									</div>
								</div>
							</div>
							<div class="form_field_row width-47-per margin-left-5-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/nameicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<input class="width-100-per form_field" type="text" value="{{ old('l_name') }}" name="l_name" placeholder="Last Name *">
									</div>
								</div>
								<span class="form_error" style="color:red"></span>
							</div>
						</div>
						<div class="display-grid align-item-baseline margin-bottom-30">
							<div class="form_field_row width-47-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/nameicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<span class="phonecode_selected"></span>
										<input class="width-100-per form_field" type="number" value="{{ old('mobile') }}"  name="mobile" placeholder="Mobile No. *">
									</div>
								</div>
								<span class="form_error" style="color:red">We will send an OTP to this number</span>
							</div>

							<div class="form_field_row display-grid-center width-47-per margin-left-5-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/MAIL-icon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<input class="width-100-per form_field" value="{{ old('email') }}" type="email" name="email" placeholder="Email *">
									</div>
								</div>
							</div>
						</div>
						<div class="display-grid align-item-baseline margin-bottom-30">
                          <div class="form_field_row width-47-per margin-left-5-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/nameicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<select name="county_id" id="select_country">
											<option value="">Select Country</option>
											@foreach($master_country as $country)
											<option data-phonecode="{{$country->phone_code}}" value="{{$country->id}}">{{$country->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<span class="form_error" style="color:red"></span>
							</div>
					    </div>		

						<div class="display-grid align-item-baseline margin-bottom-20">
							<div class="form_field_row display-grid-center width-47-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/Lock_passwordicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">	
										<input class="width-100-per form_field" type="password" name="password" placeholder="Choose a password">
									</div>
								</div>
							</div>
							<div class="form_field_row display-grid-center width-47-per margin-left-5-per">
								<div class="display-grid align-item-baseline margin-bottom-5 width-100-per">
									<div class="form-field-icon">
										<img class="margin-right-15" src="{{asset('web/images/Lock_passwordicon.png')}}" alt="" />
									</div>
									<div class="input-field-row">
										<input class="width-100-per form_field" type="password" name="confirm_password" placeholder="Confirm password">
									</div>
								</div>
								
							</div>
						</div>
						<!-- <div class="display-grid margin-bottom-30">
							<div class="form_field_row mob-margin-bottom-none width-47-per text-left">
								<span class="text-gray font-size-18">Verified</span>
							</div>
							<div class="form_field_row display-grid-center width-47-per margin-left-5-per">
								<div class="display-grid space-between width-100-per">
									<div class="width-47-per mob-width-50-per text-left">
										<input class="margin-right-5" type="radio" name="Verified">
										<span class="color-gray font-size-18">Phone</span>
									</div>
								</div>
							</div>
						</div> -->

						<div class="google-rechaptcha text-center">
							 <div class="g-recaptcha" data-sitekey="6LdPGOkUAAAAAN1d7I_AMzG30DR2qq40LbWMOe2b"></div>

						</div>
						<input type="submit" value="Sign Up" class="login-btn margin-top-30">
					</form>
				</div>
				<div class="display-grid margin-top-50 display-grid-center">
					<div class="margin-right-15 font-size-18 color-gray">Already have an account?</div>
					<div class="form-comn-btn background-color-second padding-10-20"><a class="letter-uppercase text-white text-center font-size-16" href="{{route('web.student-signin')}}">Login</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    // Wait for the /books/doAddbookDOM to be ready
$(function() {
  $('body').on('change', '#select_country', function() {
    var country_id = this.value;
    var phonecode = $('option:selected', this).attr('data-phonecode');
    $(".phonecode_selected").text(phonecode);

  });
  $("form[name='signUpForm']").validate({
    // Specify validation rules
    rules: {
      f_name: "required",
      l_name: "required",
      county_id: "required",
      email: {
        required: true,
        email: true
      },
      mobile:{
      required:true,
	  minlength:10,
	  number: true
      },
      password: {
        required: true,
        minlength: 8
      },
     confirm_password : {
        minlength : 8,
        equalTo : '[name="password"]'
      }
    },
    // Specify validation error messages
    messages: {
      f_name: "Please enter your firstname",
      l_name: "Please enter your lastname",
      mobile: "Please enter your mobile number",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

<!-- <script>
var $form = $("form"),
$successMsg = $(".alert");
$.validator.addMethod("letters", function(value, element) {
  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
});
$form.validate({
  rules: {
    f_name: {
      required: true,
      minlength: 3,
      letters: true
    },
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    f_name: "Please specify your name (only letters and spaces are allowed)",
    email: "Please specify a valid email address"
  },
  submitHandler: function(form) {
    //$successMsg.show();
    form.submit();
  }
});
</script> -->
@endsection