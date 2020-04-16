@extends('web.layouts.index')
@section('title','Student Signup')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12 user_login_section">
	<div class="container">
		<div class="row">
			<div class="user_form_section">
				<div class="form_title_section text-center">
					<img src="{{asset('web/images/U.png-icon.png')}}" align="" /><br>
					<h3 class="text-color-theme font-weight-500 font-size-40">Login</h3>
					@if ($errors->any())
				    <div class="alert alert-danger">
				        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
					<form class="user_login_form margin-top-50" method="POST" action="{{ route('login') }}">
						@csrf 
						<div class="form_field_row display-grid-center">
							<img class="margin-right-15" src="{{asset('web/images/MAIL-icon.png')}}" alt="" />
							<!-- <input class="width-100-per form_field" type="email" name="login_email" placeholder="Email"> -->
							<input id="email" type="email" class="width-100-per form_field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


						</div>
						<div class="form_field_row display-grid-center">
							<img class="margin-right-15" src="{{asset('web/images/Lock_passwordicon.png')}}" alt="" />
							<!-- <input class="width-100-per form_field" type="password" name="login_password" placeholder="Password"> -->
							<input id="password" type="password" placeholder="Password" class="width-100-per form_field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<!-- <div class="form_field_row display-grid-center">
							<select class="wide" style="display: none;">
				                <option>Login as</option> 
				                <option>Login 1</option>
				                <option>Login 2</option>
				             </select>
							<img class="margin-right-15" src="images/Loginasicon.png" alt="" />
							<div class="user-select wide form_field width-100-per text-left cursor-pointer" tabindex="0">
								<span class="current color-gray">Login as</span>
								<i class="pull-right fa fa-angle-down font-weight-500 text-color-second font-size-40"></i>
								<ul class="list form-list-item">
									<li data-value="" class="option selected focus">Login as</li>
									<li data-value="" class="option">Login 1</li>
									<li data-value="" class="option">Login 2</li>
								</ul>
							</div>
						</div> -->
						<input type="submit" value="Login" class="login-btn margin-top-30">
					</form>
				</div>
				<div class="display-grid margin-top-50 space-between">
					<div class="form-comn-btn background-color-second mob-margin-bottom-20"><a class="letter-uppercase text-white text-center font-size-16" href="#">Forget Password?</a></div>
					<div class="form-comn-btn background-color-second"><a class="letter-uppercase text-white text-center font-size-16" href="{{route('web.student-signup')}}">Register an account</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection