<form method="POST" action="{{ route('back.pages.messages.edit.respondPost', ['id' => $respond->id]) }}">
	{{ csrf_field() }}
	<label>Текст ответа</label>
	<textarea name="respond">{{ old('respond', $respond->respond) }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Сохранить">
</form>