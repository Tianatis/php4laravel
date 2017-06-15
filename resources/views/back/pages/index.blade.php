@extends('back.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
		    {!! $content or 'Здесь может быть статистика блога'!!}
        </div>
	@endsection
@endsection