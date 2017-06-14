<form method="POST" action="{{ route('loginPost') }}">
	{{ csrf_field() }}
	<label>Е-мэйл</label>
		{{ $errors->has('email') ? $errors->first('email') : '' }}
	<input type="text" name="email" value="{{ old('email') }}" required autofocus>
	<label>Пароль</label>
		{{ $errors->has('password') ? $errors->first('password') : '' }}
	<input type="password" name="password" required><br>
	<input type="checkbox" name="remember">Запомнить<br>
	<input type="submit" id="btn_sumb" value="Войти">
</form>