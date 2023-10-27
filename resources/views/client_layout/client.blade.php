<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="client/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="client/css/animate.css">
    
    <link rel="stylesheet" href="client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="client/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="client/css/magnific-popup.css">

    <link rel="stylesheet" href="client/css/aos.css">

    <link rel="stylesheet" href="client/css/ionicons.min.css">

    <link rel="stylesheet" href="client/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="client/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="client/css/flaticon.css">
    <link rel="stylesheet" href="client/css/icomoon.css">
    <link rel="stylesheet" href="client/css/style.css">
  </head>
  <body class="goto-here">

	{{-- start navbar --}}
	@include('client_layout.navbar')
	{{-- end navbar --}}

	@yield('content')

	{{-- start footer --}}
	@include('client_layout.footer')
	{{-- end footer --}}

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
	<script src="client/js/jquery.min.js"></script>
	<script src="client/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="client/js/popper.min.js"></script>
	<script src="client/js/bootstrap.min.js"></script>
	<script src="client/js/jquery.easing.1.3.js"></script>
	<script src="client/js/jquery.waypoints.min.js"></script>
	<script src="client/js/jquery.stellar.min.js"></script>
	<script src="client/js/owl.carousel.min.js"></script>
	<script src="client/js/jquery.magnific-popup.min.js"></script>
	<script src="client/js/aos.js"></script>
	<script src="client/js/jquery.animateNumber.min.js"></script>
	<script src="client/js/bootstrap-datepicker.js"></script>
	<script src="client/js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="client/js/google-map.js"></script>
	<script src="client/js/main.js"></script>
	  
	</body>
  </html>