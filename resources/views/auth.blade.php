@extends('main')
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
	<form method="post">
		{{ csrf_field() }}
		<label>Логин</label>
		<input type="text" name="login">
		<label>Пароль</label>
		<input type="password" name="password"><br>
		<input type="checkbox" name="remember">Запомнить<br>
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