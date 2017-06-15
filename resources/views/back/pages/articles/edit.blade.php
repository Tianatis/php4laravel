@extends('back.layouts.page_content')
@section('page_content')
	<?php  
		$title = 'Редактирование статьи';
		$page_content = $article['content'];
	?>
	@parent
	@section('header_class')
			sticky
	@endsection
	@section('block')
	<div class="entry-edit">
		@include('back.parts.forms.article_edit')
	</div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('back.parts.response')
        @endif	
	@endsection
@endsection
