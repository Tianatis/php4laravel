<form method="POST" action="{{ route('contactsPost') }}">
	{{ csrf_field() }}
	<label>Имя</label>
	@if($errors->has('name'))
		<p class="validation_error">{{ $errors->first('name') }}</p>
	@endif
	<input type="text" name="name" value="{{ old('name') }}" required>
	<label>Е-мэйл для обратной связи</label>
	@if($errors->has('email'))
		<p class="validation_error">{{ $errors->first('email') }}</p>
	@endif
	<input type="text" name="email" value="{{ old('email') }}" required autofocus>
	<label>Тема</label>
	@if($errors->has('title'))
		<p class="validation_error">{{ $errors->first('title') }}</p>
	@endif
	<input type="text" name="title" value="{{ $article->title or old('title') }}" required autofocus><br>
	<label>Текст сообщения</label>
	@if($errors->has('content'))
		<p class="validation_error">{{ $errors->first('content') }}</p>
	@endif
	<textarea class="content" name="content" required>{{ old('content') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>