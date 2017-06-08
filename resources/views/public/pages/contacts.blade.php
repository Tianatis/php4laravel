@extends('public.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
		{!! $content or ''!!}	 
	@endsection
@endsection



