@if (count($messages)> 0)
	<article class="post">
		<table>
			<tr>
				<th>Дата</th>
				<th>Автор</th>
				<th>Сообщение</th>
				<th>Ответов</th>
				<th>Ответить</th>
				<th>Удалить</th>
			</tr>
            @foreach ($messages as $message)
			<tr>
				<td>{{ date('d.m.Y',strtotime($message->created_at)) }}</td>
				<td class="left">{{ $message->user->name }}</td>
				<td class="left"><a href="{{ route('back.pages.messages.message', ['id' => $message->id] ) }}">{{ intro($message->message) }}</a></td>
				<td>{{ ($message->respond->count()) }}</td>
				<td><a href="{{ route('back.pages.messages.add.respond', ['id' => $message->id] ) }}"><img src="{{ URL::asset('/images/resp.png')  }}"  alt="Ответить" title="Ответить"></a></td>
				<td><a href="{{ route('back.pages.messages.delete', ['id' => $message->id] ) }}"><img src="{{ URL::asset('/images/del.png')  }}"  alt="Удалить" title="Удалить"></a></td>

			</tr>
            @endforeach
		</table>
	</article>
@endif


