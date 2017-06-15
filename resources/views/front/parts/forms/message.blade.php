<form method="POST" action="{{ route('messagePost') }}">
	{{ csrf_field() }}
	<label>Имя</label>
	{{ $errors->has('name') ? $errors->first('name') : '' }}
	<input type="text" name="name"  value="{{ old('name') }}" required><br>
	<label>Сообщение</label>
	{{ $errors->has('message') ? $errors->first('message') : '' }}
	<textarea class="message" name="message" required>{{ old('message') }}</textarea><br>
	<input type="submit" id="btn_sumb" value="Отправить">
</form>