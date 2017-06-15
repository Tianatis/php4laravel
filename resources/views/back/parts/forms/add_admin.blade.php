<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('back.panel.administrators.addPost') }}">
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
	@if($errors->has('role'))
		<p class="validation_error">{{ $errors->first('role') }}</p>
	@endif
	<select name="role">
		@if $errors->has('role')
			<option value="{{ $errors->first('role.id') }}" selected="selected" data-skip="1">{{ $errors->first('role.name') }}</option>
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
	<input type="submit" id="btn_sumb" value="Войти">
</form>