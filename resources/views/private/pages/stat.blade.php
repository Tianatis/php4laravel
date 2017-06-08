@extends('private.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
		{!! $content or 'Здесь может быть статистика блога'!!}	 
	@endsection
@endsection