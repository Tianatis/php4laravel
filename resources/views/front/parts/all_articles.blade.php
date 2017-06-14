@if (count($articles)> 0)
	@foreach ($articles as $article)
		@if (!$article['private'] || ($article['private'] && $auth ))
			<article class="post @if ($article['private'])sticky @endif ">

				<header class="entry-header">
					@if ($article['private'])
						<div class="private-img"></div>
					@endif
					<h1 class="entry-title">
						<a href="/blog/{{ $article['slug'] }}" rel="bookmark">{{ $article['title'] }}</a>
					</h1>
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
					<a href="/blog/{{ $article['slug'] }}" class="intro">
						{{ $article['intro'] }}
					</a>
				</div>

				<!-- .entry-content -->

				<footer class="entry-footer">
					<div class="clear">
						<div class="ingrid-social-share">
							<div class="share-links">
								{{ $article['name'] }} {{ date('d.m.Y',strtotime($article['post_date'])) }}
							</div>
						</div>

						<div class="comment-link">
							@if($auth)
								(<a href="/blog/edit:{{ $article['id'] }}">Редактировать</a>)&nbsp;
								(<a href="/blog/delete:{{ $article['id'] }}">Удалить</a>)
							@endif
						</div>
					</div>
				</footer>
				<!-- .entry-footer -->
			</article><!-- #post-## -->
		@endif
	@endforeach
@else
	<article class="post">Здесь будут статьи</article>
@endif


