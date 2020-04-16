<div class="col-md-12 col-sm-12 col-xs-12 footer-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ft-logo text-center">
           <img src="{{asset('web/images/Footer-logo.png')}}" alt="logo" class="bottom-logo center-block" />
           <div class="col-md-4 col-sm-4 col-xs-12 footer-address">
              <a href="#"> <i class="fa fa-envelope"></i> <span class="text-color-second">info@univgateway.com</span></a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-12 footer-address">
              <a href="#"> <i class="fa fa-phone"></i> <span class="text-color-second">000 000 00</span></a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-12 footer-address">
              <a href="#"> <i class="fa fa-map-marker"></i> <span class="text-color-second">121 King Street, India</span></a>
           </div>
         </div>

        <div class="col-md-12 col-xs-12 col-sm-12 footer-section">
           <div class="col-md-9 col-sm-9 col-xs-12 ft-menu">
               <ul class="col-md-4 col-sm-4 col-xs-6">
                    <h3>LINKS</h3>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Programs</a></li>
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-2">
                   <h3>SUPPORT</h3>
                   <li><a href="mentors.php">Mentors</a></li>
                   <li><a href="#">Call us today</a></li>
                   <li><a href="#">Students</a></li>
                   <li><a href="#">Partners</a></li>
                   
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-3 ft-menu-2">
                   <h3>SUPPORT</h3>
                   <li><a href="about-us.php">About Us</a></li>
                   <li><a href="how-it-works">How it works</a></li>
                   <li><a href="#">Team</a></li>
                   <li><a href="#">Services</a></li>
                   
               </ul>
           </div>
         <div class="col-md-3 col-sm-3 col-xs-12 ft-contect">
               <h3 class="text-color-second font-weight-600">JOIN OUR NEWSLETTER</h3>
               <?php
                if(!empty($_GET['message'])) {
                  $message = $_GET['message'];
                  if($message == 'success'){
                ?>
                <script>window.scrollTo(0,document.body.scrollHeight);</script>
                <p class="news-ltr">Thank you for subscribing with Univ Gateway.</p>
                <?php } } ?>
               <form method="post" action="newsletterSubmit.php">
               <input type="email" name="email" class="ft-input form-control" placeholder="Email Address" name="">
               <input type="submit" value="subscribe" class="subscribe" name="submit">
               </form>
              <div class="ft-social-section">
                <span class="ft-social"><i class="fa fa-facebook"></i></span>
                <span class="ft-social"><i class="fa fa-instagram"></i></span>
                <span class="ft-social"><i class="fa fa-linkedin"></i></span> 
                <a href="#" target="_blank"><span class="ft-social"><i class="fa fa-twitter"></i></span></a>
              </div>
           </div> 
        </div>
      </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 btm-footer">
 2020 © UNIVGATEWAY. All Rights Reserved.
</div>
<script src="{{asset('web/js/swiper.js')}}" type="text/javascript"></script>
<script src="{{asset('web/js/script.js')}}" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<script type="text/javascript">
  var swiper = new Swiper('#testimonial .swiper-container', {
  slidesPerView: 2,
  //centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: '#testimonial .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#testimonial .swiper-button-next',
    prevEl: '#testimonial .swiper-button-prev',
  },

  breakpoints: {
    1170: {
      slidesPerView: 1,
    }
  }
});

  var swiper = new Swiper('#our_member_slider .swiper-container', {
  slidesPerView: 4,
  //centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: '#our_member_slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#our_member_slider .swiper-button-next',
    prevEl: '#our_member_slider .swiper-button-prev',
  },

  breakpoints: {
    1220: {
      slidesPerView:4,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    320: {
      slidesPerView: 1,
      
    }
  }
});

</script>
</body>
</html>