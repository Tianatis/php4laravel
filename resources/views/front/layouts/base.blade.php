<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>{{ $title or '' }}</title>
		<link href="{{ URL::asset('css/style.css') }}?{{ sha1(microtime(true)) }}" rel="stylesheet" type="text/css">
		@yield('head_styles')
		
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<script language="javascript" src="{{ URL::asset('js/jquery-1.9.0.js') }}" type="text/javascript" charset="utf-8"></script>
		<script language="javascript" src="{{ URL::asset('js/script.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>
		@yield('head_scripts')
	</head>
	<body>
	@yield('navigation')
	<!-- #site-navigation -->
	
	@yield('header')
	<!-- #masthead -->
	
	@yield('content')
	<!-- .container -->
	
	@yield('footer')
	<!-- #footer -->
	<!-- #page -->
	@yield('bottom_scripts')
	</body>
</html>