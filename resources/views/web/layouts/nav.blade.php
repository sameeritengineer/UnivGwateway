<!---- Phone View menu -->
<div class="bg-img">
    <div class="mob-nav">
        <p class="close-btn"><i class="fa fa-close"></i></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about-us.php" target="top">About Us</a></li>
            <li><a href="how-it-works.php">How it works</a></li>
            <li><a href="mentors.php">Mentors</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="contact.php" target="top">Contact Us</a></li>
        </ul>
    </div>
</div> 
<!---- //Phone View menu-->  

<div class="col-md-12 col-sm-12 col-xs-12 header-menu">
    <div class="container">
        <div class="row">
            <div class="menu-nav col-xs-12 col-sm-12 col-md-12">
                <div class="col-md-2 col-sm-2 col-xs-4 logo">
                    <a href="index.php" alt=""><img src="{{asset('web/images/MAinlogo.png')}}" alt="logo" /></a>
                </div>
                <div class="col-md-8 col-sm-8 hidden-xs menu">
                    <ul class="navigation">
                        <li style="border-left:0px;"><a href="index.php">Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="how-it-works.php">How it works</a></li>
                        <li><a href="#">Team</a></li>
                        <li class="about-menu"><a href="#">Services <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-ul">
                                <li><a href="{{route('mentor_register')}}">My Mentor</a></li>
                                <li><a href="#">Services 2</a></li>
                                <li><a href="#">Services 3</a></li>
                                <li><a href="#">Services 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
@if(Illuminate\Support\Facades\Auth::check())
<ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>  </li>
                        </ul>
                    </li>
</ul>
  
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@else
<div class="col-md-2 col-sm-2 col-xs-6 login_header">
                    <span><i class="fa fa-user-circle"></i></span><br>
                    <a href="{{route('web.student-signin')}}">Login</a> | <a href="{{route('web.student-signup')}}">Sign Up</a>
                </div>
@endif
                
                <div class="col-xs-2 visible-xs"><i class="fa fa-bars pull-right menu-icon home_menu_bar"></i></div>
            </div>
        </div>
    </div>
</div>