<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#18bc9c">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="apple-touch-icon" href="{{ asset('img/logo.jpg') }}">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<title>Danny</title>

	<link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="manifest" href="{{ asset('manifest.json') }}">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-freelancer/1.0.5/css/freelancer.min.css" rel="stylesheet" type="text/css">

	<!-- Custom Fonts -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		body {
			font-family: 'Lato';
		}
	</style>
</head>
<body id="app-layout">

	@include('layouts.navbar')

	@hasSection('header')
		<header>
			@yield('header')
		</header>
	@else
		<div class="spacer"></div>
	@endif

	@yield('content')

	@include('layouts.footer')

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/cbpAnimatedHeader.js') }}"></script>

	<!-- Contact Form JavaScript -->
	<!-- <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script> -->
	<!-- <script src="{{ asset('js/contact_me.js') }}"></script> -->

	<!-- Custom Theme JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-freelancer/1.0.5/js/freelancer.min.js"></script>

	<!-- Other scripts -->
	@stack('scripts')
	<script type="text/javascript">
		(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(chref=d.href).replace(e.href,"").indexOf("#")&&(!/^[a-z\+\.\-]+:/i.test(chref)||chref.indexOf(e.protocol+"//"+e.host)===0)&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone");
	</script>

</body>
</html>
