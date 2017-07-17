@if (count($articles)> 0)
	@foreach ($articles as $article)
		@if (!$article->private || ($article->private && $auth ))
			<article class="post @if ($article->private)sticky @endif ">

				<header class="entry-header">
					@if ($article->private)
						<div class="private-img"></div>
					@endif
					@if($auth)
						@if($isAuthAdmin)
							<a class="edit-img" title="Редактировать" href="{{ route('editArticle', ['id' => $article->id]) }}"></a>&nbsp;
							<a class="delete-img" title="Удалить" href="{{ route('deleteArticle', ['id' => $article->id]) }}"></a>
						@else
							@if($isAdmin)
								<a href="{{ route('back.panel.login') }}"><div class="login-img" title="Войти для совершения действий"></div></a>
							@endif
						@endif
					@endif
						<div class="article-title">
							<h1 class="entry-title">
								<a href="{{ route('article', ['slug' => $article->slug])  }}" rel="bookmark">{{ $article->title }}</a>
							</h1>
						</div>
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
					<a href="{{ route('article', ['slug' => $article->slug])  }}" class="intro">
						{{ $article->intro }}
					</a>
				</div>

				<!-- .entry-content -->

				<footer class="entry-footer">
					<div class="clear">
						<div class="ingrid-social-share">
							<div class="share-links">
								{{ $article->name }} {{ date('d.m.Y',strtotime($article->created_at)) }}
							</div>
						</div>

						<div class="comment-link">

							@if(count($article->comment)>0)
								<a href="{{ route('article', ['slug' => $article->slug])  }}/#comments" rel="bookmark">
									{{ comments_count(count($article->comment)) }}
								</a>
							@else
								{{ comments_count(0) }}
							@endif

						</div>
					</div>
				</footer>
				<!-- .entry-footer -->
			</article><!-- #post-## -->
		@endif
	@endforeach
	{{ $articles->links() }}
@else
	<article class="post">Здесь будут статьи</article>
@endif


