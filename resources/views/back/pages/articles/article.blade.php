@extends('back.layouts.page_content')
@section('bottom_scripts')
	<script language="javascript" src="{{ URL::asset('js/script_blog.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>
@endsection
@section('page_content')
@if ($article->private && $auth || !$article->private)
		@parent
		@section('page_menu')
			@include('back.parts.menu.articles_menu')
		@endsection
		@section('header_class')
			@if ($article->private && $auth)
				sticky
			@endif 	 
		@endsection
		
		@section('header_opts')
			@if($article->private && $auth)
				<div class="private-img"></div>
				<a class="edit-img" href="{{ route('backEditArticle', ['id' => $article->id]) }}" title="Редактировать"></a>
				<a class="delete-img" href="{{ route('backDeleteArticle', ['id' => $article->id]) }}" title="Удалить"></a>
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
		@include('back.pages.articles.comments', ['comments' => makeTree($article->comment)])
@endif
@endsection		

