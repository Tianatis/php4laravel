<header>
<nav id="site-navigation" role="navigation">
	<div class="container">
		<ul class="menu nav-menu">
		@if (count($menu) > 0)
			@foreach ($menu as $item)
				<li><a href="{{ $item['href'] }}">{{ $item['name'] }}</a></li>
			@endforeach
		@endif
		</ul>
	</div>
</nav>
</header>