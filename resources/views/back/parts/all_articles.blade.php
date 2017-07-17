@if (count($articles)> 0)
	<article class="post">
		<table>
			<tr>
				<th>Дата</th>
				<th>Автор</th>
				<th>Название</th>
				<th>Комменты</th>
				<th>Доступна</th>
				@if($type == 'unpublished')
					<th>Опубликовать</th>
				@elseif($type == 'trashed')
					<th>Восстановить</th>
				@else
					<th>Скрыть</th>
				@endif
				<th>Редактир.</th>
				<th>Удалить</th>
			</tr>
				@foreach ($articles as $article)
					<tr>
						<td>{{ date('d.m.Y',strtotime($article->created_at)) }}</td>
						<td class="left">{{ $article->user->name }}</td>
						<td class="left">
							<a href="{{ route('back.pages.articles.article', ['id' => $article->id]) }}" target="blank" rel="bookmark">{{ $article->title }}</a>
						</td>
						<td>
							{{ count($article->comment) }}
						</td>
						<td>@if (!$article->private) Для всех @else Регистр. @endif</td>
						@if($type == 'unpublished')
							<td>
								<a href="{{ route('backPublishArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/publish.png') }}"  alt="Опубликовать" title="Опубликовать"></a>
							</td>
						@elseif($type == 'trashed')
							<td>
								<a href="{{ route('backRestoreArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/restore.png') }}"  alt="Восстановить" title="Восстановить"></a>
							</td>
						@else
							<td>
								<a href="{{ route('backUnublishArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/unpublish.png') }}"  alt="Скрыть" title="Скрыть"></a>
							</td>
						@endif
						<td>
							<a href="{{ route('backEditArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/edit.png') }}"  alt="Редактировать" title="Редактировать"></a>
						</td>
						@if($type == 'trashed')
							<td>
								<a href="{{ route('backforceDeleteArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/del.png') }}"  alt="Удалить навсегда" title="Удалить навсегда"></a>
							</td>
						@else
							<td>
								<a href="{{ route('backDeleteArticle', ['id' => $article->id]) }}"><img src="{{ URL::asset('images/del.png') }}"  alt="Удалить" title="Удалить"></a>
							</td>
						@endif
					</tr>	
				@endforeach
		</table>
		{{ $articles->links() }}
	</article>

@else
	<article class="post">Здесь будут статьи</article>
@endif


