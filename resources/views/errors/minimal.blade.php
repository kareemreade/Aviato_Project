<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title> 404 Page</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site1asset/images/favicon.png') }}" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/bootstrap/css/bootstrap.min.css') }}">

  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('site1asset/css/style.css') }}">

</head>

<body id="body">
	<section class="page-404">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="{{ route('site1.home') }}">
						<img src="{{ asset('site1asset/images/logo.png') }}" alt="site logo" />
					</a>
					<h1>404</h1>
					<h2>Page Not Found</h2>
					<a href="{{ route('site1.home') }}" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> Go Home</a>
					<p class="copyright-text">© 2023 Kareemreade All Rights Reserved</p>
				</div>
			</div>
		</div>
	</section>
    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('site1asset/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('site1asset/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('site1asset/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('site1asset/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('site1asset/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('site1asset/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('site1asset/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('site1asset/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('site1asset/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('site1asset/js/script.js') }}"></script>



  </body>
  </html>
