@extends('web.layouts.index')
@section('title','How It Works')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 inner-banner" style="background-image: url(web/images/howitworks-Banner.png);">
   <h3 class="inner-page-title"><strong>How it works</strong></h3>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 padding-top-100 padding-bottom-100">
  <img src="{{asset('web/images/Illustration-img.png')}}" class="center-block img-responsive" alt="" />
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
      <div class="display-grid">
        <div class="aboutus_des box-shadow grid-col margin-bottom-30">
          <img class="center-block" src="{{asset('web/images/Mentorsicon.png')}}" alt="" />
          <h3 class="text-center text-color-second font-weight-600 font-size-30">Mentors</h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>

        <div class="aboutus_des box-shadow grid-col margin-bottom-30">
          <img class="center-block" src="{{asset('web/images/Guidance-icon.png')}}" alt="" />
          <h3 class="text-center text-color-second font-weight-600 font-size-30">Guidance</h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>

        <div class="aboutus_des box-shadow grid-col margin-bottom-30">
          <img class="center-block" src="{{asset('web/images/Experienceicon.png')}}" alt="" />
          <h3 class="text-center text-color-second font-weight-600 font-size-30">Experience</h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>

        <div class="aboutus_des box-shadow grid-col margin-bottom-30">
          <img class="center-block" src="{{asset('web/images/careersicon.png')}}" alt="" />
          <h3 class="text-center text-color-second font-weight-600 font-size-30">Careers</h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 normal_content">
        <h3 class="section-title text-center">Our Mentors Share Their Stories</h3><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 custom-li">
        <div class="content-ul-li col-md-8 col-sm-7 col-xs-12">
          <ul>
            <li>Lorem Ipsum is simply dummy text of the printing</li>
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry.</li>
            <li>Lorem Ipsum is simply dummy text</li>
            <li>Lorem Ipsum is simply dummy text of the printing</li>
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry.</li>
            <li>Lorem Ipsum is simply dummy text</li>
            <li>Lorem Ipsum is simply dummy text of the printing</li>
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry.</li>
            <li>Lorem Ipsum is simply dummy text</li>
          </ul>
        </div>
        <div class="left-img col-md-4 col-sm-5 col-xs-12">
          <img src="{{asset('web/images/Mission&philosophyicon.png')}}" alt="" class="img-responsive center-block" />
        </div>
      </div>
    </div>
  </div>
</div>
  
@endsection