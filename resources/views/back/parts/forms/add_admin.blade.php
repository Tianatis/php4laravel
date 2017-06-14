<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('back.panel.administrators.addPost') }}">
	{{ csrf_field() }}
	<label>Логин</label>
	{{ $errors->has('login') ? $errors->first('login')  : '' }}
	<input type="text" name="login" value="{{ old('login') }}" required autofocus>
	<label>Имя</label>
		{{ $errors->has('name') ? $errors->first('name') : '' }}
	<input type="text" name="name" value="{{ old('name') }}" required>
	<label>Е-мэйл</label>
		{{ $errors->has('email') ? $errors->first('email') : '' }}
	<input type="text" name="email" value="{{ old('email') }}" required>
	<select name="role">
		@if $errors->has('role')
			<option value="{{ $errors->first('role.id') }}" selected="selected" data-skip="1">{{ $errors->first('role.name') }}</option>
		@endif
		@foreach ($roles as $role)
				<option value="{{ $role->id }}">{{ $role->name }}</option>
		@endforeach
	</select>

	<label>Пароль</label>
		{{ $errors->has('password') ? $errors->first('password') : '' }}
	<input type="password" name="password" value="{{ old('password') }}" required><br>
	<label>Повтор пароля</label>
		{{ $errors->has('password2') ? $errors->first('password2') : '' }}
	<input type="password" name="password2" value="{{ old('password2') }}" required><br>
	<input type="submit" id="btn_sumb" value="Войти">
</form>