<form method="POST" action="{{ route('loginPost') }}">
	{{ csrf_field() }}
	<label>Е-мэйл</label>
	@if($errors->has('email'))
		<p class="validation_error">{{ $errors->first('email') }}</p>
	@endif
	<input type="text" name="email" value="{{ old('email') }}" required autofocus>
	<label>Пароль</label>
	@if($errors->has('password'))
		<p class="validation_error">{{ $errors->first('password') }}</p>
	@endif
	<input type="password" name="password" required><br>
	<input type="checkbox" name="remember">Запомнить<br>
	<input type="submit" id="btn_sumb" value="Войти">
</form>