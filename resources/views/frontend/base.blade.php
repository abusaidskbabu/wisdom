<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#69c3e8">
    <meta name="msapplication-navbutton-color" content="#69c3e8">
    <meta name="apple-mobile-web-app-status-bar-style" content="#69c3e8">
    <meta property="og:title" content="Virtual Global Services Limited">
    <meta property="og:description" content="We deliver high quality and timely solutions using an in-depth knowledge of various technology areas which enables us to provide end-to-end solutions and services. Our team is committed to provide IT, ITES & Digital Services with: Quality | Technology | Innovation.">
    <meta property="og:image" content="images/banner/banner 1.jpg">
    <meta property="og:url" content="https://www.vgsl.com.bd/">
    <meta name="twitter:title" content="Virtual Global Services Limited">
    <meta name="twitter:description" content="We deliver high quality and timely solutions using an in-depth knowledge of various technology areas which enables us to provide end-to-end solutions and services. Our team is committed to provide IT, ITES & Digital Services with: Quality | Technology | Innovation.">
    <meta name="twitter:image" content="images/banner/banner 1.jpg">
    <meta name="twitter:card" content="summary_large_image"> 
    <title>{{ $title }} | Wisdom Valley</title>
    <link rel="shortcut icon" href="{{asset('images/new/WISDIM-LOGO.png')}}" type="image/png">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/landing.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/it.css') }}"/>
    @yield('css')
    <style>
      body{
        cursor: url('Icon.cur'), auto;
      }
    </style>
    
    
  </head>
  <body id="body">
      <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "111510801379438");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
      @yield('body')
        
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script type="text/javascript">

$(".scroll-down").click(function(){
    $("#hero").css("position", "relative");
    //window.location.href = '#nav_part';
    $("#hero").css("display", "none");
   
});

</script>
</body>
</html>