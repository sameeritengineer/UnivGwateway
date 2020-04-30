@extends('web.layouts.index')
@section('title','WELCOME TO UNIV GATEWAY')
@section('content')
<div style="background-image: url({{asset('web/images/home-page-main-banner.png')}});" class="col-md-12 col-sm-12 col-xs-12 top-banner" id="banner">
    <!-- <img style="width: 100%" src="images/home-page-main-banner.png" alt="" class="img-responsive bannner-img hidden-xs" />
    <img src="images/mob-banner.jpg" alt="" class="img-responsive bannner-img visible-xs" /> -->
   <div class="banner-cont text-center">
       <h3>Find The Right Mentors To Guide You</h3>
       <h4 class="text-white font-size-25">Discover. Interact. Engage</h4>
       <form class="banner_cat_form" name="select-category" action="#" method="POST">
           <select class="banner_select_field" name="category_field">
               <option>Select Category</option>
               <option>Select Category</option>
               <option>Select Category</option>
               <option>Select Category</option>
               <option>Select Category</option>
               <option>Select Category</option>
           </select>
           <input class="cat_search_btn" type="submit" name="search-category" value="Search">
           <p>Get Insights Into</p>
           <p class="text-white font-size-25">Click Here For More Services & Interaction</p>
       </form>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
            <h3 class="section-title">Our Mentors Share Their Stories</h3>
            <p class="title-p-des gray-color">Can get in touch with the mentors</p>
            <img src="{{asset('web/images/Seperator-400.png')}}" class="center-block width-250" alt="" />
        </div>

        <div class="row">
            @foreach($mentors as  $mentor)
            <a href="#mentor{{$loop->iteration}}">
            <div  class="col-md-3 col-sm-3 col-xs-12 three_row_section text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 box-shadow-gray">
                    <img src="{{asset('uploads/mentor/'.$mentor->image)}}" alt="" class="img-responsive center-block" />
                    <h3 class="title-color text-color-theme letter-uppercase">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
                    @php 
                     $degree = App\Mentor::find($mentor->id)->degree;
                    @endphp
                    <p class="date-font text-color-second">{{$mentor->job_title}}. {{$mentor->major_specialization}},
                        @if(!empty($degree))
                        {{$degree->name}}
                        @else

                        @endif
                    </p>
                    @if(Illuminate\Support\Facades\Auth::check())
                        <a class="text-color-theme font-weight-600" href="#"><i class="fa fa-angle-right font-weight-900 font-size-18"></i> Consult Now</a>
                    @else
                       <a class="text-color-theme font-weight-600" href="{{route('web.student-signin')}}"><i class="fa fa-angle-right font-weight-900 font-size-18"></i> Consult Now</a>
                    @endif                    
                </div>
            </div>
            </a>

           <div id="mentor{{$loop->iteration}}" class="overlay">
            <div class="popup">
                <a class="close" href="#">&times;</a>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('uploads/mentor/'.$mentor->image)}}" alt="" class="img-responsive center-block" />
                    </div>
                    <div class="col-md-8">
                        <h3 class="title-color text-color-theme letter-uppercase">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
                    @php 
                     $degree = App\Mentor::find($mentor->id)->degree;
                    @endphp
                    <p class="date-font text-color-second">{{$mentor->job_title}}. {{$mentor->major_specialization}},
                        @if(!empty($degree))
                        {{$degree->name}}
                        @else

                        @endif
                    </p>
                        <p>{!!$mentor->detailed_bio!!}</p>
                    </div>
                </div>
            </div>
        </div>
            @endforeach


        </div>

       @if(Illuminate\Support\Facades\Auth::check())
            <div class="view-all-btn"><a class="view-all" href="{{route('web.mentors')}}">View All</a></div>
        @else
            <div class="view-all-btn"><a class="view-all" href="{{route('web.student-signin')}}">View All</a></div>
        @endif  
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 footer-banner-bg" style="background-image: url('{{asset('web/images/callustoday-banner.png')}}');">
    <div class="container">
        <div class="col-md-6 col-sm-6 col-xs-12 footer-banner-head">
            <span class="footer-banner-title">Let's Start an Interation</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 contact_button_name">
            <a href="{{route('web.contact-us')}}"><span class="contact_button">CALL US TODAY</span></a>
        </div>  
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
            <h3 class="section-title">Our Broad Services Areaa</h3>
            <p class="title-p-des text-color-second">Best courses and programs</p>
            <img src="{{asset('web/images/Seperator-400.png')}}" class="center-block width-250" alt="" />
        </div>
        <div class="row">
            @foreach($category as $category)
            <div class="col-md-4 col-sm-4 col-xs-12 three_row_section ">
                <div class="col-md-12 col-sm-12 col-xs-12 border-1px padding-none">
                    <img src="{{asset('uploads/category/'.$category->image)}}" alt="" class="img-responsive width-100-percent" />
                    <div class="padding-15px">
                        <h3 class="title-color text-color-theme">{{$category->name}}</h3></a>
                        <p class="date-font gray-color font-size-16">
                        {!!substr($category->desciption, 0, 160)!!}</p>
                        <a class="text-color-theme font-weight-600 letter-uppercase" href="{{route('web.services', $category->id)}}">View More  &nbsp;<i class="fa fa-angle-right font-weight-900 font-size-18"></i> </a>
                    </div>
                </div>
            </div>
            @endforeach
           

        </div>

        <div class="view-all-btn" style="display:none;"><a class="view-all" href="{{route('web.services')}}">View All</a></div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
            <h3 class="section-title">Our Students Share Their Stories</h3>
            <!-- <p class="title-p-des gray-color">Can get in touch with the mentors</p> -->
            <img src="{{asset('web/images/Seperator-400.png')}}" class="center-block width-250" alt="" />
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories2.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Sam</h3>
                    <p class="date-font text-color-second font-size-20">Australia</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories1.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Rashmi</h3>
                    <p class="date-font text-color-second font-size-20">Dubai</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories3.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Sameera</h3>
                    <p class="date-font text-color-second font-size-20">Dubai</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories4.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Jones</h3>
                    <p class="date-font text-color-second font-size-20">Singapore</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories2.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Sam</h3>
                    <p class="date-font text-color-second font-size-20">Australia</p>
                </div>
            </div>

           <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories2.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Rashmi</h3>
                    <p class="date-font text-color-second font-size-20">Dubai</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories5.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Sameera</h3>
                    <p class="date-font text-color-second font-size-20">Dubai</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 three_row_section our_student_row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{asset('web/images/Student-Stories6.png')}}" alt="" class="img-responsive center-block width-100-percent" />
                    <h3 class="title-color text-color-theme font-size-25 margin-bottom-none">Jones</h3>
                    <p class="date-font text-color-second font-size-20">Singapore</p>
                </div>
            </div>
        </div>
       <div class="view-all-btn"><a class="view-all" href="">View All</a></div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
            <h3 class="section-title">Our Partners</h3>
            <img src="{{asset('web/images/Seperator-400.png')}}" class="center-block width-250" alt="" />
        </div>
        <div class="row width-100-percent display-grid-section">
            <div class="partners-img">
                <img src="{{asset('web/images/PArtner3.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>
            
            <div class="partners-img">
                <img src="{{asset('web/images/PArtners2.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>

            <div class="partners-img">
                <img src="{{asset('web/images/PArtner1.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>

            <div class="partners-img">
                <img src="{{asset('web/images/PArtner4.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>
            <div class="partners-img">
                <img src="{{asset('web/images/PArtner3.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>
            
            <div class="partners-img">
                <img src="{{asset('web/images/PArtners2.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>

            <div class="partners-img">
                <img src="{{asset('web/images/PArtner1.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>

            <div class="partners-img">
                <img src="{{asset('web/images/PArtner4.png')}}" alt="" class="img-responsive center-block width-100-percent" />
            </div>
        </div>
    </div>
</div>
@endsection