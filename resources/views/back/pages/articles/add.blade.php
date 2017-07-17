@extends('back.layouts.page_content')
@section('page_content')
@parent
	@section('page_menu')
		@include('back.parts.menu.articles_menu')
	@endsection
	@section('header_class')
			sticky
	@endsection
	@section('block')
	<div class="entry-content">
		@include('back.parts.forms.add_article')
	</div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('back.parts.response')
        @endif	
	@endsection
@endsection
