<form method="POST" action="{{ route('front.pages.massagePost') }}">
	{{ csrf_field() }}
	<label>Сообщение</label>
	@if($errors->has('message'))
		<p class="validation_error">{{ $errors->first('message') }}</p>
	@endif
	<textarea class="message" name="message" required>{{ old('message') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>