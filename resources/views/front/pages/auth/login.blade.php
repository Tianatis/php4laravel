@extends('front.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
		    @include('front.parts.forms.login')
        </div>
	@endsection
	@section('share')
        @if (Session::has('response') &&  Session::get('response.position')=== 'embed')
                @include('front.parts.response')
        @endif
	@endsection
	
@endsection


