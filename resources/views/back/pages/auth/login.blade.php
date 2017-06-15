@extends('back.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
		    @include('back.parts.forms.login')
        </div>
	@endsection
	@section('share')
		{{ $mess_text or ''}}
	@endsection
	
@endsection


