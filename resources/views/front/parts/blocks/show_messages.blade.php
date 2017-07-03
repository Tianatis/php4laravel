@foreach ($messages as $message)
	<div class="clear">
		<div class="item"><div class="item-img"></div>
			<strong>{{ $message->user->name }}</strong>  &nbsp;
			<span>({{ date('d.m.Y h:i',strtotime($message->created_at)) }})</span>:
			@if($auth)
				@if($isAuthAdmin)
					<div class="delete_mess">(<a href="/messages/delete:{{ $message->id }}">Удалить</a>)</div>
					<div class="respond_mess">(<a href="#">Ответить</a>)</div>
				@else
					@if($isAdmin)
						(<a href="{{ route('back.panel.login') }}">Войти для совершения действий</a>)
					@endif
				@endif
			@endif
			<div>{{ $message->message }}</div>
			<div class="respond_hidden_form">
				@include('front.parts.forms.respond')
			</div>
		</div>
		@if(isset($message->respond))
		@foreach ($message->respond as $respond)
			<div class="resp"><div class="resp-img"></div>
				<strong>{{ $respond->admin->user->name }}</strong>  &nbsp;
				<span>({{ date('d.m.Y h:i',strtotime($respond->created_at)) }})</span>:
				@if($isAuthAdmin)
					<div class="delete_mess">(<a href="/messages/{{ $respond->id }}/delete:respond/">Удалить</a>)</div>
				@endif
				
				<div>{{ $respond->respond }}</div>
				
			</div>
		@endforeach
		@endif
		
	</div>
@endforeach