@extends('front.layouts.page_content')
@section('bottom_scripts')
	<script language="javascript" src="{{ URL::asset('js/script_messages.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>

@endsection
@section('page_content')
<div id="messages">
@parent
	@section('header_opts')
		@if($isAdmin && !$isAuthAdmin)
			<a href="{{ route('back.panel.login') }}" class="login-img" title="Войти для совершения действий"></a>
		@endif
	@endsection
	@section('block')
			@if(isset($messages))
				<div class="entry-content">
					@include('front.parts.blocks.show_messages')
				</div>
			@endif
		@endsection
		@section('share')
			@can('create', App\Models\Message::class)
					<h2 class="entry-title">Оставьте Ваше сообщение</h2>
					<div id="message_form">
						@include('front.parts.forms.message')
					</div>
			@endcan
		@endsection
		@section('comment_link')
			<div class="comment-link">
					Пользователи оставили {{ messages_count(count($messages)) }}
				</div>
		@endsection
</div>
@endsection
