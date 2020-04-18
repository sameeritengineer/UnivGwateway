<div class="col-md-2 col-sm-3 col-xs-12 sidebar-navigation">
		<ul>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/dashboard.png')}}" alt="" /> Dashboard </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/Knowledgelib_Studentdashicon.png')}}" alt="" /> Knowladge Library </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/mymentors_Studentdashicon.png')}}" alt="" /> My Mentors </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/support.png')}}" alt="" /> Support </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/results_Studentdashicon.png')}}" alt="" /> Results </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/documents_Studentdashicon.png')}}" alt="" /> Documents </a></li>
			<li><a href="#"><img class="margin-right-15" src="{{asset('web/studentdashboard/images/Downloadsicon.png')}}" alt="" /> Welcome, {{ Auth::user()->name }} </a></li>
			<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a> </li>
		</ul>
  
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
	</div>

	