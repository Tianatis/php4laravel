@extends('back.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
		@include('back.parts.forms.add_admin')
	@endsection
	@section('share')
		{{ $mess_text or ''}}
	@endsection
	
@endsection