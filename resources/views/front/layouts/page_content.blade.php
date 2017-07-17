@extends('front.layouts.main')
@section('page_content')
<article class="post">
		<header class="entry-header @yield('header_class')">
			@yield('header_opts') 
			<div class="article-title"><h1 class="entry-title">{{ $title or ''}}</h1></div>
		</header>
		<!-- .entry-header -->

		@yield('block')
		<!-- .entry-content or entry-edit -->

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
	
