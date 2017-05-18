<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
		<title>@yield('title')</title>
	</head>
	<body>
	<header>
	<nav id="site-navigation" role="navigation">
		<div class="container">
			<ul class="menu nav-menu">
			@if ($menu)
				@foreach ($menu as $item)
					<li><a href="{{ $item['href'] }}">{{ $item['name'] }}</a></li>
				@endforeach
			@endif
			</ul>
		</div>
	</nav>
	</header>
	<!-- #site-navigation -->
	<div class="container">

		<header id="masthead" class="site-header" role="banner">

			<img src="{{ URL::asset('images/flowers-header.jpg') }}" class="flowers">

			<div class="site-branding text-center">
				
					<h1 class="site-title">
						<a href="/" rel="home">PHP Strong 4</a>
					</h1>
					<h2 class="site-description">Блог на PHP</h2>
			</div>
			<!-- .site-branding -->

		</header>
		<!-- #masthead -->

		<main id="main" class="site-main" role="main">
			@yield('page_content')
		</main> <!-- #main -->
		<div id="back-top-div">
	<p id="back-top">
		<a href="#top"><span>&and;</span></a>
	</p>
</div>
</div> <!-- .container -->

<footer id="footer" class="site-footer" role="contentinfo">
	<div id="website-copyright">
		&copy; Tiana. All Rights Reserved. {{ date( 'Y' ) }}
	</div>
</footer>

<div class="attribution text-center">

	<img src="{{ URL::asset('images/flower-footer.png') }}" id="footer-flower">

</div>

</div> <!-- #page -->

</body>
</html>