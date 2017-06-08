@extends('public.layouts.base')

@section('navigation')
    @include('public.parts.navigation')
@endsection	

@section('header')
    @include('public.parts.header')
@endsection

@section('content')
	<div id="mess">
		@include('public.parts.mess')
	</div>
	<div class="container">	
		<main id="main" class="site-main" role="main">
			@yield('page_content')
		</main> 
	@include('public.parts.back-top')	
	</div>
	<!-- #main -->
	
@endsection
	
@section('footer')
    @include('public.parts.footer')
@endsection



