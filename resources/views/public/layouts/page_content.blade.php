@extends('public.layouts.main')
@section('page_content')
<article class="post">
		<header class="entry-header @yield('header_class')">
			@yield('header_opts') 
			<h1 class="entry-title">{{ $title or ''}}</h1>
		</header>
		<!-- .entry-header -->

		<div class="entry-content">
				@yield('block') 	 
		</div>
		<!-- .entry-content -->

		<footer class="entry-footer">
			<div class="clear">
				<div class="ingrid-social-share">
					<div class="share-links">
						@yield('share')
					</div>
				</div>
				@yield('comment_link')
			</div>
		</footer>
		<!-- .entry-footer -->
</article>
@endsection
	
