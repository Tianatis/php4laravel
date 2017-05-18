@layout('main')
@section('page_content')

{{ $msg; }}

	@if (count($articles)> 0)
		@foreach ($articles as $article)
			@if (!$article['private'] || ($article['private'] && $auth ))
			<article class="post @if ($article['private'])sticky @endif ">

				<header class="entry-header">
					@if ($article['private'])
						<div class="private-img"></div>
					@endif
					<h1 class="entry-title"><a href="/articles/article/{{ $article['id']; }}" rel="bookmark">{{ $article['title']; }}</a></h1>
				</header>
				<!-- .entry-header -->
				
					<div class="entry-content"><a href="/articles/article/{{ $article['id']; }}" class="intro">
						<?=$article['intro'];?></a>
					</div>
				
				<!-- .entry-content -->

				<footer class="entry-footer">
					<div class="clear">
						<div class="ingrid-social-share">
							<div class="share-links">
								{{ $article['name']; }} {{ date('d.m.Y',strtotime($article['post_date'])); }}
							</div>
						</div>

					<div class="comment-link">
					@if($auth && $auth <= 2)
						(<a href="/articles/edit/{{ $article['id']; }}">Редактировать</a>)&nbsp;
						(<a href="/articles/delete/{{ $article['id']; }}">Удалить</a>)
					@endif
					</div>
				</div>
				</footer>
				<!-- .entry-footer -->
			</article><!-- #post-## -->	
		@endif
		@endforeach
	@endif
@endsection

