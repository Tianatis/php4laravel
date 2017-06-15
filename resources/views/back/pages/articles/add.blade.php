@extends('back.layouts.page_content')
@section('page_content')
	<?php  
		$title = 'Добавление статьи';
		$page_content = 'Введите текст';
	?>
	@parent
	@section('header_class')
			sticky
	@endsection
	@section('block')
	<div class="entry-content">
		@include('back.parts.forms.article_add')
	</div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('back.parts.response')
        @endif	
	@endsection
@endsection
