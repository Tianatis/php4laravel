@extends('front.layouts.page_content')
@section('page_content')
@parent
	@section('header_class')
			sticky
	@endsection
	@section('block')
	<div class="entry-content">
		@include('front.parts.forms.add_article')
	</div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('front.parts.response')
        @endif	
	@endsection
@endsection
