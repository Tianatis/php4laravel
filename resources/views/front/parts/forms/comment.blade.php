<form method="POST" name="comment" action="{{ route('front.pages.comments.addCommentPost', ['id' => $article->id]) }}">
{{ csrf_field() }}
	<label>Оставить комментарий</label>
	@if(isset($comment_id))
		<input type="hidden" name="parent_id" value="{{ $comment_id}}">
	@endif
	@if($errors->has('text'))
		<p class="validation_error">{{ $errors->first('text') }}</p>
	@endif
	<textarea class="comment" name="text" required>{{ old('text') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>