@extends('front.layouts.page_content')
@section('page_content')
	@parent
	@section('header_class')
			sticky
	@endsection
	@section('block')
	<div class="entry-edit">
		@include('front.parts.forms.article_edit')
	</div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('front.parts.response')
        @endif	
	@endsection
@endsection
