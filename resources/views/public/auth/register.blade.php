@extends('public.main')
@section('title')
	{{ $title }}
@endsection

@section('page_content')
<article class="post">
	<header class="entry-header">
		<h1 class="entry-title">{{ $title }}</h1>
	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('registerPost') }}">
			{{ csrf_field() }}
			<label>Логин</label>
			{{ $errors->has('login') ? $errors->first('login')  : '' }}
			<input type="text" name="login" value="{{ old('login') }}" required autofocus>
			<label>Имя</label>
				{{ $errors->has('name') ? $errors->first('name') : '' }}
			<input type="text" name="name" value="{{ old('name') }}" required>
			<label>Е-мэйл</label>
				{{ $errors->has('email') ? $errors->first('email') : '' }}
			<input type="text" name="email" value="{{ old('email') }}" required>
			<label>Пароль</label>
				{{ $errors->has('password') ? $errors->first('password') : '' }}
			<input type="password" name="password" value="{{ old('password') }}" required><br>
			<label>Повтор пароля</label>
				{{ $errors->has('password2') ? $errors->first('password2') : '' }}
			<input type="password" name="password2" value="{{ old('password2') }}" required><br>
			<input type="submit" id="btn_sumb" value="Войти">
		</form>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<div class="clear">
			<div class="ingrid-social-share">
				<div class="share-links">
					{{ $mess_text }}
				</div>
			</div>
		</div>
	</footer>
	<!-- .entry-footer -->
</article>
@endsection