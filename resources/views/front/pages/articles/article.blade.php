@extends('front.layouts.page_content')
@section('bottom_scripts')
	<script language="javascript" src="{{ URL::asset('js/script_blog.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>

@endsection
@section('page_content')
	@if ($article->private && $auth || !$article->private)
		@parent
		@section('header_class')
			@if ($article->private && $auth)
				sticky
			@endif 	 
		@endsection
		
		@section('header_opts')
			@if($article->private && $auth)
				<div class="private-img"></div>
			@endif

			@if($auth)
				@if($isAuthAdmin)
					<a class="edit-img" title="Редактировать" href="{{ route('editArticle', ['id' => $article->id]) }}"></a>&nbsp;
					<a class="delete-img" title="Удалить" href="{{ route('deleteArticle', ['id' => $article->id]) }}"></a>
				@else
					@if($isAdmin)
						<a href="{{ route('back.panel.login') }}"><div class="login-img" title="Войти для совершения действий"></div></a>
					@endif
				@endif
			@endif
		@endsection
		
		@section('block')
			<div class="entry-content">
				{{ $article->content }}
			</div>
		@endsection
		@section('share')
			{{ $article->name }} {{ date('d.m.Y',strtotime($article->created_at)) }}
		@endsection
		@section('comment_link')
			<div class="comment-link">
				{{ comments_count(count($article->comment)) }}
			</div>
		@endsection
		@include('front.pages.articles.comments', ['comments' => makeTree($article->comment)])
	@endif
@endsection		

