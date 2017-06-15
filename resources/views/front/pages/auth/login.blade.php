@extends('front.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
		@include('front.parts.forms.login')
	@endsection
	@section('share')
        @if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('front.parts.response')
        @endif
	@endsection
	
@endsection


