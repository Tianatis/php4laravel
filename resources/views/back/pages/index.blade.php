@extends('back.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
			@include('back.parts.view')
        </div>
	@endsection
	@section('share')

		Вы зашли как: {{ Auth::guard('admins')->user()->login }}
	@endsection
@endsection
