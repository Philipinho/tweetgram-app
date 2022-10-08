<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tweet your Instagram photos on Twitter - TweetGram</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="auto post instagram to twitter,post to twitter from instagram,tweet instagram post,link twitter account to instagram,tweetgram,tweet gram,tweet Instagram photos,tweetgram.com,#tweetgram,instagram to twitter,photos, videos,instagram tweet, instagram twitter,tweet instagram photo, tweet instagram video" name="keywords">
  <meta content="TweetGram will automatically tweet your Instagram photos & videos on Twitter. They will appear on Twitter like on Instagram." name="description">

  <meta property="og:image" content="{{URL::asset('/rapid/img/meta-card.svg')}}">
  <meta property="og:title" content="Automatically tweet your Instagram photos">

  <meta property="og:description" content="TweetGram will automatically tweet your Instagram photos & videos on Twitter.">

  <meta name="twitter:title" content="Automatically tweet your Instagram photos">
  <meta name="twitter:image" content="{{URL::asset('/rapid/img/meta-card.png')}}">

  <meta name="twitter:card" content="summary"/>
  <meta name="twitter:site" content="@TweetGramApp">
  <!-- Favicons -->
  <link href="{{URL::asset('/assets/images/favicon.png')}}" rel="icon">
  <link href="{{URL::asset('/rapid/img/meta-card.png')}}" rel="apple-touch-icon">

  <!-- Global payment tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156347028-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156347028-1');
</script>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{URL::asset('/rapid/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{URL::asset('/rapid/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{URL::asset('/rapid/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{URL::asset('/rapid/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{URL::asset('/rapid/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{URL::asset('/rapid/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{URL::asset('/rapid/css/style.css')}}" rel="stylesheet">

</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#howitworks" class="scrollto"><span>TweetGram</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#howitworks">How it works</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <!--<li><a href="#faq">FAQ</a></li>-->
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h3>Automatically tweet your Instagram photos/videos on Twitter</h3>
          <div>


@if(Auth::check())
<a href="/dashboard" class="btn-get-started scrollto" >Goto Dashboard</a>
@else
<h4>Connect your profiles to get started</h4>
<a href="/login" class="btn-get-started scrollto"><i class="fa fa-sign-in"></i> Login</a>
<a href="/register" data-toggle="tooltip" class="btn-get-started scrollto"><i class="fa fa-user-circle"></i>Register</a>
@endif

    </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first hidden-xs-down">
          <img src="{{URL::asset('/rapid/img/first-image.svg')}}" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Features Section
    ============================-->

    <section id="howitworks">
      <div class="container">

        <div class="row feature-item">

          <div class="col-lg-6 wow fadeInUp">
            <img src="{{URL::asset('/rapid/img/tweetgram_show.png')}}" class="img-fluid hidden-xs-down" alt=""> <!-- Show only on desktop -->

            <img src="{{URL::asset('/rapid/img/tweetgram_show.png')}}" alt="" class="clearfix img-fluid hidden-unless-xs">
          <!--  <img src="{{URL::asset('/rapid/img/first-image.svg')}}" alt="" class="clearfix img-fluid hidden-unless-xs">  <!-- Show only on mobile -->
          </div>

          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4>How it works</h4>
            <p>
              TweetGram automatically tweets your Instagram photos & videos as native tweets.<br>
              TweetGram makes sure complete photos & videos will show up in your Twitter feed unlike the default Instagram Twitter
              that shares just a link.
            </p>
            <p>With TweetGram, you only have to upload once on Instagram and it will appear on Twitter. This will save you time
              and increase media engagement.<br>
              TweetGram supports multiple photos in a single tweet.
            </p>
          </div>
        </div>

      </div>
    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section id="pricing" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Pricing</h3>
          <p>You can try TweetGram for free. No credit card required.</p>
        </header>

        <div class="row h-100 d-flex justify-content-center">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
                <div class="icon" style="background: #ecebff;"><i class="ion-ios-clock-outline" style="color: #8660fe;"></i></div>
              <h4 class="title">Free</h4>
            <ul class="list-unstyled">

              <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Auto Tweet</li>
	      <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Carousel (Multi-Photos)</li>
              <li class="text-justify items-center"><i class="ion-ios-close-outline" style="color:red;"></i> Remove Hashtags</li>
              <li class="text-justify items-center"><i class="ion-ios-close-outline" style="color:red;"></i> Remove Branding</li>
              <li class="text-justify items-center"><i class="ion-ios-close-outline" style="color:red;"></i> Remove Caption</li>
            </ul>
            <a href="#" class="price-btn-link">Get Started</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #eafde7;"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title">Professional</h4>
              <span style="font-size:15px;">$8/m or $70/y <sup><font color="maroon">(save $26)</font></sup></span>
              <ul class="list-unstyled">

                <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Auto Tweet</li>
	      <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Carousel (Multi-Photos)</li>
                <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Remove Hashtags</li>
                <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Remove Branding</li>
                <li class="text-justify items-center"><i class="ion-android-checkmark-circle" style="color:green;"></i> Remove Caption</li>
              </ul>
                <a href="#" class="price-btn-link">Get Started</a>
            </div>

          </div>
<!--<h3><span class="currency">$</span>39<span class="period">/month</span></h3>-->
        </div>

      </div>
    </section><!-- #services -->




    <!--==========================
      Frequently Asked Questions Section
    ============================-->
  <!--  <section id="faq">
      <div class="container">
        <header class="section-header">
          <h3>Frequently Asked Questions</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <ul id="faq-list" class="wow fadeInUp">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!--- #faq -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
<hr>

    <div class="container">

      <div class="copyright">
<center>hello@tweetgram.me</center>
        &copy; 2022 <strong>TweetGram</strong> - All Rights Reserved.
<br><a href="/privacy">Privacy </a> | <a href="/terms">TOS</a>
      </div>
      <div class="credits">
        Template by: <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->
<div style="display:none;">
auto post instagram to twitter, post to twitter from instagram
tweet instagram post,link twitter account to instagram,tweetgram,tweet gram,
tweet Instagram photos,tweetgram.com,#tweetgram,instagram to twitter,photos,
 videos,instagram tweet, instagram twitter,tweet instagram photo,
 tweet instagram video, Instagram Twitter IFTTT, instagram twitter Zapier.
How to tweet instagram photo, tweet instagram photo, post instagram photo to Twitter,
instagram to twitter, instagram twitter, instagram video to twitter,
instagram photo, post instagram video to twitter.

</div>

  <!--<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>-->
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
  <!-- JavaScript Libraries -->
  <script src="{{URL::asset('/rapid/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/easing/easing.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/mobile-nav/mobile-nav.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/wow/wow.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('/rapid/lib/lightbox/js/lightbox.min.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{URL::asset('/rapid/js/main.js')}}"></script>

<!--Start of Tidio Script-->
<script src="//code.tidio.co/fwbsvdt1ms9uhdgwhrcybdi577pdiasr.js" async></script>
<!--End of Tidio Script-->


</body>
</html>
