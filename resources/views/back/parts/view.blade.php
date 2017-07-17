<div>
	<h4>
		Возможные действия:
	</h4>
	<!-- .entry-header -->
	<nav class="view-navigation" role="navigation">
		<ul class="menu nav-menu">
			<li><a id="btn_sumb" href="{{ route('backAddArticle') }}">Добавить статью</a></li>
			@if($isSuperAdmin)
				<li><a id="btn_sumb" href="{{ route('back.pages.administrators.add') }}">Добавить администратора</a></li>
			@endif
			@if($isAdministrator)
				<li><a id="btn_sumb" href="{{ route('back.pages.messages.index') }}">Ответить на сообщения</a></li>
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
			<li>Оставлено комментариев: {{ $count_comments }}</li>
		</ul>
	</div>

	<!-- .entry-content or entry-edit -->
</article>

<article class="post">
	<h4>
		Последние события:
	</h4>
	<!-- .entry-header -->
	<div class="entry-content">
		<ul>
			@if($last_user)
				<li>Зарегистрирован пользователь:
					<p><b>{{ $last_user->name }} ({{ $last_user->created_at }})</b></p>
				</li>
			@endif
			@if($last_article)
				<li>
					Добавлена статья:
					<p><a href="{{ route('back.pages.articles.article', ['id' => $last_article->id]) }}" target="_blank">{{ $last_article->title }} ({{ $last_article->created_at }} {{ $last_article->user->name }})</a></p>
				</li>
			@endif
			@if($last_updated_article)
				<li>
					Изменена статья:
					<p><a href="{{ route('back.pages.articles.article', ['id' => $last_updated_article->id]) }}" target="_blank">{{ $last_updated_article->title }} ({{ $last_updated_article->created_at }} {{ $last_updated_article->user->name }})</a></p>
				</li>
			@endif
			@if($last_added_message)

				<li>
					Добавлено сообщение:
					<p><a href="{{ route('back.pages.messages.message', ['id' => $last_added_message->id]) }}" target="_blank">{{ intro($last_added_message->message) }} ({{ $last_added_message->created_at }} {{ $last_added_message->user->name }})</a></p>
				</li>
			@endif
		</ul>
		@if($last_added_comments)
			<table>
				Последние комментарии:
				<tr>
					<td>Коммент</td>
					<td>Автор</td>
					<td>Дата</td>
					<td>Статья</td>
				</tr>
					@foreach($last_added_comments as $comment)
					<tr>
						<td class="left">{{ intro($comment->text) }}</td>
						<td>{{ $comment->user->name }}</td>
						<td>{{ $comment->created_at }}</td>
						<td class="left"><a href="{{ route('back.pages.articles.article', ['id' => $comment->article->id]) }}" target="_blank">{{ $comment->article->title }}</a></td>
					</tr>
					@endforeach
			</table>
		@endif




	</div>

	<!-- .entry-content or entry-edit -->
</article>