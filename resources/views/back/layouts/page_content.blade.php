@extends('back.layouts.main')
@section('page_content')
@yield('page_menu')

<article class="post">
		<header class="entry-header @yield('header_class')">
			@yield('header_opts') 
			<h1 class="entry-title">{{ $title or ''}}</h1>
		</header>
		<!-- .entry-header -->

		@yield('block')
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
	
