@extends('web.layouts.index')
@section('title','Student Signup')
@section('content')

<?php 

// echo $otp = Session::get('otp');
// echo $first_name = Session::get('firstname');
 $mobile = Session::get('mobile');


 ?>

<!--  <form action="{{ route('web.verifyotp') }}" name="signUpForm" class="user_signup_form margin-top-50" action="" method="post">
{{ csrf_field() }}
<input class="width-100-per form_field" type="number" name="otp" placeholder="Enter Otp">
<input type="submit" value="verify" class="login-btn margin-top-30">
</form>	 -->
<style>
.otpError {
    padding: 10px;
    margin: 18px;
    text-align: center;
}
</style>
<div class="col-md-12 col-sm-12 col-xs-12 otp-form-section padding-top-50 padding-bottom-50">
	<div class="container">
		<div class="row">
			<div class="otp-form box-shadow ">
				@if (\Session::has('error'))
		               	<div class="otpError alert alert-danger">
		                  <strong>{!! \Session::get('error') !!}</strong> 
		                </div>
                    @endif
				<form id="otpForm" action="{{ route('web.verifyotp') }}" method="post" class="" name="otp-form">
					{{ csrf_field() }}
					<a class="padding-left-25 padding-right-25" href="{{route('web.student-signup')}}"><i class="fa fa-angle-left font-size-55 text-color-theme"></i></a>
					<div class="otp-form-row">
						<h3 class="font-weight-600 text-color-theme font-size-30 margin-top-none text-center">verification Code</h3>
						<p class="font-weight-600 text-color-second font-size-20  text-center">Please enter the verification code sent to +91 {{$mobile}}</p>
						<div id="otp-row" class="padding-top-50">
							<div id="inner-otp-row">
								<input id="otp-form-field" name="otp" type="text" maxlength="4" />
							</div>
						</div>
						<div class="button-key padding-top-50">
							<div class="number-btn" id="one-num">1</div>
							<div class="number-btn" id="two-num">2</div>
							<div class="number-btn" id="three-num">3</div>
							<div class="number-btn" id="four-num">4</div>
							<div class="number-btn" id="five-num">5</div>
							<div class="number-btn" id="six-num">6</div>
							<div class="number-btn" id="seven-num">7</div>
							<div class="number-btn" id="eight-num">8</div>
							<div class="number-btn" id="nine-num">9</div>
							<div class="number-btn" id="none"></div>
							<div class="number-btn" id="zero">0</div>
							<div class="number-btn" id="cancle"><img style="width: 30px;" src="images/back-close-btn.png" alt="" /></div>
						</div>
						<input type="submit" value="verify" class="login-btn margin-top-30" style="display: none">
					</div>
				</form>
				<div class="resend-otp-btn"><a href="{{ route('web.resendotp') }}">Resend OTP</a></div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
$("#otp-form-field").on("keyup", function() {
  if(this.value.length == 4){
    	$("#otpForm").submit();
    }
});		
  $(".number-btn").click(function(){
    var number = $(this).text();
    $("#otp-form-field").val(function() {
         var add = this.value + number;
         var value = $("#otp-form-field").val();
         if(value.length < 4){
         	return add;
         }
    });
     var total = $("#otp-form-field").val();
     if(total.length == 4){
       $("#otpForm").submit();
     }
  });
});
</script>
@endsection					