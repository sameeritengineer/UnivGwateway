@extends('web.layouts.index')
@section('title','About Us')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 inner-banner" style="background-image: url(web/images/Aboutusbanner.png);">
   <h3 class="inner-page-title"><strong>About Us</strong></h3>
</div>


<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">

      @foreach($about as $about)
      <div class="col-md-6 col-sm-6 col-xs-12 aboutus_des">
        <h3 class="text-left text-color-theme font-weight-600 font-size-40">{{$about->name}}</h3>
         <p>{!!$about->description!!}<p>
      </div>
     @endforeach
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <img src="{{asset('web/images/Illustration.png')}}" class="center-block img-responsive" alt="" />
</div>

@endsection