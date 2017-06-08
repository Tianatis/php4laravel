@extends('public.layouts.page_content')
@section('page_content')
	@if ($article['private'] && Auth::check() || !$article['private'])
		<?php  
				$title = $article['title'];
				$page_content = $article['content'];
		?>
		@parent
		@section('header_class')
			@if ($article['private'] && Auth::check())
				sticky
			@endif 	 
		@endsection
		
		@section('header_opts')
			@if($article['private'] && Auth::check())
				<div class="private-img"></div>
			@endif 
		@endsection
		
		@section('block')
			{{ $article['content'] }} 
		@endsection
		@section('share')
			{{ $article['name'] }} {{ date('d.m.Y',strtotime($article['post_date'])) }}
		@endsection
		@section('comment_link')
			<div class="comment-link">
				@if(Auth::check())
					(<a href="/articles/edit/{{ $article['id'] }}">Редактировать</a>)&nbsp;
					(<a href="/articles/delete/{{ $article['id'] }}">Удалить</a>)
				@endif
			</div>
		@endsection
	@endif
@endsection		

