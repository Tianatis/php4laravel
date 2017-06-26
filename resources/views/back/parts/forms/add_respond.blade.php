<form method="POST" action="{{ route('back.pages.messages.add.respondPost', ['id' => $message->id]) }}">
	{{ csrf_field() }}
	<label>Текст ответа</label>
	<textarea name="respond">{{ old('respond') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Сохранить">
</form>