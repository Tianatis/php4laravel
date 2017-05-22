@extends('public.main')
@section('title')
	{{ $title }}
@endsection

@section('page_content')

	<article class="post">
		<header class="entry-header">
			<h1 class="entry-title">{{ $title }}</h1>
		</header>
		<!-- .entry-header -->

		<div class="entry-content">
			<p>Этот блог создан в рамках курса PHP Strong</p>
		</div>
		<!-- .entry-content -->

		<footer class="entry-footer">
			<div class="clear">
				<div class="ingrid-social-share">
					<div class="share-links">

					</div>
				</div>
			</div>
			</footer>
		<!-- .entry-footer -->
	</article>
@endsection