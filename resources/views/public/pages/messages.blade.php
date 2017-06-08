{{ $msg or ''}}
@section('page_content')
<div id="messages">
@parent
		@section('header_opts')
			@if(isset($messages))
		@endsection
	
		@section('block')
			@include('public.parts.blocks.show_messages')	
		@endsection
		@section('share')
			@if(Auth::check())
				<h2 class="entry-title">Оставьте Ваше сообщение</h2>
				<div id="message_form">
					@include('public.parts.forms.message')
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
