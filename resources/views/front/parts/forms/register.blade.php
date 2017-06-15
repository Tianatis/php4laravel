<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('registerPost') }}">
	{{ csrf_field() }}
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
	<input type="submit" id="btn_sumb" value="Зарегистрироваться">
</form>