@extends('public.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
		@include('public.parts.forms.register')	 
	@endsection
	@section('share')
		{{ $mess_text or ''}}
	@endsection
	
@endsection