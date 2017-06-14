<form method="POST" action="{{ route('back.panel.loginPost') }}">
	{{ csrf_field() }}
	<label>Логин</label>
		{{ $errors->has('login') ? $errors->first('login') : '' }}
	<input type="text" name="login" value="{{ old('login') }}" required autofocus>
	<label>Пароль</label>
		{{ $errors->has('password') ? $errors->first('password') : '' }}
	<input type="password" name="password" required><br>
	<input type="checkbox" name="remember">Запомнить<br>
	<input type="submit" id="btn_sumb" value="Войти">
</form>