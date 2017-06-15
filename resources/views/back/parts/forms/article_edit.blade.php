<form method="POST" action="{{ route('back.pages.articles.index') }}/edit:{{ $article['id'] }}">
    {{ csrf_field() }}
    <label>Заголовок</label>
    @if($errors->has('title'))
        <p class="validation_error">{{ $errors->first('title') }}</p>
    @endif
    <input type="text" name="title" value="{{ $article['title'] or old('title') }}" required autofocus><br>
    <label>Текст</label>
    @if($errors->has('content'))
        <p class="validation_error">{{ $errors->first('content') }}</p>
    @endif
    <textarea name="content" required>{{ $article['content'] or old('content') }}</textarea>

    <input type="checkbox" name="private" @if($article['private'] || (is_array(old('$private')) && in_array(1, old('$private')))) checked @endif; value="1">
    <label>Только для зарегистрированныз пользователей</label><br><br>
    <input type="submit" id="btn_sumb" value="Отредактировать">
</form>
