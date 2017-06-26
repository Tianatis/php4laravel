@extends('back.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
		    @include('back.parts.forms.edit_admin')
        </div>
	@endsection
	@section('share')
		@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
			@include('back.parts.response')
		@endif
	@endsection
	
@endsection