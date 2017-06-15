<form method="POST" action="{{ route('back.panel.loginPost') }}">
	{{ csrf_field() }}
	<label>Логин</label>
	@if($errors->has('login'))
		<p class="validation_error">{{ $errors->first('login') }}</p>
	@endif
	<input type="text" name="login" value="{{ old('login') }}" required autofocus>
	<label>Пароль</label>
	@if($errors->has('password'))
		<p class="validation_error">{{ $errors->first('password') }}</p>
	@endif
	<input type="password" name="password" required><br>
	<input type="checkbox" name="remember">Запомнить<br>
	<input type="submit" id="btn_sumb" value="Войти">
</form>