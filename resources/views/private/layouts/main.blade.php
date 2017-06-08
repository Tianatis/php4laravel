@extends('private.layouts.base')

@section('navigation')
    @include('private.parts.navigation')
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
    @include('private.parts.footer')
@endsection



