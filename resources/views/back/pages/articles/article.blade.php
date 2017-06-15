@extends('front.layouts.page_content')
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
				@if($auth)
					@if($isAuthAdmin)
						(<a href="{{ route('blog') }}/edit:{{ $article['id'] }}">Редактировать</a>)&nbsp;
						(<a href="{{ route('blog') }}/delete:{{ $article['id'] }}">Удалить</a>)
					@else
						@if($isAdmin)
							(<a href="{{ route('back.panel.login') }}">Авторизоваться</a>)
						@endif
					@endif
				@endif
			</div>
		@endsection
	@endif
@endsection		

