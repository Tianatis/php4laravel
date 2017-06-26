<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('back.pages.administrators.addPost') }}">
	{{ csrf_field() }}
	<label>Логин</label>
	@if($errors->has('login'))
		<p class="validation_error">{{ $errors->first('login') }}</p>
	@endif
	<input type="text" name="login" value="{{ old('login') }}" required autofocus>
	<label>Имя</label>
	@if($errors->has('name'))
		<p class="validation_error">{{ $errors->first('name') }}</p>
	@endif
	<input type="text" name="name" value="{{ old('name') }}" required>
	<label>Е-мэйл</label>
	@if($errors->has('email'))
		<p class="validation_error">{{ $errors->first('email') }}</p>
	@endif
	<input type="text" name="email" value="{{ old('email') }}" required>
	@if($errors->has('role_id'))
		<p class="validation_error">{{ $errors->first('role_id') }}</p>
	@endif
	<label>Роль</label>
	<select name="role_id">
		@if ($errors->has('role_id'))
			<p class="validation_error">{{ $errors->first('role_id') }}</p>
			<option value="{{ old('role_id') }}" selected="selected" data-skip="1">{{ $role[old('role_id')] }}</option>
		@endif
		@foreach ($roles as $role)
				<option value="{{ $role->id }}">{{ $role->name }}</option>
		@endforeach
	</select>

	<label>Пароль</label>
	@if($errors->has('password'))
		<p class="validation_error">{{ $errors->first('password') }}</p>
	@endif
	<input type="password" name="password" required><br>
	<label>Повтор пароля</label>
	@if($errors->has('password2'))
		<p class="validation_error">{{ $errors->first('password2') }}</p>
	@endif
	<input type="password" name="password2" required><br>
	<input type="submit" id="btn_sumb" value="Добавить">
</form>