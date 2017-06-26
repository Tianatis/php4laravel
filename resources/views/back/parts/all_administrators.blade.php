@if (count($administrators)> 0)
	<article class="post">
		<table>
			<tr>
				<th>ID</th>
				<th>Логин</th>
				<th>Имя</th>
				<th>E-mail</th>
				<th>Роль</th>
				<th>Создан</th>
				<th>Изменён</th>
				<th>Редактировать</th>
				<th>Удалить</th>
			</tr>
				@foreach ($administrators as $admin)
					<tr>
						<td class="left">{{ $admin->id }}</td>
						<td class="left">{{ $admin->login }}</td>
						<td class="left">{{ $admin->user->name }}</td>
						<td class="left">{{ $admin->user->email }}</td>
						<td class="left">{{ $admin->role->full_name }}</td>
						<td>{{ date('d.m.Y',strtotime($admin->created_at)) }}</td>
						<td>{{ date('d.m.Y',strtotime($admin->updated_at)) }}</td>
						<td>
							<a href="{{ route('back.pages.administrators.index') }}/edit:{{ $admin->id }}"><img src="{{ URL::asset('images/edit.png') }}"  alt="Редактировать" title="Редактировать"></a>
						</td>
						<td>
							<a href="{{ route('back.pages.administrators.index') }}/delete:{{ $admin->id }}"><img src="{{ URL::asset('images/del.png') }}"  alt="Удалить" title="Удалить"></a>
						</td>
					</tr>	
				@endforeach
		</table>
	</article>
@endif


