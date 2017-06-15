<form method="POST" action="{{ route('messagePost') }}">
	{{ csrf_field() }}
	<label>Имя</label>
	@if($errors->has('name'))
		<p class="validation_error">{{ $errors->first('name') }}</p>
	@endif
	<input type="text" name="name"  value="{{ old('name') }}" required><br>
	<label>Сообщение</label>
	@if($errors->has('message'))
		<p class="validation_error">{{ $errors->first('message') }}</p>
	@endif
	<textarea class="message" name="message" required>{{ old('message') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>