@extends('web.layouts.index')
@section('title','Contact Us')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 inner-banner" style="background-image: url('{{asset('web/images/contactus-banner.png')}}');">
   <h3 class="inner-page-title"><strong>Contact Us</strong></h3>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact-info">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 right_contact_info">
        <h3 class="text-color-theme font-weight-600 font-size-40 margin-bottom-30">Contact Info</h3>
        <div class="display-grid margin-bottom-30">
          <img src="images/conactcallicon.png" alt="" class="contact-icon" />
          <h3><a class="text-color-theme font-weight-600" href="#">+91 252 252 252</a></h3>
        </div>

        <div class="display-grid margin-bottom-30">
          <img src="images/Emailicon.png" alt="" class="contact-icon" />
          <h3><a class="text-color-theme font-weight-600" href="#">info@univgateway.com</a></h3>
        </div>

        <div class="display-grid margin-bottom-30">
          <img src="images/Locationicon.png" alt="" class="contact-icon" />
          <h3 class="text-color-theme font-weight-600">Amaltash Marg, c block sector 10 Noida, Uttar Pradesh 201301</h3>
        </div>
          
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 left_map">
          
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12 contact-section">
          <div class="kindly-contact-inner col-md-12 col-sm-12 colxs-12">
            <h3 class="text-color-theme font-weight-600">Get In Touch</h3>
          </div>
 
            @if ($errors->any())
                <div class="alert alert-danger sroll">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
            @if (\Session::has('success'))
              <div class="alert alert-success sroll">
               <strong>Success!</strong> {!! \Session::get('success') !!}
              </div>
            @endif
            @if (\Session::has('error'))
              <div class="alert alert-danger sroll">
                <strong>Error!</strong> {!! \Session::get('error') !!}
              </div>
            @endif  

            <form class="enquiry-form" id method="POST" action="" enctype="multipart/form-data">
               {{ csrf_field() }}
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Your Name (required)</label>
                    <input type="text" class="enquiry-feild form-control" name="name" required="">
                    <label>Your Email (required)</label>
                    <input type="email" class="enquiry-feild form-control" name="email" required="">
                    <label>Phone (required) </label>
                    <input type="number" maxlength="15" class="enquiry-feild form-control" name="phone" required="">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>Your Message (required)</label>
                    <textarea class="text_area form-control" name="message" required=""></textarea>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12s-12">
                    <input type="submit" name="submit" class="submit-btn" value="SUBMIT">
                  </div>

              </form>
            </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $('html, body').animate({
          scrollTop: $(".sroll").offset().top
  }, 2000);
});

</script>   
@endsection