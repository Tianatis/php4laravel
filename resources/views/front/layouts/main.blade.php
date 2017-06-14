@extends('front.layouts.base')

@section('navigation')
    @include('front.parts.navigation')
@endsection	

@section('header')
    @include('front.parts.header')
@endsection

@section('content')
	<div class="container">
		<main id="main" class="site-main" role="main">
			<div id="mess">
				@if (Session::has('response') &&  Session::get('response.position')=== 'top')
					@include('front.parts.response')
				@endif
			</div>
			@yield('page_content')
		</main>
		<!-- #main -->
		@include('front.parts.back-top')
	</div>



	
@endsection

@section('footer')
    @include('front.parts.footer')
@endsection



