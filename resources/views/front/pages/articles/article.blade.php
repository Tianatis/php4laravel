@extends('front.layouts.page_content')
@section('page_content')
	@if ($article['back'] && $auth || !$article['back'])
		<?php  
				$title = $article['title'];
				$page_content = $article['content'];
		?>
		@parent
		@section('header_class')
			@if ($article['back'] && $auth)
				sticky
			@endif 	 
		@endsection
		
		@section('header_opts')
			@if($article['private'] && $auth)
				<div class="private-img"></div>
			@endif 
		@endsection
		
		@section('block')
			{{ $article['content'] }} 
		@endsection
		@section('share')
			{{ $article['name'] }} {{ date('d.m.Y',strtotime($article['created_at'])) }}
		@endsection
		@section('comment_link')
			<div class="comment-link">
				@if($auth)
					(<a href="/articles/edit/{{ $article['id'] }}">Редактировать</a>)&nbsp;
					(<a href="/articles/delete/{{ $article['id'] }}">Удалить</a>)
				@endif
			</div>
		@endsection
	@endif
@endsection		

