@if (count($messages)> 0)
	@foreach ($messages as $message)
		<div class="clear">
			<div class="item"><div class="item-img"></div>
				<strong>{{ $message->user->name }}</strong>  &nbsp;
				<span>({{ date('d.m.Y h:i',strtotime($message->created_at)) }})</span>:
				<div class="mess_content">{{ $message->message }}</div>
				@if($auth)
					@if($isAuthAdmin)
						<div class="mess_opts">
							<a class="delete-mess-img" title="Удалить" href="{{ route('front.pages.messages.delete', ['id' => $message->id]) }}"></a>
							<a class="respond-mess-img respond_mess" href="#"></a>
						</div>
						<div class="respond_hidden_form">
							@include('front.parts.forms.respond')
						</div>
					@endif
				@endif
			</div>
			@if(isset($message->respond))
			@foreach ($message->respond as $respond)
				<div class="resp"><div class="resp-img"></div>
					<strong>{{ $respond->admin->user->name }}</strong>  &nbsp;
					<span>({{ date('d.m.Y h:i',strtotime($respond->created_at)) }})</span>:
					@if($isAuthAdmin)
						<a class="delete-mess-img" title="Удалить" href="{{ route('front.pages.messages.delete.respond', ['id' => $respond->id]) }}"></a>
					@endif

					<div>{{ $respond->respond }}</div>

				</div>
			@endforeach
			@endif

		</div>
	@endforeach
@endif