@extends('back.layouts.base')

@section('navigation')
    @include('back.parts.navigation')
@endsection	

@section('content')
	<div id="mess">
		@include('front.parts.response')
	</div>
	<div class="container">	
		<main id="main" class="site-main" role="main">
			@yield('page_content')
		</main> 
	@include('front.parts.back-top')
	</div>
	<!-- #main -->
@endsection
	
@section('footer')
    @include('back.parts.footer')
@endsection



