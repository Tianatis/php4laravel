@if (count($users)> 0)
	<article class="post">
		<table>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>E-mail</th>
				<th>Автор</th>
				<th>Создан</th>
				<th>Изменён</th>
				<th>Редактировать</th>
				<th>Удалить</th>
			</tr>
				@foreach ($users as $user)
					<tr>
						<td class="left">{{ $user->id }}</td>
						<td class="left">{{ $user->name }}</td>
						<td class="left">{{ $user->email }}</td>
						<td>

							@if($user->role_id == 4)
								<a href="{{ route('back.pages.users.unsetAuthor', ['id' => $user->id]) }}">
									<img src="{{ URL::asset('images/active.png') }}"  alt="Автор" title="Автор">
								</a>
							@else
								<a href="{{ route('back.pages.users.setAuthor', ['id' => $user->id]) }}">
									<img src="{{ URL::asset('images/inactive.png') }}"  alt="Пользователь" title="Пользователь">
								</a>
							@endif
						</td>
						<td>{{ date('d.m.Y',strtotime($user->created_at)) }}</td>
						<td>{{ date('d.m.Y',strtotime($user->updated_at)) }}</td>
						<td>
							<a href="{{ route('back.pages.users.edit', ['id' => $user->id]) }}"><img src="{{ URL::asset('images/edit.png') }}"  alt="Редактировать" title="Редактировать"></a>
						</td>
						<td>
							<a href="{{ route('back.pages.users.delete', ['id' => $user->id]) }}"><img src="{{ URL::asset('images/del.png') }}"  alt="Удалить" title="Удалить"></a>
						</td>
					</tr>	
				@endforeach
		</table>
	</article>
@endif


