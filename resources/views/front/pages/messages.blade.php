@extends('front.layouts.page_content')
@section('page_content')
<div id="messages">
@parent
		@section('header_opts')
			@if(isset($messages))
		@endsection
	
		@section('block')
		<div class="entry-content">
			@include('front.parts.blocks.show_messages')
		</div>
		@endsection
		@section('share')
			@if($auth)
				<h2 class="entry-title">Оставьте Ваше сообщение</h2>
				<div id="message_form">
					@include('front.parts.forms.message')
				</div>
			@endif
		@endsection
		@section('comment_link')
			<div class="comment-link">
					Всего сообщений: {{ echo (int)count($messages) }}				
				</div>
		@endsection

</div>
@endsection
