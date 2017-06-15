@extends('back.layouts.page_content')
@section('page_content')
	@if ($article['private'] && $auth || !$article['private'])
		<?php  
				$title = $article['title'];
				$page_content = $article['content'];
		?>
		@parent
		@section('header_class')
			@if ($article['private'] && $auth)
				sticky
			@endif 	 
		@endsection
		
		@section('header_opts')
			@if($article['private'] && $auth)
				<div class="private-img"></div>
			@endif 
		@endsection
		
		@section('block')
			<div class="entry-content">
				{{ $article['content'] }}
			</div>
		@endsection
		@section('share')
			{{ $article['name'] }} {{ date('d.m.Y',strtotime($article['created_at'])) }}
		@endsection
		@section('comment_link')
			<div class="comment-link">
				(<a href="{{ route('back.pages.articles.index') }}/edit:{{ $article['id'] }}">Редактировать</a>)&nbsp;
				(<a href="{{ route('back.pages.articles.index') }}/delete:{{ $article['id'] }}">Удалить</a>)
			</div>
		@endsection
	@endif
@endsection		

