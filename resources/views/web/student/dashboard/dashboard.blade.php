@extends('web.student.dashboard.layout.index')
@section('student_title','Student UNIV GATEWAY DASHBOARD')
@section('studentcontent')
<div class="col-md-10 col-sm-9 col-xs-12 right-main-container">
		<div class="student-title">Student Dashboard</div>
		<div style="background-image: url('{{asset('web/studentdashboard/images/Student-MEntordashboard-BG.png')}}');" class="col-md-12 col-sm-12 col-xs-12 dashboard-title-banner display-grid space-between align-items-end">
			<div class="display-grid">
				<div class="student-detail">
					<img class="margin-right-30" src="{{asset('web/studentdashboard/images/MENTOR_stuartlucasprofile.png')}}" alt="" />
				</div>
				<div>
					<div class="name-row display-flex">
						<h3 class="letter-uppercase font-size-25 font-weight-600 text-white">Sara Davis</h3>
						<img class="cursor-pointer" src="{{asset('web/studentdashboard/images/editiconWHite.png')}}" alt="" />
					</div>
					<div class="row-parral text-white font-size-20 margin-bottom-10">
						<span>infosara@gmail.com</span> <span>99 999 99 99</span> <span>MBA</span> <span>Duration</span>
					</div>
					<div class="letter-uppercase text-color-second font-size-25 font-weight-600">Professional Package</div>
				</div>
			</div>
			<div class="padding-top-30">
				<h3 class="text-white font-size-20 font-weight-500">Profile Last Updated - Today</h3>
			</div>
		</div>

		<div class="right-data-row col-md-12 col-sm-12 col-xs-12">
			<div class="button-row display-grid dashboard-btn-row">
				<h3 class="margin-top-none mob-margin-bottom-15 margin-bottom-none text-color-theme letter-uppercase font-size-18 font-weight-600">Last Sessions</h3>
				<div class="display-grid">
					<a class="custom-btn margin-right-20 mob-margin-bottom-15" href="#">
						<span class="letter-uppercase font-weight-600">Schedule Session</span>
					</a>
					<a class="custom-btn" href="#">
						<img src="{{asset('web/studentdashboard/images/Rescheduleicon.png')}}" alt="">
						<span class="letter-uppercase font-weight-600">Reschedule Session</span>
					</a>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 latest-session-section display-grid">
				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-20 letter-uppercase date-row margin-top-none">Tuesday, 21- march 2020</h3>
					<h3 class="text-color-second font-size-25 letter-uppercase time-row margin-top-none">05:00:00 PM</h3>
					<h3 class="text-color-theme font-size-22 letter-uppercase qualification-row margin-top-none margin-bottom-none">undergraduate</h3>
					<h3 class="text-color-theme font-size-20 session-row margin-top-none">Session 1</h3>
					<h3 class="text-color-second font-size-22 prof-row margin-top-none margin-bottom-none">By Prof. Alluwalia</h3>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-20 letter-uppercase date-row margin-top-none">Tuesday, 21- march 2020</h3>
					<h3 class="text-color-second font-size-25 letter-uppercase time-row margin-top-none">05:00:00 PM</h3>
					<h3 class="text-color-theme font-size-22 letter-uppercase qualification-row margin-top-none margin-bottom-none">undergraduate</h3>
					<h3 class="text-color-theme font-size-20 session-row margin-top-none">Session 1</h3>
					<h3 class="text-color-second font-size-22 prof-row margin-top-none margin-bottom-none">By Prof. Alluwalia</h3>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-20 letter-uppercase date-row margin-top-none">Tuesday, 21- march 2020</h3>
					<h3 class="text-color-second font-size-25 letter-uppercase time-row margin-top-none">05:00:00 PM</h3>
					<h3 class="text-color-theme font-size-22 letter-uppercase qualification-row margin-top-none margin-bottom-none">undergraduate</h3>
					<h3 class="text-color-theme font-size-20 session-row margin-top-none">Session 1</h3>
					<h3 class="text-color-second font-size-22 prof-row margin-top-none margin-bottom-none">By Prof. Alluwalia</h3>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
				<h3 class="letter-uppercase font-size-18 font-weight-600 text-color-theme padding-top-50 margin-bottom-30">List of schools & courses</h3>
			</div>

	        <div class="course-list col-md-12 col-sm-12 col-xs-12 display-grid">
	            <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-2.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">Hight School Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>

	           <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-1.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">UG Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>

	           <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-3.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">Grand Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>
	            <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-2.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">Hight School Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>

	           <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-1.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">UG Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>

	           <div class="three_row_section latest-session-row margin-bottom-30 padding-none">
	                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
	                    <img src="{{asset('web/images/broad-servicea-area-3.png')}}" alt="" class="img-responsive width-100-percent">
	                    <div class="padding-15px">
	                        <h3 class="title-color text-color-theme">Grand Consulting</h3>
	                        <h3 class="text-color-second font-size-20 margin-top-10">BBA/LLB</h3>
	                        <p class="date-font gray-color font-size-16">Ugh chambray lumbersexual food truc artisan meditation sartorial post-ironic wes anderson.</p>
	                        <a class="text-color-theme font-weight-600 letter-uppercase" href="#">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="col-md-12 col-sm-12 col-xs-12 padding-none">
				<h3 class="letter-uppercase font-size-18 font-weight-600 text-color-theme padding-top-50 margin-bottom-30">List of assigned task</h3>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 latest-session-section display-grid padding-top-none">
				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-second font-size-20 margin-top-none">Current Affairs Paper 2</h3>
					<p class="text-gray font-size-16 padding-bottom-none">Assigned by Stuart lucas</p>
					<div class="display-flex space-between align-items-center">
						<h3 class="text-color-second font-size-20 time-row margin-top-none">Due Date</h3>
						<div class="completd-task background-color-second">Completed</div>
					</div>
					<p class="text-gray font-size-16 padding-bottom-none padding-bottom-none margin-bottom-none">31-March-2020</p>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-second font-size-20 margin-top-none">Current Affairs Paper 2</h3>
					<p class="text-gray font-size-16 padding-bottom-none">Assigned by Stuart lucas</p>
					<div class="display-flex space-between align-items-center">
						<h3 class="text-color-second font-size-20 time-row margin-top-none">Due Date</h3>
						<div class="completd-task background-color-second">Completed</div>
					</div>
					<p class="text-gray font-size-16 padding-bottom-none padding-bottom-none margin-bottom-none">31-March-2020</p>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-second font-size-20 margin-top-none">Current Affairs Paper 2</h3>
					<p class="text-gray font-size-16 padding-bottom-none">Assigned by Stuart lucas</p>
					<div class="display-flex space-between align-items-center">
						<h3 class="text-color-second font-size-20 time-row margin-top-none">Due Date</h3>
						<div class="completd-task background-color-second">Completed</div>
					</div>
					<p class="text-gray font-size-16 padding-bottom-none padding-bottom-none margin-bottom-none">31-March-2020</p>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 padding-none">
				<h3 class="letter-uppercase font-size-18 font-weight-600 text-color-theme padding-top-50 margin-bottom-30">Announcements</h3>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 latest-session-section display-grid padding-top-none">
				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-14 margin-top-none">Upcoming Registration Window For April</h3>
					<h3 class=" text-color-theme font-size-13 margin-top-none">Dear Student</h3>
					<p class="text-gray font-size-13 padding-bottom-none">Exam registration window for april 2020 Term and Examination is live!</p>
					<h3 class="text-color-theme font-size-14 margin-top-none margin-bottom-none">13 march 2020 by Exams</h3>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-14 margin-top-none">Upcoming Registration Window For April</h3>
					<h3 class=" text-color-theme font-size-13 margin-top-none">Dear Student</h3>
					<p class="text-gray font-size-13 padding-bottom-none">Exam registration window for april 2020 Term and Examination is live!</p>
					<h3 class="text-color-theme font-size-14 margin-top-none margin-bottom-none">13 march 2020 by Exams</h3>
				</div>

				<div class="latest-session-row box-shadow margin-bottom-30">
					<h3 class="text-color-theme font-size-14 margin-top-none">Upcoming Registration Window For April</h3>
					<h3 class=" text-color-theme font-size-13 margin-top-none">Dear Student</h3>
					<p class="text-gray font-size-13 padding-bottom-none">Exam registration window for april 2020 Term and Examination is live!</p>
					<h3 class="text-color-theme font-size-14 margin-top-none margin-bottom-none">13 march 2020 by Exams</h3>
				</div>
			</div>

		</div>
	</div>
@endsection