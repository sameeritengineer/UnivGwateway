@extends('web.layouts.index')
@section('title','Services')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 inner-banner" style="background-image: url('{{asset('web/images/callustoday-banner.png')}}');">
   <h3 class="inner-page-title"><strong>Services</strong></h3>
</div>


<div class="col-md-12 col-sm-12 col-xs-12 services-section-row padding-top-50 margin-bottom-30">
    <div class="container">
        <div class="row">
             @foreach($services as $services)
            <div class="col-md-12 col-sm-12 col-xs-12 display-flex align-items-center services-row {{$services->id}}">
                <div class="left-image">
                    <img src="{{asset('uploads/services/'.$services->image)}}" alt="" />
                    <div class="inner-section display-flex">
                        <img src="{{asset('web/images/U.png-icon.png')}}" class="margin-rigth-15 univ-logo-img-overlay" alt="" />
                        <h3 class="margin-top-none margin-bottom-none text-color-theme font-size-20 font-weight-600">{{$services->service_name}}</h3>
                    </div>                  
                </div>
                <div class="right-content padding-left-25">
                    <p class="color-gray font-size-18 line-height-30 text-align-justify">{!!$services->description!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
$('html, body').animate({
        scrollTop: $(".{{$slug}}").offset().top
}, 2000);
  /* end ready */
});

</script>   
@endsection