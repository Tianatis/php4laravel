<div>
	<h4>
		Возможные действия:
	</h4>
	<!-- .entry-header -->
	<nav class="view-navigation" role="navigation">
		<ul class="menu nav-menu">
			<li><a id="btn_sumb" href="/panel325/articles/add">Добавить статью</a></li>
			@if($isSuperAdmin)
				<li><a id="btn_sumb" href="/panel325/administrators/add">Добавить администратора</a></li>
			@endif
		</ul>
	</nav>
</div>

<article class="post">
	<h4>
		Статистика:
	</h4>
	<!-- .entry-header -->

	<div class="entry-content">
		<ul>
			<li>Всего статей на сайте: {{ $count_articles }}</li>
			<li>Публичных статей: {{ $count_public_articles }}</li>
			<li>Приватных статей: {{ $count_private_articles }}</li>
			<li>Пользователей на сайте: {{ $count_users }}</li>
		</ul>
	</div>

	<!-- .entry-content or entry-edit -->
</article>

<article class="post">
	<h4>
		Посдедние действия:
	</h4>
	<!-- .entry-header -->
	<div class="entry-content">
		<ul>
			@if($last_article)
				<li>
					Добавлена статья:
					<h5><a href="{{ route('back.pages.articles.index') }}/post:{{ $last_article->id }}" target="_blank">{{ $last_article->title }} ({{ $last_article->created_at }} {{ $last_article->user->name }})</a></h5>
				</li>
			@endif
			@if($last_updated_article)
				<li>
					Изменена статья:
					<h5><a href="{{ route('back.pages.articles.index') }}/post:{{ $last_updated_article->id }}" target="_blank">{{ $last_updated_article->title }} ({{ $last_updated_article->created_at }} {{ $last_updated_article->user->name }})</a></h5>
				</li>
			@endif
			@if($last_user)
				<li>Зарегистрирован пользователь:
					<h5>{{ $last_user->name }} ({{ $last_user->created_at }})</h5>
				</li>
			@endif
		</ul>
	</div>

	<!-- .entry-content or entry-edit -->
</article>