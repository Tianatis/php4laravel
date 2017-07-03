@extends('front.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
			@include('front.parts.forms.contact_form')
        </div>
	@endsection
@endsection



