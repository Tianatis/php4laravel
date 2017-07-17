<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('back.pages.users.editPost', ['id' => $user->id]) }}">
	{{ csrf_field() }}
	<label>Имя</label>
	@if($errors->has('name'))
		<p class="validation_error">{{ $errors->first('name') }}</p>
	@endif
	<input type="text" name="name" value="{{ old('login', $user->name) }}" required autofocus>

	<br>
	<input type="checkbox" id="is_author" name="is_author" @if((is_array(old('is_author')) && in_array(1, old('is_author')))) checked @endif; value="1">
	<label for="is_author">Дать права Автора</label>
	<br>
	<br>

	<input type="checkbox" id="change_pass" class="change_pass"/><label for="change_pass">Сменить пароль</label>
	<div class="pass_hidden_form">
		<br>
		<label>Пароль</label>
		@if($errors->has('password'))
			<p class="validation_error">{{ $errors->first('password') }}</p>
		@endif
		<input id="password_field" type="password" disabled name="password"><br>
		<label>Повтор пароля</label>
		@if($errors->has('password2'))
			<p class="validation_error">{{ $errors->first('password2') }}</p>
		@endif
		<input type="password" id="password2_field" disabled name="password2" >
	</div>
	<br>
	<br>
	<input type="submit" id="btn_sumb" value="Сохранить">
</form>