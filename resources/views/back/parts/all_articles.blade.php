@if (count($articles)> 0)
	<article class="post">
		<table>
			<tr>
				<th>Дата</th>
				<th>Автор</th>
				<th>Название</th>
				<th>Доступна</th>
				<th>Редактировать</th>
				<th>Удалить</th>
			</tr>
				@foreach ($articles as $article)
					<tr>
						<td>{{ date('d.m.Y',strtotime($article['created_at'])) }}</td>
						<td class="left">Admin</td>
						<td class="left">
							<a href="{{ route('back.pages.articles.index') }}/post:{{ $article['id'] }}" target="blank" rel="bookmark">{{ $article['title'] }}</a>
						</td>
						<td>@if (!$article['private']) Для всех @else Для зарегистрированных @endif</td>
						<td>
							<a href="{{ route('back.pages.articles.index') }}/edit:{{ $article['id'] }}"><img src="{{ URL::asset('images/edit.png') }}"  alt="Редактировать" title="Редактировать"></a>
						</td>
						<td>
							<a href="{{ route('back.pages.articles.index') }}/delete:{{ $article['id'] }}"><img src="{{ URL::asset('images/del.png') }}"  alt="Удалить" title="Удалить"></a>
						</td>
					</tr>	
				@endforeach
		</table>
	</article>
@else
	<article class="post">Здесь будут статьи</article>
@endif


