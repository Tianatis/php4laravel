@extends('front.layouts.page_content')
@section('bottom_scripts')
	<script language="javascript" src="{{ URL::asset('js/script_messages.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>

@endsection
@section('page_content')
<div id="messages">
@parent
	@section('block')
			@if(isset($messages))
				<div class="entry-content">
					@include('front.parts.blocks.show_messages')
				</div>
			@endif
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
					Всего сообщений: {{ (int)count($messages) }}
				</div>
		@endsection
</div>
@endsection
