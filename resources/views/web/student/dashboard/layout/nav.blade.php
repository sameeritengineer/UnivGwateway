<div class="col-md-12 col-sm-12 col-xs-12 dash-header display-grid">
	<div class="logo">
		<a href="#" alt=""><img src="{{asset('web/images/MAinlogo.png')}}" alt="logo" /></a>
	</div>
	<div class="navigation-dashboard display-grid justify-content-end">
		<ul class="display-grid text-right">
			<li>
				<a href="#">
					<img class="margin-right-15" src="{{asset('web/studentdashboard/images/notificationsicon.png')}}">
					<div class="notification">2</div>
				</a>
				</li>
			<li class=" margin-left-15">
				<a href="{{route('web.student-profile')}}">
					<img class="margin-right-15" src="{{asset('web/studentdashboard/images/profileicon.png')}}">
				</a>
			</li>
			<li>
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
					<img src="{{asset('web/studentdashboard/images/LOgouticon.png')}}">
				</a>
			</li>
		</ul>
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 main-container background-color-theme">

