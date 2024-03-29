<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--
    <meta name="turbolinks-cache-control" content="no-cache">
	-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:title" content="{{ setting('hotel_name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('lush/theme/default/images/summary-picture.png') }}">
    <meta property="og:description" content="Virtual world where you can make and meet friends.">
    <meta property="og:site_name" content="{{ setting('hotel_name') }}">
	<link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('lush/images/home_icon.gif') }}">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>{{ setting('hotel_name') }} - @stack('title')</title>
	<!-- Fonts -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<!-- Assets -->
	<link rel="icon" type="image/x-icon" href="{{ asset('lush/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('lush/css/fonts.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lush/css/all.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lush/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lush/css/animate.css') }}" type="text/css" />
    @stack('scripts')
</head>
  <body class="h-100" id="LushLight">
    <div id="app" class="h-100">
	<x-message.flash-messages />
      <div id="notification" class="notifications-container"></div>
      <div class="app h-100 d-flex flex-column">
		<x-navigation.navigation-menu />
		         @auth
         <x-site-header />
         @endauth
        <div class="container h-100 page-container @auth container-sm-fluid d-flex flex-column @endauth" data-page="@stack('body')"> 
            @yield('content')
        </div>
        <div class="@auth container container-sm-fluid d-flex flex-column @endauth"> 
          <div class="bg-lush-dark-blue text-center py-4 text-white mt-auto">
              <img src="/lush/images/Heblishsmallfinal.png">
              <small class="w-100 d-block pb-1 text-white">
                <p>THIS IS FOOTER</p>
              </small>
          </div>
        </div>
    </div>
    <div class="llbtn llbtn-primary scroll-top-btn hidden">
      <i class="fas fa-arrow-up"></i>
    </div>
    </div>
	</body>
	<!-- cosmic stuff innit -->
    <script src="/lush/javascript/jquery-3.6.0.min.js"></script>
    <script src="/lush/javascript/jquery.ui.touch-punch.min.js"></script>
    <script src="/lush/javascript/jquery.history.js"></script>
    <script src="/lush/javascript/jquery.fullscreen.min.js"></script>
    <script src="/lush/javascript/functions.js"></script>
    <script src="/lush/javascript/loading.js?v=123"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
</html>
