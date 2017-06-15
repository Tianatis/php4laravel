@extends('front.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
		    {!! $content or ''!!}
        </div>
	@endsection
@endsection

