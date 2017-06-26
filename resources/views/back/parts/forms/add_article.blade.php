<form method="POST" action="{{ route('backAddArticlePost') }}">
    {{ csrf_field() }}
    <label>Заголовок</label>
    @if($errors->has('title'))
        <p class="validation_error">{{ $errors->first('title') }}</p>
    @endif
    <input type="text" name="title" value="{{ old('title') or '' }}" required autofocus><br>
    <label>Текст</label>
    @if($errors->has('content'))
        <p class="validation_error">{{ $errors->first('content') }}</p>
    @endif
    <textarea name="content" required>{{ old('content') or '' }}</textarea>

    <input type="checkbox" name="private" @if((is_array(old('$private')) && in_array(1, old('$private')))) checked @endif; value="1">
    <label>Только для зарегистрированныз пользователей</label><br><br>
    <input type="submit" id="btn_sumb" value="Сохранить статью">
</form>
