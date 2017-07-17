<form method="POST" name="respond{{ $message->id }}" action="{{ route('front.pages.messages.add.respondPost', ['id' => $message->id]) }}">
{{ csrf_field() }}
	<label>Ответ</label>
	@if($errors->has('respond'))
		<p class="validation_error">{{ $errors->first('respond') }}</p>
	@endif
	<textarea class="respond" name="respond" required>{{ old('respond') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>